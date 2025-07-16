@extends('admin.main')

@section('content')

<style type="text/css">
   a.quot_activ {
      color: #083a76;
      background-color: rgb(8 58 118 / 9%);
      -webkit-box-shadow: none;
      box-shadow: none;
      border-color: #083a76;
      border-left: 4px solid #083a76 !important;
   }
</style>
<div class="body-content">
   <div class="decoration blur-2"></div>
   <div class="decoration blur-3"></div>
   <div class="container-xxl">
      <div id="success-message" class="alert alert-success d-none"></div>
      <div class="card">
         <div class="card-header position-relative">
            <h6 class="fs-17 fw-semi-bold my-1">Total Sub-Categories</h6>
            <a onclick="openPopup()" class="ad_cntr_pop">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 5l0 14" />
                  <path d="M5 12l14 0" />
               </svg>
               Add Sub-Categories
            </a>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table id="subCategoriesTable" class="display table table-borderless text-nowrap">
                  <thead>
                     <tr>
                        <th>SR</th>
                        <th>Sub-Category</th>
                        <th>Category</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody></tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>




<div class="popup-overlay popmain" id="popup">
   <div class="popup-content">
      <button class="close-btn" onclick="closePopup()">×</button>
      <h2 id="popupTitle">Add Sub-Categories</h2>
      <form id="subCategoriesForm">
         @csrf
         <input type="hidden" name="sub_category_id" id="sub_category_id">
         <div class="col-sm-6" bis_skin_checked="1">
            <!-- start form group -->
            <div class="" bis_skin_checked="1">
               <label class="fw-medium mb-2">Select Category</label>

               <select name="category_id" required class="form-control">
                  <option value="">-- Select Category --</option>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
               </select>
            </div>
            <!-- end /. form group -->
            <div class="clear"></div>
         </div>

         <div class="col-sm-6" bis_skin_checked="1">
            <!-- start form group -->
            <div class="" bis_skin_checked="1">
               <label class="fw-medium mb-2">Sub-Category Name</label>
               <input type="text" name="name" class="form-control" placeholder="Enter Sub-Category Name">
            </div>
            <!-- end /. form group -->
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
         <button type="submit" class="ad_clas">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
               <path stroke="none" d="M0 0h24v24H0z" fill="none" />
               <path d="M12 5l0 14" />
               <path d="M5 12l14 0" />
            </svg>
            <span id="submitText">Add</span>
         </button>
      </form>
   </div>
</div>



<script>
   function openPopup() {
      document.getElementById("popup").style.display = "block";
      $('#popupTitle').html('Add Sub-Categories');
       $('#submitText').text('Add');
      $('#subCategoriesForm')[0].reset();
      $('#sub_category_id').val('');
   }

   function closePopup() {
      document.getElementById("popup").style.display = "none";
   }
</script>
@endsection

@section('scripts')
<script>
   $(document).ready(function() {
      let table = $('#subCategoriesTable').DataTable({
         ajax: {
            url: '{{ route("admin.sub-categories.list") }}',
            dataSrc: 'data' // Important: DataTables expects 'data' key
         },
         columns: [{
               data: 'id'
            },
            {
               data: 'name'
            },
            {
               data: 'category.name'
            },
            {
               data: null,
               render: function(data, type, row) {
                  return `
                                          <button class="btn btn-sm btn-primary me-1" onclick="editSubCategory(${row.id})">Edit</button>
                                          <button class="btn btn-sm btn-danger" onclick="deleteSubCategory(${row.id})">Delete</button>
                                       `;
               }
            }
         ]
      });

      $('#subCategoriesForm').on('submit', function(e) {
         e.preventDefault();
         let formData = new FormData(this);
         let subCategoryId = $('#sub_category_id').val();
         let url = subCategoryId ? `/admin/sub-categories/${subCategoryId}` : '{{ route("admin.sub-categories.store") }}';

         if (subCategoryId) {
            formData.append('_method', 'PUT');
         }

         // Clear any previous errors
         $('.text-danger').text('');
         $('.form-control').removeClass('is-invalid');

         $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
               $('#success-message').removeClass('d-none').text(response.message);
               $('#popup').hide();
               $('#subCategoriesForm')[0].reset();
               $('#sub_category_id').val();
               $('#submitText').text('Add');
               table.ajax.reload();
               setTimeout(() => {
                  $('#success-message').addClass('d-none').text('');
               }, 3000);
            },
            error: function(xhr) {
               if (xhr.status === 422) {
                  const errors = xhr.responseJSON.errors;
                  $.each(errors, function(field, messages) {
                     $(`[name="${field}"]`).addClass('is-invalid');
                     if ($(`#${field}-error`).length) {
                        $(`#${field}-error`).text(messages[0]);
                     } else {
                        $(`[name="${field}"]`).after(`<span class="text-danger" id="${field}-error">${messages[0]}</span>`);
                     }
                  });
               }
            }
         });
      });

      window.editSubCategory = function(id) {
         $.get(`/admin/sub-categories/${id}/edit`, function(data) {
            openPopup();
            $('#popupTitle').text('Edit Sub-Categories');
            $('#subCategoriesForm')[0].reset();
            $('.text-danger').text('');
            $('.form-control').removeClass('is-invalid');

            $('[name="name"]').val(data.name);
            $('[name="category_id"]').val(data.category_id);
            $('#sub_category_id').val(data.id);
            $('#subCategoriesForm').append(`<input type="hidden" name="sub_category_id" value="${data.id}">`);
            $('#submitText').text('Update');
         });
      };

      window.deleteSubCategory = function(id) {
         if (confirm("Are you sure you want to delete this sub-category?")) {
            $.ajax({
               url: `/admin/sub-categories/${id}`,
               method: 'DELETE',
               data: {
                  _token: '{{ csrf_token() }}'
               },
               success: function(response) {
                  $('#success-message').removeClass('d-none').text(response.message);
                  $('#subCategoriesTable').DataTable().ajax.reload();
                  setTimeout(() => $('#success-message').addClass('d-none').text(''), 3000);
               }
            });
         }
      };

   });
</script>
@endsection
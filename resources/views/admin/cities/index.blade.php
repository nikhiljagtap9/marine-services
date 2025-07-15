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
            <h6 class="fs-17 fw-semi-bold my-1">Total Cities</h6>
            <a onclick="openPopup()" class="ad_cntr_pop">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 5l0 14" />
                  <path d="M5 12l14 0" />
               </svg>
               Add City
            </a>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table id="citiesTable" class="display table table-borderless text-nowrap">
                  <thead>
                     <tr>
                        <th>Sr.</th>
                        <th>City Name</th>
                        <th>Country</th>
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
      <h2 id="popupTitle">Add City</h2>
      <form id="cityForm">
         @csrf
         <input type="hidden" name="city_id" id="city_id">
         <div class="col-sm-6" bis_skin_checked="1">
            <!-- start form group -->
            <div class="" bis_skin_checked="1">
               <label class="fw-medium mb-2">Select Country</label>

               <select name="country_id" required class="form-control">
                  <option value="">-- Select Country --</option>
                  @foreach($countries as $country)
                  <option value="{{ $country->id }}">{{ $country->name }}</option>
                  @endforeach
               </select>
            </div>
            <!-- end /. form group -->
            <div class="clear"></div>
         </div>

         <div class="col-sm-6" bis_skin_checked="1">
            <!-- start form group -->
            <div class="" bis_skin_checked="1">
               <label class="fw-medium mb-2">City Name</label>
               <input type="text" name="name" class="form-control" placeholder="Enter City Name">
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
      $('#popupTitle').html('Add City');
       $('#submitText').text('Add');
      $('#cityForm')[0].reset();
      $('#city_id').val('');
   }

   function closePopup() {
      document.getElementById("popup").style.display = "none";
   }
</script>
@endsection

@section('scripts')
<script>
   $(document).ready(function() {
      let table = $('#citiesTable').DataTable({
         ajax: {
            url: '{{ route("admin.cities.list") }}',
            dataSrc: 'data' // Important: DataTables expects 'data' key
         },
         columns: [{
               data: 'id'
            },
            {
               data: 'name'
            },
            {
               data: 'country.name'
            },
            {
               data: null,
               render: function(data, type, row) {
                  return `
                              <button class="btn btn-sm btn-primary me-1" onclick="editCity(${row.id})">Edit</button>
                              <button class="btn btn-sm btn-danger" onclick="deleteCity(${row.id})">Delete</button>
                           `;
               }
            }
         ]
      });

      $('#cityForm').on('submit', function(e) {
         e.preventDefault();
         let formData = new FormData(this);
         let cityId = $('#city_id').val();
         let url = cityId ? `/admin/cities/${cityId}` : '{{ route("admin.cities.store") }}';

         if (cityId) {
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
               $('#cityForm')[0].reset();
               $('#city_id').val('');
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

      window.editCity = function(id) {
         $.get(`/admin/cities/${id}/edit`, function(city) {
            openPopup();
            $('#cityForm')[0].reset();
            $('#city_id').val(city.id);
            $('#popupTitle').text('Edit City');
            $('#submitText').text('Update');
            $('[name="name"]').val(city.name);
            $('[name="country_id"]').val(city.country_id);
         });
      };

      window.deleteCity = function(id) {
         if (confirm("Are you sure to delete this city?")) {
            $.ajax({
               url: `/admin/cities/${id}`,
               method: 'DELETE',
               data: {
                  _token: '{{ csrf_token() }}'
               },
               success: function(response) {
                  $('#success-message').removeClass('d-none').text(response.message);
                  $('#citiesTable').DataTable().ajax.reload();
                  setTimeout(() => $('#success-message').addClass('d-none').text(''), 3000);
               }
            });
         }
      };
   });
</script>
@endsection
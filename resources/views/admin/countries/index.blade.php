
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
            <h6 class="fs-17 fw-semi-bold my-1">Total countries</h6>
            <a onclick="openPopup()" class="ad_cntr_pop" >
               <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M12 5l0 14" />
                  <path d="M5 12l14 0" />
               </svg>
               Add Country 
            </a>
         </div>
         <div class="card-body">
            <div class="table-responsive">
                <table id="countriesTable" class="display table table-borderless text-nowrap">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Country Name</th>
                            <th>Total Ports</th>
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
      <h2 id="popupTitle">Add Country</h2>
       <form id="countryForm">
         @csrf
         <input type="hidden" name="country_id" id="country_id">
         <div class="col-sm-6" bis_skin_checked="1">
            <!-- start form group -->
            <div class="" bis_skin_checked="1">
               <label class="fw-medium mb-2">Country Name</label>
               <input type="text" name="name"  class="form-control" placeholder="Enter Country Name">
               <span class="text-danger" id="name-error"></span> 
            </div>
            <!-- end /. form group -->
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
         <button type="submit" class="ad_clas">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
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
     $('#popupTitle').html('Add Country');
      $('#submitText').text('Add');
     $('#countryForm')[0].reset();
      $('#country_id').val('');
   }
   
   function closePopup() {
     document.getElementById("popup").style.display = "none";
   }
        
    </script>
    @endsection

    @section('scripts')
        <script>

         $(document).ready(function () {
            let table = $('#countriesTable').DataTable({
                 ajax: {
                    url: '{{ route("admin.countries.list") }}',
                    dataSrc: 'data' // Important: DataTables expects 'data' key
                },
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'ports_count', title: 'Total Ports'},
                    {
                        data: null,
                        render: function (data, type, row) {
                              return `
                                 <button class="btn btn-sm btn-primary me-1" onclick="editCountry(${row.id})">Edit</button>
                                 <button class="btn btn-sm btn-danger" onclick="deleteCountry(${row.id})">Delete</button>
                              `;
                        }
                     }
                ]
            });

            $('#countryForm').on('submit', function (e) {
               e.preventDefault();
               let formData = new FormData(this);
               let countryId = $('#country_id').val();
               let url = countryId ? `/admin/countries/${countryId}` : '{{ route("admin.countries.store") }}';

               if (countryId) {
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
                    success: function (response) {
                        $('#success-message').removeClass('d-none').text(response.message);
                        $('#popup').hide(); 
                        $('#countryForm')[0].reset();
                        $('#country_id').val('');
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


            window.editCountry = function(id) {
               $.get(`/admin/countries/${id}/edit`, function (country) {
                  openPopup();
                  $('#countryForm')[0].reset();
                  $('#country_id').val(country.id);
                  $('[name="name"]').val(country.name);
                  $('#popupTitle').text('Edit Country');
                  $('#submitText').text('Update');
               });
            };

            window.deleteCountry = function(id) {
               if (confirm("Are you sure to delete this country?")) {
                  $.ajax({
                        url: `/admin/countries/${id}`,
                        method: 'DELETE',
                        data: { _token: '{{ csrf_token() }}' },
                        success: function (response) {
                           $('#success-message').removeClass('d-none').text(response.message);
                           $('#countriesTable').DataTable().ajax.reload();
                           setTimeout(() => $('#success-message').addClass('d-none').text(''), 3000);
                        }
                  });
               }
            };
        });
   
      </script>
    @endsection


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
            <h6 class="fs-17 fw-semi-bold my-1">Total Ports</h6>
            <a onclick="openPopup()" class="ad_cntr_pop" >
               <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M12 5l0 14" />
                  <path d="M5 12l14 0" />
               </svg>
               Add Port 
            </a>
         </div>
         <div class="card-body">
            <div class="table-responsive">
                <table id="portsTable" class="display table table-borderless text-nowrap">
                    <thead>
                        <tr>
                           <th>Sr.</th>
                           <th>Port Name</th>
                           <th>Country</th>
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
      <h2>Add Port</h2>
       <form id="portForm">
         @csrf
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
               <label class="fw-medium mb-2">Port Name</label>
               <input type="text" name="name" class="form-control" placeholder="Enter Port Name">
            </div>
            <!-- end /. form group -->
            <div class="clear"></div>
         </div>
          <div class="col-sm-12">
            <div class="" bis_skin_checked="1">
               <label class="fw-medium mb-2">Port Address</label>
               <input id="port_address" name="port_address" class="form-control" placeholder="Start typing address..." />
               <input type="hidden" id="lat" name="lat">
               <input type="hidden" id="lng" name="lng">
               <div id="selected_address" class="text-muted mt-2" style="font-size: 14px;"></div>
            </div>
         </div>
         <div class="clear"></div>
         <button type="submit" class="ad_clas">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
               <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
               <path d="M12 5l0 14" />
               <path d="M5 12l14 0" />
            </svg>
                  Add
         </button>
      </form>
   </div>
</div>

  
    
    <script>
      function openPopup() {
      document.getElementById("popup").style.display = "block";
      }
   
      function closePopup() {
      document.getElementById("popup").style.display = "none";
      }
        
    </script>
    @endsection

    @section('scripts')
        <script>

         $(document).ready(function () {
            let table = $('#portsTable').DataTable({
                 ajax: {
                    url: '{{ route("admin.ports.list") }}',
                    dataSrc: 'data' // Important: DataTables expects 'data' key
                },
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'country.name' },
                ]
            });

            $('#portForm').on('submit', function (e) {
                e.preventDefault();
                let formData = $(this).serialize();

                // Clear any previous errors
                     $('.text-danger').text('');
                     $('.form-control').removeClass('is-invalid');

                $.ajax({
                    url: '{{ route("admin.ports.store") }}',
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        $('#success-message').removeClass('d-none').text(response.message);
                        $('#popup').hide(); 
                        $('#portForm')[0].reset();
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
        });
   
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key={{ $googleMapsKey }}&libraries=places"></script>
      <script>
         function initAutocomplete() {
            const input = document.getElementById('port_address');
            const autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', () => {
               const place = autocomplete.getPlace();
               const lat = place.geometry.location.lat();
               const lng = place.geometry.location.lng();
               const formatted = place.formatted_address;

               document.getElementById('lat').value = lat;
               document.getElementById('lng').value = lng;
            });
         }
         google.maps.event.addDomListener(window, 'load', initAutocomplete);
      </script>
    @endsection

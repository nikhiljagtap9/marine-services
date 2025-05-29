@extends('layouts.main')

@section('content')
<div class="clear"></div>
<br><br><br><br>
<div class="clear"></div>
<style type="text/css">
   .actv_expl{
   border-color: #124f98 !important;
   color: #124f98 !important;
   font-weight: 600 !important;
   }
   .footer-dark.main-footer .container.pt-4{
   display: none;
   }
</style>
<link rel="stylesheet" href="{{ asset('assets/css/internal_page.css')}}">
<div class="border-0 card header rounded-0 sticky-top">
   <div class="border-bottom border-top p-3 p-xl-0 search-bar">
      <form action="{{ route('product_listing') }}" method="GET">
         <div class="serch_main serch_main_inerpg">
            <div class="serch_drop">
               <div class="serch_drop_titl">
                  Select Country
               </div>
               <div class="clear"></div>
               <div class="svg_right">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-world">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                     <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                     <path d="M3.6 9h16.8" />
                     <path d="M3.6 15h16.8" />
                     <path d="M11.5 3a17 17 0 0 0 0 18" />
                     <path d="M12.5 3a17 17 0 0 1 0 18" />
                  </svg>
               </div>
               <select class="serch_drop_select" id="country-select" name="country">
                  <option>Select Country</option>
                  @foreach($countries as $country)
                     <option value="{{ $country->id }}" {{ request('country') == $country->id ? 'selected' : '' }}>
                           {{ $country->name }}
                     </option>
                  @endforeach
               </select>
            </div>
            <div class="serch_drop">
               <div class="serch_drop_titl">
                  Select Port
               </div>
               <div class="clear"></div>
               <div class="svg_right">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-ship">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                     <path d="M2 20a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1" />
                     <path d="M4 18l-1 -5h18l-2 4" />
                     <path d="M5 13v-6h8l4 6" />
                     <path d="M7 7v-4h-1" />
                  </svg>
               </div>
               <select class="serch_drop_select" id="ports_services" name="ports_services">      
                  <option value="">Select Port</option>
               </select>
            </div>
            <div class="serch_drop">
               <div class="serch_drop_titl">
                  Select Service Type
               </div>
               <div class="clear"></div>
               <div class="svg_right">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-category">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                     <path d="M4 4h6v6h-6z" />
                     <path d="M14 4h6v6h-6z" />
                     <path d="M4 14h6v6h-6z" />
                     <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                  </svg>
               </div>
               <select class="serch_drop_select" id="service-type" name="service_type">
                  <option selected="">Select Service Type</option>
                  @foreach($categories as $category )
                     <option value="{{ $category->id }}" {{ request('service_type') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                     </option>
                  @endforeach
               </select>
            </div>



            <div class="serch_drop">
               <div class="serch_drop_titl">
                  Select Sub-Service Type
               </div>
               <div class="clear"></div>
               <div class="svg_right">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.5"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-category">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                     <path d="M4 4h6v6h-6z" />
                     <path d="M14 4h6v6h-6z" />
                     <path d="M4 14h6v6h-6z" />
                     <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                  </svg>
               </div>
               <select class="serch_drop_select" id="sub-service-type" name="sub_service_type">
                  <option selected="">Select Sub-Service Type</option>
               </select>
            </div>


            <div class="serch_drop">
               <div class="serch_drop_titl">
                  Rating
               </div>
               <div class="clear"></div>
               <div class="svg_right">
                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.25"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-star">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                     <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                  </svg>
               </div>
               <select class="serch_drop_select">
                  <option selected="">Select Rating</option>
                  <option value="1">
                     ★ ★ ★ ★ ★
                  </option>
                  <option value="2">
                     ★ ★ ★ ★ 
                  </option>
                  <option value="3">
                     ★ ★ ★ 
                  </option>
                  <option value="3">
                     ★ ★ 
                  </option>
                  <option value="3">
                     ★ 
                  </option>
               </select>
            </div>
            <button type="submit" class="search_btn" >
               <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="#ffffff"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                  <path d="M21 21l-6 -6" />
               </svg>
               <div class="sert_text">SEARCH</div>
            </button>
            <div class="clear"></div>
         </div>
      </form>
      <div class="clear"></div>
   </div>
   <!-- end /. header search bar  -->
</div>
<link rel="stylesheet" href="{{ asset('assets/css/map.css')}}" />
<style>
   .main_map { display: flex; height: 800px; margin: 0; }
   #hotel-list { width: 45%; overflow-y: auto; padding: 10px; background: #f4f4f4; }
   #map { flex: 1; }
   .hotel-item { padding: 5px; cursor: pointer; display: none; }
   #hotel-details { position: absolute; bottom: 10px; left: 10px; background: white; padding: 10px; border-radius: 5px; display: none; }
</style>
<div class="main_map">
   <div id="hotel-list">
      <h3 class="reslt_fnd" > {{ $products->count() }} Result{{ $products->count() !== 1 ? 's' : '' }} Found</h3>
      @forelse ($products as $provider)
         @php
            $photos = json_decode($provider->companyDetail->photos ?? '[]', true);
            $logo = $provider->company_logo ?? null;
            $slogan = $provider->companyDetail->slogan ?? '';
            $about = $provider->companyDetail->about ?? '';
            $masked;
            if ($provider && $provider->phone) {
               $masked = substr($provider->phone, 0, 6) . '• • • •';
            } 
         @endphp

      <!-- ________________________________________________ITEM____START____HERE__________________________________- -->
      <div class="hotel-item" data-lat="18.5404" data-lng="73.8527">
         <div class="card rounded-3 border-0 shadow-sm w-100 flex-fill overflow-hidden card-hover flex-fill w-100 card-hover-bg">
            <!-- Card Image Wrap with Slider -->
            <a href="{{route('detail')}}" target="_blank" class="card-img-wrap card-image-hover overflow-hidden dark-overlay">
               <!-- Bootstrap Carousel -->
               <div id="hotelCarousel{{ $provider->id }}" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                     @if (!empty($photos))
                        @foreach ($photos as $index => $photo)
                           <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                              <img src="{{ asset('storage/' . $photo) }}" class="d-block w-100" alt="Photo {{ $index + 1 }}">
                           </div>
                        @endforeach
                     @else
                        <div class="carousel-item active">
                           <img src="{{ asset('assets/images/place/01.jpg')}}" class="d-block w-100" alt="Default Image">
                        </div>
                     @endif
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#hotelCarousel01" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#hotelCarousel01" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                  </button>
               </div>
               <div class="bg-blur card-badge d-inline-block position-absolute start-0 text-white z-2">
                  <i class="fa-solid fa-star"></i> <!-- Best Company of the Month -->
                  Top Rated 
               </div>
            </a>
            <div class="d-flex end-0 gap-2 me-3 mt-3 position-absolute top-0 z-1">
               <div class="align-items-center bg-blur btn-icon d-flex justify-content-center rounded-circle shadow-sm text-white" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Favorites">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                     <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"></path>
                  </svg>
               </div>
            </div>
            <div class="d-flex flex-column h-100 position-relative p-3">
               <a href="{{route('detail')}}" target="_blank" class="view_list">View</a>
               <h4 class="fs-18 fw-semibold mb-0">
                  <a href="{{route('detail')}}" target="_blank">{{ $provider->company_name }}</a>
               </h4>
               <div class="rating_sastar">
                  <span class="str_count" >4.2</span>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-half-o" aria-hidden="true"></i>

                  <div class="comnts_wrp">
                     <i class="fa fa-comment" aria-hidden="true"></i>
                     <div class="comts_text">120 Reviews</div>
                     <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
               <img src="{{ !empty($logo) ? asset('storage/' . $logo) : asset('assets/images/dummy_logo.jpg') }}" class="logo_ship" alt="Company Logo">
               <div class="catgry_wrp">
                  @foreach($provider->portServiceDetails as $portService)
                     @foreach($portService->subServiceModels() as $sub)
                        <div class="singl_cat">
                              <i class="fa fa-ship" aria-hidden="true"></i>
                              <div class="singl_name">{{ $sub->name }}</div>
                              <div class="clear"></div>
                        </div>
                     @endforeach
                  @endforeach
                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
               <div class="d-flex flex-wrap gap-3 mt-2 z-1">
                  <a href="tel:+" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                     <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#9b9b9b" class="bi bi-telephone" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                     </svg>
                     <span>{{ $masked }}</span>
                  </a>
                  <a href="#" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9b9b9b" class="bi bi-compass" viewBox="0 0 16 16">
                        <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                        <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z" />
                     </svg>
                     <span>Directions</span>
                  </a>
               </div>
            </div>
            <div class="reqs_qut">
               <label for="quoteOption">
                  <i class="fa fa-file-text-o" aria-hidden="true"></i>
                  <div class="req_text">Request a Quote</div>
               </label>
               <input type="checkbox" name="quoteSelection" id="quoteOption" class="reqs_cls" value="quote">
            </div>
            <div class="clear"></div>
         </div>
      </div>
      @empty
         <p>No results found.</p>
      @endforelse
      <div class="clear"></div>

      <div class="fre_busin_wrp">

         <div class="fre_servc_titl">All Service Providers in Our Network </div>
         <div class="clear"></div>

         <div class="singl_busn">
            <img src="{{ asset('assets/images/logo.jpg')}}" class="backg_logo" >
            <div class="singl_busn_titl">
               Lorem Business Name Here
            </div>
            <div class="clear"></div>
            <a href="">View</a>
         </div>

         <div class="singl_busn">
            <img src="{{ asset('assets/images/logo.jpg')}}" class="backg_logo" >
            <div class="singl_busn_titl">
               Lorem Business Name Here
            </div>
            <div class="clear"></div>
            <a href="">View</a>
         </div>

         <div class="singl_busn">
            <img src="{{ asset('assets/images/logo.jpg')}}" class="backg_logo" >
            <div class="singl_busn_titl">
               Lorem Business Name Here
            </div>
            <div class="clear"></div>
            <a href="">View</a>
         </div>

         <div class="singl_busn">
            <img src="{{ asset('assets/images/logo.jpg')}}" class="backg_logo" >
            <div class="singl_busn_titl">
               Lorem Business Name Here
            </div>
            <div class="clear"></div>
            <a href="">View</a>
         </div>

         <div class="singl_busn">
            <img src="{{ asset('assets/images/logo.jpg')}}" class="backg_logo" >
            <div class="singl_busn_titl">
               Lorem Business Name Here
            </div>
            <div class="clear"></div>
            <a href="">View</a>
         </div>

         <div class="singl_busn">
            <img src="{{ asset('assets/images/logo.jpg')}}" class="backg_logo" >
            <div class="singl_busn_titl">
               Lorem Business Name Here
            </div>
            <div class="clear"></div>
            <a href="">View</a>
         </div> 



      </div>

      <div class="clear"></div>


   </div>
   <div id="map"></div>
   <div id="hotel-details"></div>
</div>
<!-- Hidden content to show when checkbox is selected -->
<div id="quoteContent" class="conte_slide_text" style="display: none; margin-top: 10px;">
   <a href="" class="" >
   <i class="fa fa-file-text-o" aria-hidden="true"></i>
   Submit Quote
   </a>
</div>

@endsection
@section('scripts')
<!-- <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> -->
<script src="{{ asset('assets/js/map.js')}}"></script>
<script type="text/javascript"></script>
<script>
   const map = L.map('map').setView([18.5204, 73.8567], 13);
   L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
   
   const hotelItems = document.querySelectorAll('.hotel-item');
   const markers = [];
   const hotelDetails = document.getElementById('hotel-details');
   
   hotelItems.forEach(item => {
       const lat = parseFloat(item.getAttribute('data-lat'));
       const lng = parseFloat(item.getAttribute('data-lng'));
       const marker = L.marker([lat, lng]).addTo(map).bindPopup(item.textContent);
       markers.push({ marker, item });
       
       item.onclick = () => map.setView([lat, lng], 15);
       
       marker.on('click', () => {
           hotelDetails.textContent = `You selected: ${item.textContent}`;
           hotelDetails.style.display = 'block';
       });
   });
   
   function updateHotelList() {
       const bounds = map.getBounds();
       markers.forEach(({ marker, item }) => {
           if (bounds.contains(marker.getLatLng())) {
               item.style.display = "block";
           } else {
               item.style.display = "none";
           }
       });
   }
   
   map.on('moveend', updateHotelList);
   updateHotelList();
   
   
   
   hotelItems.forEach(item => {
    const lat = parseFloat(item.getAttribute('data-lat'));
    const lng = parseFloat(item.getAttribute('data-lng'));
    const marker = L.marker([lat, lng]).addTo(map).bindPopup(item.textContent);
    
    markers.push({ marker, item });
   
    item.onclick = () => map.setView([lat, lng], 15);
   
    marker.on('click', () => {
        hotelDetails.textContent = `You selected: ${item.textContent}`;
        hotelDetails.style.display = 'block';
    });
   
    // Smooth hover effect - Show only hovered marker
    item.addEventListener('mouseover', () => {
        markers.forEach(({ marker }) => {
            marker._icon.style.opacity = "1"; // Low opacity for other markers
        });
        marker._icon.style.opacity = "1"; // Fully visible for hovered marker
        marker._icon.classList.add('highlight');
    });
   
    // Remove highlight and restore all markers smoothly
    item.addEventListener('mouseout', () => {
        markers.forEach(({ marker }) => {
            marker._icon.style.opacity = "1"; // Bring back all markers smoothly
        });
        marker._icon.classList.remove('highlight');
    });
   });
   
   
   
   
   hotelItems.forEach(item => {
    const lat = parseFloat(item.getAttribute('data-lat'));
    const lng = parseFloat(item.getAttribute('data-lng'));
    const marker = L.marker([lat, lng]).addTo(map).bindPopup(item.textContent);
    
    markers.push({ marker, item });
   
    // No zoom or pan on item click — just popup + info
    item.onclick = () => {
        marker.openPopup();
        hotelDetails.textContent = `You selected: ${item.textContent}`;
        hotelDetails.style.display = 'block';
    };
   
    marker.on('click', () => {
        hotelDetails.textContent = `You selected: ${item.textContent}`;
        hotelDetails.style.display = 'block';
    });
   
    item.addEventListener('mouseover', () => {
        markers.forEach(({ marker }) => {
            marker._icon.style.opacity = "1";
        });
        marker._icon.style.opacity = "1";
        marker._icon.classList.add('highlight');
    });
   
    item.addEventListener('mouseout', () => {
        markers.forEach(({ marker }) => {
            marker._icon.style.opacity = "1";
        });
        marker._icon.classList.remove('highlight');
    });
   });
   
   
</script>  
<script>
   const checkbox = document.getElementById('quoteOption');
   const quoteContent = document.getElementById('quoteContent');
   
   checkbox.addEventListener('change', function () {
      if (this.checked) {
         quoteContent.style.display = 'block';
      }
   });
</script>
<script>
      // get port
      $('#country-select').on('change', function() {
        var countryId = $(this).val();
        let selectedPort = "{{ request('ports_services') }}";

        if (countryId) {
            $.ajax({
                url: '/get-ports/' + countryId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#ports_services').empty().append('<option value="">Select Port</option>');
                    $.each(data, function(key, port) {
                        $('#ports_services').append('<option value="'+ port.id +'" ' + (selectedPort == port.id ? 'selected' : '') + '>' + port.name + '</option>');
                    });
                }
            });
        } else {
            $('#ports_services').empty().append('<option value="">Select Port</option>');
        }
      });
      // get Sub category
      $('#service-type').on('change', function() {
         var serviceId = $(this).val();
         let selectedSubService = "{{ request('sub_service_type') }}"; // Get selected sub-service from old input

        if (serviceId) {
            $.ajax({
                url: '/get-sub-service/' + serviceId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#sub-service-type').empty().append('<option value="">Select Sub-Service Type</option>');
                    $.each(data, function(key, sub) {
                        $('#sub-service-type').append('<option value="'+ sub.id +'" ' + (selectedSubService == sub.id ? 'selected' : '') + '>' + sub.name + '</option>');
                    });
                }
            });
        } else {
            $('#sub-service-type').empty().append('<option value="">Select Sub-Service Type</option>');
        }
      });   

      $(document).ready(function() {
         let countryId = $('#country-select').val();
         if (countryId) {
            $('#country-select').trigger('change'); // triggers loading of ports
         }

         let categoryId = $('#service-type').val();
         if (categoryId) {
            $('#service-type').trigger('change'); // triggers loading of sub-services
         }
      });

</script>
@endsection
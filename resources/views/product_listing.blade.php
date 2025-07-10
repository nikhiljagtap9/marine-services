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
                  <option value="">Select Country</option>
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
                  <option value="">Select Service Type</option>
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
                  <option value="">Select Sub-Service Type</option>
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
               <select name="rating" class="serch_drop_select">
                  <option value="">Select Rating</option>
                  <option value="5" {{ request('rating') == 5 ? 'selected' : '' }}>
                     ★ ★ ★ ★ ★
                  </option>
                  <option value="4" {{ request('rating') == 4 ? 'selected' : '' }}>
                     ★ ★ ★ ★ 
                  </option>
                  <option value="3" {{ request('rating') == 3 ? 'selected' : '' }}>
                     ★ ★ ★ 
                  </option>
                  <option value="2" {{ request('rating') == 2 ? 'selected' : '' }}>
                     ★ ★ 
                  </option>
                  <option value="1" {{ request('rating') == 1 ? 'selected' : '' }}>
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
  /* .hotel-item { padding: 5px; cursor: pointer; display: none; } */
   #hotel-details { position: absolute; bottom: 10px; left: 10px; background: white; padding: 10px; border-radius: 5px; display: none; }
</style>
<div class="main_map">
   <div id="hotel-list">
      <h3 class="reslt_fnd" > {{ $products->total() }} Result{{ $products->total() !== 1 ? 's' : '' }} Found</h3>
      <div id="product-list">
         <form id="quoteRequestForm" action="{{ route('quotes.store') }}" method="POST">
         @csrf
            @include('partials.product_item', ['products' => $products])
         </form>
      </div>
     
      <div class="clear"></div>

      <!-- <div id="load-more" class="text-center mt-4">
         <p class="text-muted">Scroll down to load more...</p>
      </div> -->

      <div class="fre_busin_wrp">

         <div class="fre_servc_titl">All Service Providers in Our Network </div>
         <div class="clear"></div>
         @forelse($plan1Providers as $provider)
            @php
               $subscription = $provider->user->subscriptions->firstWhere('status', 'active');
               $logo = $provider->company_logo ?? null;
               $photos = []; // Optional: load from DB if available (else show default image)
            @endphp
           
            <div class="singl_busn">
               <img src="{{ !empty($logo) ? asset('storage/' . $logo) : asset('assets/images/dummy_logo.jpg') }}" class="backg_logo">
               <div class="singl_busn_titl">
                     {{ $provider->company_name }}
               </div>
               <div class="clear"></div>
               <a href="{{ route('basic-detail', $subscription?->id) }}" target="_blank">View</a>
            </div>
         @empty
            <p>No free profiles found.</p>
         @endforelse

      </div>

      <div class="clear"></div>


   </div>
   <div id="map"></div>
   <div id="hotel-details"></div>
</div>
<!-- Hidden content to show when checkbox is selected -->
<div id="quoteContent" class="conte_slide_text" style="display: none; margin-top: 10px;">
   <button type="submit" form="quoteRequestForm" class="btn btn-primary">
      <i class="fa fa-file-text-o" aria-hidden="true"></i>
      Submit Quote
   </button>
</div>
@endsection
@section('scripts')
<!-- <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> -->
<script src="{{ asset('assets/js/map.js')}}"></script>
<script type="text/javascript"></script>
<script>
   // Use blade echo to inject PHP variables into JS
    // Passing PHP variables into JS variables
    const mapContainer = document.getElementById('map-container');
    const lat = parseFloat(mapContainer.getAttribute('data-lat'));
    const lng = parseFloat(mapContainer.getAttribute('data-lng'));
   const map = L.map('map').setView([lat, lng], 13);
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
document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.quoteOption');
    const quoteContent = document.getElementById('quoteContent');

    function toggleQuoteButton() {
        // Check if at least one checkbox is checked
        const anyChecked = Array.from(checkboxes).some(cb => cb.checked);
        quoteContent.style.display = anyChecked ? 'block' : 'none';
    }

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', toggleQuoteButton);
    });

    // Optional: run on page load in case some checkboxes are pre-selected
    toggleQuoteButton();
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
<script>
  // Scroll logic using #hotel-list
// let page = 2; // Start from the second page
// let loading = false;
// let noMoreData = false;

// const $hotelList = $('#hotel-list');

// $hotelList.scroll(function () {
//     if (loading || noMoreData) return;

//     const nearBottom = $hotelList.scrollTop() + $hotelList.innerHeight() >= $hotelList[0].scrollHeight - 50;

//     if (nearBottom) {
//         loading = true;

//         $.ajax({
//             url: `?page=${page}`,
//             type: 'get',
//             beforeSend: function () {
//                 $('#load-more').html('<p class="text-muted">Loading...</p>');
//             },
//             success: function (data) {
//                 if (data.trim() === '') {
//                     $('#load-more').html('<p class="text-muted">No more results</p>');
//                     noMoreData = true;
//                     return;
//                 }

//                 $('#product-list').append(data);
//                 $('#load-more').html('<p class="text-muted">Scroll down to load more...</p>');
//                 page++;
//                 loading = false;
//             },
//             error: function () {
//                 $('#load-more').html('<p class="text-danger">Failed to load more results</p>');
//                 loading = false;
//             }
//         });
//     }
// });
</script>


@endsection
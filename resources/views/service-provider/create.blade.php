@extends('service-provider.main')

@section('content')
      <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->
      <div id="preloader" class="preloader">
         <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
         </div>
      </div>
      <section class="fxt-template-animation fxt-template-layout35">
         <div class="fxt-content-wrap">
            <div class="fxt-heading-content">
               <div class="fxt-inner-wrap">
                  <div class="fxt-transformX-R-50 fxt-transition-delay-10">
                     <a href="#" class="fxt-logo"><img src="assets/img/logo.png" alt="Logo"></a>
                  </div>
                  <div class="fxt-transformX-R-50 fxt-transition-delay-10">
                     <div class="fxt-middle-content">
                        <h1 class="fxt-main-title">Only 15 Paid Memberships Allowed per Port & Category</h1>
                        <p class="fxt-description tex_sub2">
                           Silver, Gold, or Platinum — doesn’t matter. <br>
                           Each port and each main category is limited to just 15 paid companies.<br>
                           Once the 15 slots are gone, they’re gone for that year !!!<br>
                           Even if you're ready to pay, you won’t be eligible.
                        </p>
                        <div class="clear"></div>
                        <div class="ind_sub_1">
                           ✅Full Profile &nbsp;|&nbsp; ⭐ Reviews &nbsp;|&nbsp; 📍 Map Visibility – Only for the First 15
                        </div>
                        <div class="indx_slide">
                           <div class="slider">
                              <!-- <button class="arrow left">&#10094;</button> -->
                              <div class="slides" id="slides">
                                 <div class="slide">
                                    <div class="laun_titl">
                                       🧊 What Happens If You Miss the Cut?
                                    </div>
                                    <div class="laun_titl_text">
                                       You can still register for a Free Membership —
                                       but your company will only appear as a name in the list.
                                       No profile. No visibility. No ratings. No leads.
                                       You’ll be invisible. <br>
                                       This platform rewards first movers, not latecomers.
                                    </div>
                                 </div>
                              </div>
                              <!-- <button class="arrow right">&#10095;</button> -->
                           </div>
                        </div>
                        <div class="clear"></div>
                        <div class="be_one_wrp">
                           <div class="be_one">
                              👉 Be one of the 15. Or be left behind.
                           </div>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="fxt-form-content">
               <div class="fxt-main-form">
                  <div class="fxt-inner-wrap fxt-opacity fxt-transition-delay-13">
                     <div>
                        <!-- Progressbar -->
                        <div class="mb-5 d-grid">
                           <div class="fxt-steps">
                              <span class="fxt-current-step"></span> of
                              <span class="fxt-total-step"></span> completed
                           </div>
                           <div class="progress">
                              <div class="progress-bar progress-bar-solid progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                              </div>
                           </div>
                        </div>
                        @if ($errors->any())
                           <div class="alert alert-danger">
                              <ul>
                                    @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                    @endforeach
                              </ul>
                           </div>
                        @endif
                        <!-- Form -->
                        <form action="{{ route('service-provider.store') }}" method="POST" enctype="multipart/form-data"> 
                           @csrf
                           @include('service-provider.steps.step1')
                           @include('service-provider.steps.step2')
                           @include('service-provider.steps.step3')
                           @include('service-provider.steps.step4')
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection

@section('scripts')

 <!-- jquery-->
<script>
   const slides = document.getElementById('slides');
   const slideCount = slides.children.length;
   let index = 0;
   
   function updateSlider() {
      slides.style.transform = 'translateX(' + (-index * 100) + '%)';
   }
   
   document.querySelector('.arrow.left').addEventListener('click', () => {
      index = (index - 1 + slideCount) % slideCount;
      updateSlider();
      resetAutoSlide();
   });
   
   document.querySelector('.arrow.right').addEventListener('click', () => {
      index = (index + 1) % slideCount;
      updateSlider();
      resetAutoSlide();
   });
   
   function autoSlide() {
      index = (index + 1) % slideCount;
      updateSlider();
   }
   
   let autoSlideInterval = setInterval(autoSlide, 3000);
   
   function resetAutoSlide() {
      clearInterval(autoSlideInterval);
      autoSlideInterval = setInterval(autoSlide, 3000);
   }
</script>

 <!-- Google Autocomplete Script -->
<script src="https://maps.googleapis.com/maps/api/js?key={{ $googleMapsKey }}&libraries=places"></script>
<script>
    function initAutocomplete() {
      const input = document.getElementById('office_address');
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

<script>
   // get city
      $('#country-select').on('change', function() {
        var countryId = $(this).val();

        if (countryId) {
            $.ajax({
                url: '/get-cities/' + countryId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#city-select').empty().append('<option value="">Select City</option>');
                    $.each(data, function(key, city) {
                        $('#city-select').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                }
            });
        } else {
            $('#city-select').empty().append('<option value="">Select City</option>');
        }

        if (countryId) {
            $.ajax({
                url: '/get-ports/' + countryId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#ports_services').empty().append('<option value="">Select Port</option>');
                    $.each(data, function(key, port) {
                        $('#ports_services').append('<option value="' + port.id + '">' + port.name + '</option>');
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

        if (serviceId) {
            $.ajax({
                url: '/get-sub-service/' + serviceId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#sub-service-type').empty().append('<option value="">Select Sub-Services</option>');
                    $.each(data, function(key, sub_service) {
                        $('#sub-service-type').append('<option value="' + sub_service.id + '">' + sub_service.name + '</option>');
                    });
                }
            });
        } else {
            $('#sub-service-type').empty().append('<option value="">Select Sub-Services</option>');
        }
    });

</script>


@endsection

@extends('layouts.main')

@section('content')
    <style type="text/css">
   .actv_home{
   border-color: #fff !important;
   color: #fff !important;
   font-weight: 600 !important;
   }
   .navbar-bg .actv_home{
   border-color: #124f98 !important;
   color: #124f98 !important;
   }
</style>
<!-- start hero header (classic) -->
<div class="align-items-center bg-dark d-flex hero-header-classic overflow-hidden position-relative">
   <!-- start background image -->
   <video class="video_backg bg-image-overlay bg-gradient-vertical js-bg-image bg-cover bottom-0 end-0 position-absolute start-0 top-0"  autoplay muted loop >
      <source src="{{ asset('assets//images/vi.mp4')}}" type="video/mp4">
      <source src="{{ asset('assets//images/vi.mp4')}}" type="video/ogg">
   </video>
   <div class="bg-image-overlay bg-gradient-vertical js-bg-image bg-cover bottom-0 end-0 position-absolute start-0 top-0 bg_video">
   </div>
   <!-- <div class="bg-image-overlay bg-gradient-vertical js-bg-image bg-cover bottom-0 end-0 position-absolute start-0 top-0" data-image-src="{{ asset('assets//images/header/lg-02.jpg')}}"></div> -->
   <!-- end /. background image -->
   <div class="container position-relative z-1">
      <!-- <div class="hero-header-subtitle text-center text-white text-uppercase mb-3">WE ARE #1 ON THE MARKET</div> -->
      <h1 class="display-1 fw-bold hero-header_title text-capitalize text-white text-center mb-5 aos-init animate__animated animate__zoomIn main_titl"  data-wow-duration="1.5s" data-wow-delay="0.0s">
         Discover Reliable Marine Services at Any Port
      </h1>
      <!-- <div class="" data-aos="fade-in" data-aos-delay="14400"  >
         <span class="lead_line " id="sub_line"  >
         Rated by Mariners &nbsp; | &nbsp; Powered by Maps 
         </span>
      </div> -->

      <div class="new_lft main_titl_2" data-aos="zoom-in" data-aos-delay="3000" >
         Rated by Mariners &nbsp; | &nbsp; Powered by Maps 
      </div>
      <div class="row justify-content-center">
         <div class="col-lg-12">
            <form action="{{ route('product_listing') }}" method="GET">
               <div class="serch_main  aos-init animate__animated animate__fadeIn" data-wow-offset="200">
                  <div class="serch_drop aos-init"  data-aos="fade-in" data-aos-delay="400" >
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
                           <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="serch_drop aos-init" data-aos="fade-in" data-aos-delay="600" >
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
                  <div class="serch_drop aos-init " data-aos="fade-in" data-aos-delay="800" >
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
                           <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="serch_drop aos-init" data-aos="fade-in" data-aos-delay="1000" >
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
                  <div class="serch_drop aos-init" data-aos="fade-in" data-aos-delay="1200" >
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
                        <option value="5">
                           ★ ★ ★ ★ ★
                        </option>
                        <option value="4">
                           ★ ★ ★ ★ 
                        </option>
                        <option value="3">
                           ★ ★ ★ 
                        </option>
                        <option value="2">
                           ★ ★ 
                        </option>
                        <option value="1">
                           ★ 
                        </option>
                     </select>
                  </div>
                  <button type="submit" class="search_btn aos-init" data-aos="zoom-in" data-aos-delay="1400" >
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




          <div class="clear"></div>
<div class="video_word_aa">
    Video from <a href="https://www.shipmap.org/" target="_blank" > shipmap.org</a>
</div>
<div class="clear"></div>


      </div>
   </div>
</div>
 


 


<div class="section">



<!-- end /. hero header (classic) -->
<div class="py-5 border-top position-relative overflow-hidden text-white index_sec index_sec_2"  >


   <div class="container py-4">

      
      <div class="row justify-content-center">

         





         <div class="col-sm-10 col-md-10 col-lg-8 col-xl-7">
            <!-- start section header -->
            <div class="section-header text-center mb-5" data-aos="fade-down">
               <!-- start subtitle -->
               <!-- <div class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize text-primary">Best Way</div> -->
               <!-- end /. subtitle -->
               <!-- start title -->





               <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize aos-init animate__animated animate__fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                  Your experience shapes the industry.
               </h2>
               <!-- end /. title -->
               <!-- start description -->
               <!--  <div class="sub-title fs-16">Discover exciting categories. <span class="text-primary fw-semibold">Find what you’re looking for.</span></div> -->
               <!-- end /. description -->
            </div>
            <!-- end /. section header -->
         </div>
      </div>
      <div class="bg-no-repeat numbers-wrapper">
         <div class="row g-4">
            <div class="col-md-4">
               <div class="mx-xl-4 number-wrap text-center" data-aos="zoom-in" data-aos-delay="500">
                  <div class="align-items-center bg-primary d-flex font-caveat fs-1 justify-content-center mb-4 mx-auto number-circle rounded-circle text-white">1</div>
                  <div class="list_dot  aos-init animate__animated animate__rubberBand" data-wow-duration="1s" data-wow-delay="0.6s" >
                     <div class="list_dot_iner"> Filter by Service, Port, Country, or Rating</div>
                     <div class="list_dot_iner">Browse the map for nearby providers</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="mx-xl-4 number-wrap text-center second" data-aos="zoom-in" data-aos-delay="750">
                  <div class="align-items-center bg-primary d-flex font-caveat fs-1 justify-content-center mb-4 mx-auto number-circle rounded-circle text-white">2</div>
                  <div class="list_dot aos-init animate__animated animate__rubberBand" data-wow-duration="1s" data-wow-delay="0.6s">
                     <div class="list_dot_iner">Check ratings and real reviews</div>
                     <div class="list_dot_iner">Make informed decisions</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="mx-xl-4 number-wrap text-center" data-aos="zoom-in" data-aos-delay="1000">
                  <div class="align-items-center bg-primary d-flex font-caveat fs-1 justify-content-center mb-4 mx-auto number-circle rounded-circle text-white">3</div>
                  <div class="list_dot aos-init animate__animated animate__rubberBand" data-wow-duration="1s" data-wow-delay="0.6s">
                     <div class="list_dot_iner">Request quotes or contact providers directly</div>
                     <div class="list_dot_iner">Rate your experience to help others</div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="counter_sec">
   <div class="wit_count_titl aos-init" data-aos="zoom-in" data-aos-delay="500">
      With Our Growing Family Every Day, <br> We Connect Shipowners with the Best Marine Service Providers
   </div>
   <div class="clear"></div>
   <div class="container">
      <div class="card aos-init " data-aos="zoom-in" data-aos-delay="600">
         <div class="number" data-target="120">0</div>
         <div class="label">Ship Chandlers</div>
      </div>
      <div class="card aos-init" data-aos="zoom-in" data-aos-delay="700">
         <div class="number" data-target="85">0</div>
         <div class="label">Ship Management Companies</div>
      </div>
      <div class="card aos-init " data-aos="zoom-in" data-aos-delay="800">
         <div class="number" data-target="65">0</div>
         <div class="label">Marine Repair Companies</div>
      </div>
      <div class="card aos-init " data-aos="zoom-in" data-aos-delay="700">
         <div class="number" data-target="40">0</div>
         <div class="label">Shipyards</div>
      </div>
      <div class="card aos-init " data-aos="zoom-in" data-aos-delay="600">
         <div class="number" data-target="30">0</div>
         <div class="label">Other Service Providers</div>
      </div>
   </div>
   <video class="bg_map_a"  autoplay muted loop >
      <source src="{{ asset('assets//images/vi.mp4')}}" type="video/mp4">
      <source src="{{ asset('assets//images/vi.mp4')}}" type="video/ogg">
   </video>
   <!--  <img src="{{ asset('assets//images/bg_counter.jpg')}}" class="bg_map_a" > -->
</div>
<div class="bg-dark overflow-hidden position-relative py-5 sec_indx_3">
   <div class="container pb-4">
      <div class="row justify-content-center">
         <div class="col-sm-10 col-md-10 col-lg-12 col-xl-12">
            <!-- start section header -->
            <div class="section-header text-center mb-5" data-aos="fade-down">
               <!-- start subtitle -->
               <!-- <div class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize text-primary">Companies</div> -->
               <!-- end /. subtitle -->
               <!-- start title -->
               <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize">
                  Top Rated / Most Reviewed Marine Service Providers
               </h2>
               <!-- end /. title -->
               <!-- start description -->
               <div class="sub-title fs-16">Discover exciting Companies. <span class="text-primary fw-semibold">Find what you’re looking for.</span></div>
               <!-- end /. description -->
            </div>
            <!-- end /. section header -->
         </div>
      </div>
      <div class="owl-carousel owl-theme compny_crsl owl-nav-center" data-aos="fade-left">
         <div class="region-card rounded-4 overflow-hidden position-relative text-white compny_detil_out">
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/05.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/dummy_logo.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/01.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/logo_2.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/02.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/dummy_logo.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/04.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/logo_2.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/03.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/dummy_logo.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
         </div>
         <div class="region-card rounded-4 overflow-hidden position-relative text-white compny_detil_out">
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/05.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/dummy_logo.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/01.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/logo_2.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/02.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/dummy_logo.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/04.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/logo_2.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/03.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/dummy_logo.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
         </div>
      </div>
   </div>
</div>
<!-- end /. process -->
<!-- start explore cities & about -->
<div class="py-5 bg-primary position-relative overflow-hidden text-white bg-primary bg-size-contain home-about js-bg-image" data-image-src="{{ asset('assets//images/lines.svg')}}">
   <div class="container py-4">
      <div class="row justify-content-center">
         <div class="row justify-content-center">
            <div class="col-sm-10 col-md-10 col-lg-8 col-xl-7">
               <!-- start section header -->
               <div class="section-header text-center mb-5" data-aos="fade-down">
                  <!-- start subtitle -->
                  <!-- <div class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize">
                     New service providers
                     </div> -->
                  <!-- end /. subtitle -->
                  <!-- start title -->
                  <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize">
                     Newly Joined service providers
                  </h2>
                  <!-- end /. title -->
                  <!-- start description -->
                  <div class="sub-title fs-16">Discover exciting Companies. <span class="fw-semibold">Find what you’re looking for.</span></div>
                  <!-- end /. description -->
               </div>
               <!-- end /. section header -->
            </div>
         </div>
      </div>
      <!-- start place carousel -->
      <div class="owl-carousel owl-theme place-carousel owl-nav-center" data-aos="fade-left">
         <!-- start region card -->
         <div class="region-card rounded-4 overflow-hidden position-relative text-white">
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/03.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/dummy_logo.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
         </div>
         <div class="region-card rounded-4 overflow-hidden position-relative text-white">
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/03.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/dummy_logo.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
         </div>
         <div class="region-card rounded-4 overflow-hidden position-relative text-white">
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/03.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/dummy_logo.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
         </div>
         <div class="region-card rounded-4 overflow-hidden position-relative text-white">
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/03.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/dummy_logo.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
         </div>
         <div class="region-card rounded-4 overflow-hidden position-relative text-white">
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/03.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/dummy_logo.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
         </div>
         <div class="region-card rounded-4 overflow-hidden position-relative text-white">
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/03.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/dummy_logo.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
         </div>
         <div class="region-card rounded-4 overflow-hidden position-relative text-white">
            <a href="#" class="compny_detil">
               <img src="{{ asset('assets//images/place/03.jpg')}}" class="img_post_copmny" >
               <div class="img_infor">
                  <img src="{{ asset('assets//images/dummy_logo.jpg')}}" class="compny_logo_a" >
                  <div class="compny_name">Business Name Here</div>
                  <div class="rating_sastar rating_sastar_hom" bis_skin_checked="1">
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star" aria-hidden="true"></i>
                     <i class="fa fa-star-o" aria-hidden="true"></i>
                     <div class="clear"></div>
                     <div class="comnts_wrp" bis_skin_checked="1">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        <div class="comts_text" bis_skin_checked="1">120 Reviews</div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                     <div class="clear" bis_skin_checked="1"></div>
                  </div>
               </div>
            </a>
         </div>
      </div>
   </div>
</div>
<!-- end /. blog section -->
<div class="py-5 position-relative overflow-hidden">
   <div class="container py-4">
      <div class="row justify-content-center">
         <div class="col-sm-10 col-md-10 col-lg-8 col-xl-7">
            <!-- start section header -->
            <div class="section-header text-center mb-5" data-aos="fade-down">
               <!-- start subtitle -->
               <!-- <div class="d-inline-block font-caveat fs-1 fw-medium section-header__subtitle text-capitalize text-primary">Our Latest Blogs</div> -->
               <!-- end /. subtitle -->
               <!-- start title -->
               <h2 class="display-5 fw-semibold mb-3 section-header__title text-capitalize">
                  Our Blogs
               </h2>
            </div>
            <!-- end /. section header -->
         </div>
      </div>
      <div class="blog-carousel owl-carousel owl-theme owl-nav-bottom aos-init animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" >
         <!-- start article -->
         <article class="card h-100 overflow-hidden">
            <div class="position-relative overflow-hidden">
               <img src="{{ asset('assets//images/blog/01-lg.jpg')}}" class="card-img-top image-zoom-hover" alt="Image">
            </div>
            <div class="card-body">
               <div class="hstack gap-3 mb-3">
                  <span class="fs-sm small text-muted svg_lft">
                     <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.25"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-event">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                        <path d="M16 3l0 4" />
                        <path d="M8 3l0 4" />
                        <path d="M4 11l16 0" />
                        <path d="M8 15h2v2h-2z" />
                     </svg>
                     30-March-2025
                  </span>
               </div>
               <h3 class="h5 fw-semibold mb-0 post-title overflow-hidden">
                  <a href="#">
                  POSH and PCL Select SeaProc to Power Digital Procurement for All Commercial and Offshore Vessels
                  </a>
               </h3>
               <div class="blog_sub2">
                  PACC Offshore Services Holdings Ltd and Pacific Carriers Limited have selected iMarine Software (SeaProc) to digitally..
               </div>
            </div>
            <div class="card-footer py-3">
               <a href="">
               Read More
               </a>
            </div>
         </article>
         <article class="card h-100 overflow-hidden">
            <div class="position-relative overflow-hidden">
               <img src="{{ asset('assets//images/blog/02-lg.jpg')}}" class="card-img-top image-zoom-hover" alt="Image">
            </div>
            <div class="card-body">
               <div class="hstack gap-3 mb-3">
                  <span class="fs-sm small text-muted svg_lft">
                     <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.25"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-event">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                        <path d="M16 3l0 4" />
                        <path d="M8 3l0 4" />
                        <path d="M4 11l16 0" />
                        <path d="M8 15h2v2h-2z" />
                     </svg>
                     30-March-2025
                  </span>
               </div>
               <h3 class="h5 fw-semibold mb-0 post-title overflow-hidden">
                  <a href="#">
                  d'Amico Società di Navigazione selects SeaProc to process Procurement across Global Maritime Fleet of 70 vessels
                  </a>
               </h3>
               <div class="blog_sub2">
                  We are pleased to announce that d'Amico Società di Navigazione has entered into an agreement with iMarine Software...
               </div>
            </div>
            <div class="card-footer py-3">
               <a href="">
               Read More
               </a>
            </div>
         </article>
         <article class="card h-100 overflow-hidden">
            <div class="position-relative overflow-hidden">
               <img src="{{ asset('assets/images/blog/03-lg.jpg')}}" class="card-img-top image-zoom-hover" alt="Image">
            </div>
            <div class="card-body">
               <div class="hstack gap-3 mb-3">
                  <span class="fs-sm small text-muted svg_lft">
                     <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1.25"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-event">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                        <path d="M16 3l0 4" />
                        <path d="M8 3l0 4" />
                        <path d="M4 11l16 0" />
                        <path d="M8 15h2v2h-2z" />
                     </svg>
                     30-March-2025
                  </span>
               </div>
               <h3 class="h5 fw-semibold mb-0 post-title overflow-hidden">
                  <a href="#">
                  iMarine Software and ABS Nautical Systems Enhance Partnership to Solve Procurement Challenges for Shipping Industry
                  </a>
               </h3>
               <div class="blog_sub2">
                  ABS Nautical Systems (ABS NS), a leading provider of Fleet Management Software and iMarine Software (SeaProc),...
               </div>
            </div>
            <div class="card-footer py-3">
               <a href="">
               Read More
               </a>
            </div>
         </article>
      </div>
   </div>
</div>

@endsection
@section('scripts')
 <script>
   setTimeout(() => {
     document.getElementById("sub_line").classList.add("active_line");
   }, 2000); // 1 second = 1000 milliseconds
</script>
<script>
      // get port
      $('#country-select').on('change', function() {
        var countryId = $(this).val();

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
                    $('#sub-service-type').empty().append('<option value="">Select Sub-Service Type</option>');
                    $.each(data, function(key, sub_service) {
                        $('#sub-service-type').append('<option value="' + sub_service.id + '">' + sub_service.name + '</option>');
                    });
                }
            });
        } else {
            $('#sub-service-type').empty().append('<option value="">Select Sub-Service Type</option>');
        }
    });   
</script>
@endsection

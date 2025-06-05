<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="{{ asset('assets/images/fev.png')}}" />
      <title>Rated Marine Services</title>
      <link rel="stylesheet"href="{{ asset('assets/css/animation.css')}}" />

      <link href="{{ asset('assets/plugins/aos/aos.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"rel="stylesheet">
      <link href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/plugins/OwlCarousel2/css/owl.carousel.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/plugins/OwlCarousel2/css/owl.theme.default.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/plugins/jquery-fancyfileuploader/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/plugins/ion.rangeSlider/ion.rangeSlider.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/plugins/select2-bootstrap-5/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet">
      <!-- Custom style for this template -->
      <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">


   </head>
   <body>
      <!-- start navbar -->
      
<!-- start navbar -->
<nav class="custom-navbar navbar navbar-expand-lg navbar-fixed navbar-transfarent">
  <div class="container">

    <!-- Logo -->
    <!-- <a class="navbar-brand m-0" href="{{ url('/') }}" data-aos="fade-right" data-aos-delay="400">
      <img class="logo-white" src="{{ asset('assets/images/logo.png') }}" alt="">
      <img class="logo-dark" src="{{ asset('assets/images/logo.png') }}" alt="">
    </a> -->

     <a class="navbar-brand m-0" href="#" data-aos="fade-right" data-aos-delay="400">
      <img class="logo-white" src="{{ asset('assets/images/logo.png') }}" alt="">
      <img class="logo-dark" src="{{ asset('assets/images/logo.png') }}" alt="">
    </a>

    <!-- Right Side Buttons -->
    <div class="d-flex order-lg-2">
      @guest
      <!-- Login -->
      <a href="{{route('login')}}" class="btn-user position-relative d-flex align-items-center justify-content-center p-0"
         data-aos="fade-left" data-aos-delay="1200"
         data-bs-toggle="tooltip" data-bs-placement="bottom" title="Login">
        <i class="fa fa-sign-in"></i>
      </a>

      <!-- Register -->
      <a href="{{route('register')}}" class="btn-user position-relative d-flex align-items-center justify-content-center p-0"
         data-aos="fade-left" data-aos-delay="1200"
         data-bs-toggle="tooltip" data-bs-placement="bottom" title="Register">
        <i class="fa fa-user-plus"></i>
      </a>
      @endguest

      @auth
          <!-- Logout -->
          <a href="javascript:void(0);"
            class="btn-user position-relative d-flex align-items-center justify-content-center p-0"
            data-aos="fade-left" data-aos-delay="1200"
            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
      @endauth

      <!-- Favourites -->
      <a href="#" class="btn-user position-relative d-flex align-items-center justify-content-center p-0"
         data-aos="fade-left" data-aos-delay="1200"
         data-bs-toggle="tooltip" data-bs-placement="bottom" title="Favourite">
        <i class="fa-solid fa-heart"></i>
        
      </a>

      @guest
      <!-- Add Listing -->
      <a href="{{route('service-provider.create')}}" class="btn btn-primary d-none d-sm-flex align-items-center gap-2 rounded-5 bold_listng"
         data-aos="zoom-in" data-aos-delay="1500">
        <i class="bi bi-plus-circle"></i>
        <span class="d-none d-sm-inline-block">Add Listing</span>
      </a>
      @endguest

      <!-- Toggle -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
         data-aos="fade-in" data-aos-delay="600">
        <span id="nav-icon">
          <span></span><span></span><span></span>
        </span>
      </button>
    </div>

    <!-- Navbar Items -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0" data-aos="fade-down" data-aos-delay="200">
         <li class="nav-item" data-aos="fade-up" data-aos-delay="700">
          <a class="nav-link actv_pric actv_home" href="{{route('pricing')}}">Pricing</a>
        </li>
        <!-- <li class="nav-item" data-aos="fade-up" data-aos-delay="550">
          <a class="nav-link actv_home" href="{{ url('/') }}">Home</a>
        </li> -->
        <!-- <li class="nav-item" data-aos="fade-up" data-aos-delay="600">
          <a class="nav-link actv_expl" href="{{route('product_listing')}}">Explore</a>
        </li> -->
        <!-- <li class="nav-item" data-aos="fade-up" data-aos-delay="700">
          <a class="nav-link actv_pric actv_home" href="{{route('pricing')}}">Pricing</a>
        </li> -->
        <!-- <li class="nav-item" data-aos="fade-up" data-aos-delay="800">
          <a class="nav-link about_activ" href="{{route('about_us')}}">About Us</a>
        </li>
        <li class="nav-item" data-aos="fade-up" data-aos-delay="900">
          <a class="nav-link" href="#">Contact Us</a>
        </li> -->
      </ul>

      <!-- Add Listing Button (Mobile) -->
      <div class="d-sm-none" data-aos="zoom-in" data-aos-delay="1200">
        <a href="{{route('service-provider.create')}}" class="btn btn-primary d-flex gap-2 align-items-center justify-content-center rounded-3">
          <i class="bi bi-plus-circle"></i>
          <span>Add Listing</span>
        </a>
      </div>
    </div>
  </div>
</nav>
<!-- end navbar -->

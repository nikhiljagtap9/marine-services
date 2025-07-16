@extends('layouts.main')

@section('content')

<div class="clear"></div>
<br><br> 
<div class="clear"></div>
<style type="text/css">
   .footer-dark.main-footer .container.pt-4{
   display: none;
   }
   .custom-navbar.navbar{
   display: none;
   }
   body{
   background:#f7f7f7;
   }
</style>
<link rel="stylesheet" href="assets/css/internal_page.css">
<div class="p-3 p-sm-5">
   <div class="row g-4 g-xl-5 justify-content-between login_page_cs">
      <div class="col-xl-6 d-none d-xl-block">
         <img src="assets/images/login_back.png" class="login_left" >
      </div>
      <div class="col-xl-6 d-flex justify-content-center">
         <div class="authentication-wrap overflow-hidden position-relative text-center text-sm-start my-5">
            <!-- Start Header Text -->
            <div class="mb-5">
               <!-- <h2 class="display-6 fw-semibold mb-3">Welcome back!</h2> -->
               <p class="mb-0 cont_tx">
                  Please Sign in to Continue.
               </p>
            </div>
            <!-- /.End Divider -->
            <form class="register-form" method="POST" action="{{ route('login') }}">
               @csrf
                <!-- Start Form Group -->
               <div class="form-group mb-4">
                  <input type="hidden" name="redirect" value="{{ request('redirect') }}">
                    <label class="required">Enter Email</label>
                    <input type="email" name="email" id="email"  class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback text-start">{{ $message }}</div>
                    @enderror
               </div>
               <!-- /.End Form Group -->
               <!-- Start Form Group -->
               <div class="form-group mb-4">
                    <label class="required">Password</label>
                    <input type="password" name="password" id="password" class="form-control password @error('password') is-invalid @enderror" autocomplete="off">
                    <i data-bs-toggle="#password" class="fa fa-regular fa-eye-slash toggle-password"></i>
                    @error('password')
                        <div class="invalid-feedback text-start">{{ $message }}</div>
                    @enderror
               </div>
               <!-- /.End Form Group -->
               <!-- Start Checkbox -->
               <div class="form-check mb-4 text-start">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">Remember me next time</label>
               </div>
               <!-- /.End Checkbox -->
               <!-- Start Button -->
               <button type="submit" class="btn btn-primary btn-lg w-100">Sign In</button>
               <!-- End Button -->
            </form>
            <!-- Start Bottom Text -->
           <!-- <pre>Session: {{ session('show_provider_register') ? 'SET' : 'NOT SET' }}</pre> -->

            @guest
               @if (session('show_provider_register'))
                  <div class="text-center mt-4">
                        Not registered yet? -
                        <a href="{{ route('service-provider.create') }}" class="fw-medium text-decoration-underline">[Create your Service Provider account]</a>
                  </div>
                  @php session()->forget('show_provider_register'); @endphp
               @else
                 <div class="text-center mt-4"> 
                  Not registered yet? <a href="{{route('register')}}" class="fw-medium text-decoration-underline"> [Create your User account] </a>
               @endif
            </div> 
            @endguest

            <!-- /.End Bottom Text -->
            <!-- <div class="or_cont_with">
               <div class="text-center"> Register as a Service Provider - <a href="{{route('service-provider.create')}}" class="fw-medium text-decoration-underline">Register Now</a>
            </div> -->
               <!-- <p>Or continue with</p>
               <div class="social-login">
                  <div class="social-btn"><i class="fa fa-google"></i></div>
                  <div class="social-btn"><i class="fa fa-facebook"></i></div>
                  <div class="social-btn"><i class="fa fa-twitter"></i></div>
               </div> -->
            </div>
            <div class="clear"></div>
         </div>
      </div>
   </div>
   <div class="clear"></div>
</div>
<div class="clear"></div>

@endsection





@extends('layouts.main')

@section('content')

<div class="clear"></div>
<br><br> 
<div class="clear"></div>
<style type="text/css">
    
   .footer-dark.main-footer .container.pt-4{
   display: none;
   }

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
        <div class="row g-4 g-xl-5 justify-content-between login_page_cs regi_page_cs">
            <div class="col-xl-6 d-flex justify-content-center">
                <div class="authentication-wrap overflow-hidden position-relative text-center text-sm-start my-5">
                    <!-- Start Header Text -->
                    <div class="mb-5">
                        <h2 class="display-6 fw-semibold mb-3">Welcome to <br> Rated Marine Services!<br></h2>
                         
                    </div>
                    <!-- /.End Header Text -->
                    <!-- Start Social Button Wrapper -->
                    
                    <!-- /.End Divider -->
                    <form class="register-form" method="POST" action="{{ route('register') }}">
                         @csrf
                        <!-- Start Form Group -->
                        <div class="form-group mb-4">
                            <label class="required">Company Name or Vessel Name </label>
                            <input type="text" name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}">
                            @error('company_name')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- /.End Form Group -->
                        <!-- Start Form Group -->
                        <div class="form-group mb-4">
                            <label class="required">Company email address or vessel email address</label>
                            <input type="email" name="email" id="email"  class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label class="required">Your name</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
                            @error('name')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- /.End Form Group -->
                        <!-- Start Form Group -->
                        <div class="form-group mb-4">
                            <label class="required">Password</label>
                            <input id="password" name="password"  type="password" class="form-control password @error('password') is-invalid @enderror"  autocomplete="off">           
                            <i data-bs-toggle="#password" class="fa fa-eye toggle-password " aria-hidden="true"></i>
                            @error('password')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- /.End Form Group -->
                        <!-- Start Form Group -->
                        <div class="form-group mb-4">
                            <label class="required">Confirm Password</label>
                            <input  type="password" id="password_confirmation" name="password_confirmation"  class="form-control c-password" autocomplete="off">
                            <i data-bs-toggle="#password_confirmation" class="fa fa-eye toggle-password " aria-hidden="true"></i>
                            @error('password')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- /.End Form Group -->
                        <!-- Start Checkbox -->
                        <div class="form-check mb-4 text-start">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                            <label class="form-check-label" for="flexCheckDefault"> By signing up, you agree to the <a href="#" class="text-decoration-underline">terms of service</a> </label>
                        </div>
                        <!-- /.End Checkbox -->
                        <!-- Start Button -->
                        <button type="submit" class="btn btn-primary btn-lg w-100">REGISTER</button>
                        <!-- End Button -->
                    </form>
                    <!-- Start Bottom Text -->
                    <div class="bottom-text mt-4 login_alrerdy"> <a href="{{ route('login') }}" class="fw-medium text-decoration-underline"> Already have an account? Login</a> </div>
                    <!-- /.End Bottom Text -->
                </div>
            </div>
            <div class="col-xl-6 d-none d-xl-block">
                <div class="background-image bg-light d-flex flex-column h-100 justify-content-center p-5 rounded-4" data-image-src="assets/images/lines.svg">
                    <div class="py-5 text-center">
                        
                        <img src="assets/images/register.jpg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <div class="clear"></div>
</div>
@endsection
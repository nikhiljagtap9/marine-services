@extends('layouts.main')

@section('content')
<div class="clear"></div>
<br><br> 
<div class="clear"></div>
<style type="text/css">
    
   .footer-dark.main-footer .container.pt-4{
   display: none;
   }
</style>
<link rel="stylesheet" href="assets/css/internal_page.css">
<div class="p-3 p-sm-5">
        <div class="row g-4 g-xl-5 justify-content-between">
            <div class="col-xl-5 d-flex justify-content-center">
                <div class="authentication-wrap overflow-hidden position-relative text-center text-sm-start my-5">
                    <!-- Start Header Text -->
                    <div class="mb-5">
                        <h2 class="display-6 fw-semibold mb-3">Welcome to Uger!<br> Please <span class="font-caveat text-primary">Register</span> to continue.</h2>
                        <p class="mb-0">
                           
                           Join Ugur to simplify your workflow and boost productivity. Sign up in seconds and start exploring smart tools built for success.
                        </p>
                    </div>
                    <!-- /.End Header Text -->
                    <!-- Start Social Button Wrapper -->
                    
                    <!-- /.End Divider -->
                    <form class="register-form">
                        <!-- Start Form Group -->
                        <div class="form-group mb-4">
                            <label class="required">Full Name</label>
                            <input type="text" class="form-control" required="">
                        </div>
                        <!-- /.End Form Group -->
                        <!-- Start Form Group -->
                        <div class="form-group mb-4">
                            <label class="required">Enter Email</label>
                            <input type="email" class="form-control">
                        </div>
                        <!-- /.End Form Group -->
                        <!-- Start Form Group -->
                        <div class="form-group mb-4">
                            <label class="required">Password</label>
                            <input id="password" type="password" class="form-control password" autocomplete="off">
                             
                            <i data-bs-toggle="#password" class="fa fa-eye toggle-password " aria-hidden="true"></i>
                        </div>
                        <!-- /.End Form Group -->
                        <!-- Start Form Group -->
                        <div class="form-group mb-4">
                            <label class="required">Confirm Password</label>
                            <input id="confirmPassword" type="password" class="form-control c-password" autocomplete="off">
                            <i data-bs-toggle="#confirmPassword" class="fa fa-eye toggle-password " aria-hidden="true"></i>

                        </div>
                        <!-- /.End Form Group -->
                        <!-- Start Checkbox -->
                        <div class="form-check mb-4 text-start">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault"> By signing up, you agree to the <a href="#" class="text-decoration-underline">terms of service</a> </label>
                        </div>
                        <!-- /.End Checkbox -->
                        <!-- Start Button -->
                        <button type="submit" class="btn btn-primary btn-lg w-100">REGISTER</button>
                        <!-- End Button -->



                         


                         
                    <!-- Start Text -->
                    
                   


                    </form>
                    <!-- Start Bottom Text -->
                    <div class="bottom-text mt-4 login_alrerdy"> <a href="login.php" class="fw-medium text-decoration-underline"> Already have an account? Login</a> </div>
                    <!-- /.End Bottom Text -->
                </div>
            </div>
            <div class="col-xl-7 d-none d-xl-block">
                <div class="background-image bg-light d-flex flex-column h-100 justify-content-center p-5 rounded-4" data-image-src="assets/images/lines.svg">
                    <div class="py-5 text-center">
                        <div class="mb-5">
                            <h2 class="fw-semibold">
                              Sign up to explore smart tools and grow your business. Quick, easy, and free.
                            </h2>
                            
                        </div>
                        <img src="assets/images/login_2.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
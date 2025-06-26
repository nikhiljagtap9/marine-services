@extends('layouts.main')

@section('content')
<style type="text/css">
   .actv_pric{
   border-color: #124f98 !important;
   color: #124f98 !important;
   font-weight: 600 !important;
   }
   .footer-dark.main-footer .container.pt-4{
   display: none;
   }

   .section_4_1_1 {
       background-image: linear-gradient(#ffd881, #f8c12f);
   }
</style>
<link rel="stylesheet" href="assets/css/internal_page.css">
 
<section class="dark-overlay hero mx-3 overflow-hidden position-relative py-4 py-lg-5 rounded-4 text-white">
        <!-- <img class="bg-image" src="assets/images/header/01.jpg" alt="Image"> -->
        <video class="bg-image" autoplay="" muted="" loop="">
      <source src="assets/images/vi.mp4" type="video/mp4">
      <source src="assets/images/vi.mp4" type="video/ogg">
   </video>

        <div class="container overlay-content py-5">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 col-lg-6">
                    <!-- start section header -->
                    <div class="section-header" data-aos="fade-down">
                        <!-- start description -->
                        <div class="bg-primary d-inline-block fs-14 mb-3 px-4 py-2 rounded-5 sub-title text-uppercase">Contact us</div>
                        <!-- end /. section header sub title -->
                        <!-- start section header -->
                        <h2 class="display-4 fw-semibold mb-3 section-header__title text-capitalize">Do you have any<br> questions?
                            <span class="font-caveat text-white">Let us Know!</span>
                        </h2>
                        <!-- end /. section header title -->
                       
                    </div>
                    <!-- end /. section header -->
                </div>
                <div class="col-md-5 col-lg-4">
                    <h5 class="fw-bold mb-4">General contact</h5>
                    <div class="mb-5">
                        <div>Atalar Mah. Dolunay Sok. No :14/8  
                              <br class="d-none d-xxl-block"> 34862 Kartal- Istanbul Turkiye</div>
                        <div class="mt-4">
                            <a class="d-block fw-medium mb-1" href="#">
                                <i class="fa-solid fa-phone me-2"></i><span>+90 532 482 82 15<</span>
                            </a>
                            <a class="email-link d-block fw-medium" href="#">
                                <i class="fa-solid fa-envelope me-2"></i>
                                <span class="__cf_email__" data-cfemail="60131510100f1214202c0913142f0e4e030f0d">info@ratedmarineservices.com</span>
                            </a>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-4">follow us</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="fb d-flex align-items-center justify-content-center fs-19 rounded mr-2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="tw d-flex align-items-center justify-content-center fs-21 rounded mr-2">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="ins d-flex align-items-center justify-content-center fs-21 rounded mr-2">
                            <i class="fab fa-instagram"></i></a>
                        <a href="#" class="pr d-flex align-items-center justify-content-center fs-21 rounded mr-2">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                        <a href="#" class="li d-flex align-items-center justify-content-center fs-21 rounded mr-2">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="py-5 bg-light mx-3 rounded-4 my-3">
        <div class="container py-5">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-5">
                    <h3 class="h1 mb-4 text-primary">My contact data</h3>
                    <!-- Start Form Group -->
                    <div class="mb-4">
                        <label class="required fw-medium mb-2">Full Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="David Hall" required="">
                    </div>
                    <!-- /.End Form Group -->
                    <!-- Start Form Group -->
                    <div class="mb-4">
                        <label class="required fw-medium mb-2">Your Email</label>
                        <input type="email" class="form-control" id="email" placeholder="hello@email.com">
                    </div>
                    <!-- /.End Form Group -->
                    <!-- Start Form Group -->
                    <div class="mb-4">
                        <label class="required fw-medium mb-2">Your Phone</label>
                        <input type="number" class="form-control" id="phone">
                    </div>
                    <!-- /.End Form Group -->
                </div>
                <div class="col-md-6 col-xl-5">
                    <h3 class="h1 mb-4 text-primary">My message</h3>
                    <!-- Start Form Group -->
                    <div class="mb-4">
                        <label class="required fw-medium mb-2">Your Comments</label>
                        <textarea class="form-control" rows="7" placeholder="Tell us what we can help you with!"></textarea>
                    </div>
                    <!-- /.End Form Group -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            YES, I AUTHORIZE THE USE OF MY PERSONAL DATA IN ACCORDANCE WITH THE PRIVACY POLICY DESCRIBED ON THE WEBSITE.
                        </label>
                    </div>
                    <!-- Start Submit Button -->
                    <button type="submit" class="btn btn-primary btn-lg d-inline-flex hstack gap-2 mt-4">
                        <span>Send message</span>
                        <span class="vr"></span>
                        <i class="fa-arrow-right fa-solid fs-14"></i>
                    </button>
                    <!-- /.End Submit Button -->
                </div>
            </div>
            
        </div>
    </div>
       
  
<div class="clear"></div>


@endsection
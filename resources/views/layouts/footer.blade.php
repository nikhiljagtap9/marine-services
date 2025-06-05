<!-- start footer -->
<footer class="footer-dark main-footer overflow-hidden position-relative pt-5">
   <div class="container pt-4">
      <div class=" py-5">
         <div class="footer-row row gy-5 g-sm-5 gx-xxl-6">
            
            <div class="border-end col-lg-4 col-md-5 col-sm-6">
               <h5 class="fw-bold mb-4 aos-init animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" >Follow the location</h5>
               <div class="clear"></div> <br>
               <!-- start social icon -->
               <ul class="d-flex flex-wrap gap-2 list-unstyled mb-0 social-icon">
                  <li class="aos-init animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-delay="0.3s" >
                     <a href="#" class="rounded-circle align-items-center d-flex fs-19 icon-wrap justify-content-center rounded-2 text-white inst">
                     <i class="fab fa-instagram"></i>
                     </a>
                  </li>
                  <li class="aos-init animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" >
                     <a href="#" class="rounded-circle align-items-center d-flex fs-19 icon-wrap justify-content-center rounded-2 text-white twi">
                     <i class="fab fa-twitter"></i>
                     </a>
                  </li>
                  <li class="aos-init animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-delay="0.7s" >
                     <a href="#" class="rounded-circle align-items-center d-flex fs-19 icon-wrap justify-content-center rounded-2 text-white dri">
                     <i class="fab fa-dribbble"></i>
                     </a>
                  </li>
                  <li class="aos-init animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-delay="0.9s" >
                     <a href="#" class="rounded-circle align-items-center d-flex fs-19 icon-wrap justify-content-center rounded-2 text-white fb">
                     <i class="fab fa-facebook-f"></i>
                     </a>
                  </li>
                  <li class="aos-init animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-delay="1.1s" >
                     <a href="#" class="rounded-circle align-items-center d-flex fs-19 icon-wrap justify-content-center rounded-2 text-white whatsapp">
                     <i class="fa-brands fa-whatsapp"></i>
                     </a>
                  </li>
               </ul>
            </div>

            <div class="border-end col-lg-4 col-md-5 col-sm-6">
               <h5 class="fw-bold mb-4 aos-init animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" >Stay Connect</h5>
               <div class="aos-init animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" >1123 Fictional St, San Francisco<br class="d-none d-xxl-block"> , CA 94103</div>
               <div class="mt-4 aos-init animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                  <a class="d-block fw-medium mb-1" href="#">
                  <i class="fa-solid fa-phone me-2"></i><span>(123) 456-7890</span>
                  </a>
                  <a class="email-link d-block fw-medium" href="#">
                  <i class="fa-solid fa-envelope me-2"></i>
                  <span class="__cf_email__" >[email&#160;protected]</span>
                  </a>
               </div>
            </div>
            <div class="col-lg-4">
               <h5 class="fw-bold mb-4 aos-init animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" >Join Our Newsletter</h5>
               <div class="newsletter position-relative mt-4 aos-init animate__animated animate__fadeIn" data-wow-duration="1s" data-wow-delay="0.7s" >
                  <input type="email" class="form-control" placeholder="name@example.com">
                  <button type="button" class="btn btn-primary search-btn position-absolute top-50 rounded-circle"><i class="fa-solid fa-angle-right"></i></button>
               </div>
               <div class="border-top my-4"></div>
               
               <!-- /. end social icon -->
            </div>
         </div>
      </div>
   </div>
   <div class="container border-top aos-init animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s" >
      <div class="align-items-center g-3 py-4 row">
         <div class="col-lg-auto">
            <!-- start footer nav -->
            <ul class="list-unstyled list-separator mb-2 footer-nav">
               <li class="list-inline-item"><a href="{{route('privacy')}}">Privacy</a></li>
               <li class="list-inline-item"><a href="#">Sitemap</a></li>
               <li class="list-inline-item"><a href="#">Cookies</a></li>
            </ul>
            <!-- end /. footer nav -->
         </div>
         <div class="col-lg order-md-first">
            <div class="align-items-center row">
               <!-- start footer logo -->
               <a href="#" class="col-sm-auto footer-logo mb-2 mb-sm-0">
               <img src="{{ asset('assets/images/logo.png') }}" alt="">
               </a>
               <!-- end /. footer logo -->
               <!-- start text -->
               <div class="col-sm-auto copy">© 2025 Rated Marine Services - All Rights Reserved- All Rights Reserved</div>
               <!-- end /. text -->
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- end /. footer -->


<!-- AOS Script -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js"></script>
<script>
  AOS.init({
    once: true,
    duration: 1800,  // 👈 fast animation
    offset: 80,     // 👈 thodasa lavkar start hoil
    easing: 'ease-out', // 👈 smooth ani quick
  });
</script>



<script src="{{ asset('assets/js/wow.js') }}"></script>

<script>
    new WOW().init();
  </script>


<!-- Optional JavaScript -->
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{ asset('assets/plugins/jQuery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/aos/aos.min.js') }}"></script>
<script src="{{ asset('assets/plugins/macy/macy.js') }}"></script>
<script src="{{ asset('assets/plugins/simple-parallax/simpleParallax.min.js') }}"></script>
<script src="{{ asset('assets/plugins/OwlCarousel2/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.min.js') }}"></script>
<script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/plugins/counter-up/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.fileupload.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-fancyfileuploader/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ asset('assets/plugins/ion.rangeSlider/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('assets/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
<!-- Custom script for this template -->
<script src="{{ asset('assets/js/script.js') }}"></script>
<script type="text/javascript">
   $('.last_li_hide').click(function(){
    $(this).addClass("remove_last_li_hide");
   });
   
</script>
  <!-- WOW.js -->
  


</body>
</html>
@yield('scripts')


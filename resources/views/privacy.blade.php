@extends('privacy-t&c-consent.main')

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
      <div class="reviw_wrap" style="transform: none;" bis_skin_checked="1">
         <video class="reviw_wrap_inner" autoplay="" muted="" loop="">
            <source src="{{ asset('privacy-t&c-consent/assets/img/vi.mp4')}}" type="video/mp4">
            <source src="{{ asset('privacy-t&c-consent/assets/img/vi.mp4')}}" type="video/ogg">
         </video>
         <div class="rewv_inner_scan" style="transform: none;" bis_skin_checked="1">
            <div class="detl_right_panl" style="transform: none;" bis_skin_checked="1">
               <div class="py-5" style="transform: none;" bis_skin_checked="1">
                  <div class="container" style="transform: none;" bis_skin_checked="1">
                     <div class="row" style="transform: none;" bis_skin_checked="1">
                        <div class="col-lg-12 content" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;" bis_skin_checked="1">
                           <div class="theiaStickySidebar" style="padding-top: 1px; padding-bottom: 1px; position: static; transform: none;" bis_skin_checked="1">
                              <div class="mb-4 mb-lg-0" bis_skin_checked="1">
                                 <h4 class="fw-semibold fs-3 mb-4">
                                    <div class="platinm_titl">Privacy Policy</div>
                                 </h4>
                                 <div class="clear"></div>
                                 <div class="terms_wrap">
                                    <div class="terms_data_1">
                                       <p><strong>Effective Date:</strong>25/06/2025</p>
                                       <p><strong>Last Updated:</strong>25/06/2025</p>
                                       <p>
                                          At Rated Marine Services, we are committed to protecting the privacy of our Platform Users and Service Providers who visit our website, www.ratedmarineservices.com, and use our services. This Privacy Policy explains how your personal data is collected, processed, stored, shared, and protected.
                                       </p>
                                       <p>
                                          Our platform is designed to digitally connect Service Providers with Platform Users. Information collected from users is used solely for the purpose of providing services and ensuring the proper functioning of the platform.
                                       </p>
                                    </div>
                                     @foreach($privacies as $privacy)
                                       <div class="section">
                                             <div class="section-title">{{ $loop->iteration }}. {{ $privacy->section_title }}</div>
                                             <div class="section-content">
                                                <ul class="mb-0">
                                                   @foreach(explode("\n", $privacy->content) as $point)
                                                         @if(trim($point))
                                                            <li>{{ trim($point) }}</li>
                                                         @endif
                                                   @endforeach
                                                </ul>
                                             </div>
                                       </div>
                                    @endforeach  
                                    <div class="clear"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="clear" bis_skin_checked="1"></div>
      <br><br>
      </div>
@endsection
     
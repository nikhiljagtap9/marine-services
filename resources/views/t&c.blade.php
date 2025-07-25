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
                                    <div class="platinm_titl">Terms & Conditions</div>
                                 </h4>
                                 <div class="clear"></div>
                                 <div class="terms_wrap">
                                    <div class="terms_data_1">
                                       <p><strong>Last Updated:</strong> June 2025</p>
                                       <p>These Terms and Conditions ("Agreement") form a legally binding contract between Rated Marine Services ("Rated Marine", "we", "us", or "our") and you ("you" or "Your"), where you are either:</p>
                                       <ul>
                                          <li><strong>A Service Provider:</strong> A maritime service provider who registers and manages a company profile under one or more service categories on the Platform; or</li>
                                          <li><strong>A Platform User:</strong> An individual or entity (e.g., shipowner, ship manager, captain, ship master, or charterer) who accesses the Platform to discover and evaluate maritime service providers.</li>
                                       </ul>
                                       <p>This Agreement sets out the terms of use, obligations, and limitations that apply depending on your role and interaction with the Platform.</p>
                                    </div>
                                    @foreach($terms as $term)
                                       <div class="section">
                                             <div class="section-title">{{ $loop->iteration }}. {{ $term->section_title }}</div>
                                             <div class="section-content">
                                                <ul class="mb-0">
                                                   @foreach(explode("\n", $term->content) as $point)
                                                         @if(trim($point))
                                                            <li>{{ trim($point) }}</li>
                                                         @endif
                                                   @endforeach
                                                </ul>
                                             </div>
                                       </div>
                                    @endforeach                              
                                    <div class="clear"></div>
                                    <div class="section contact">
                                       <h3>Contact Information</h3>
                                       <p><strong>Rated Marine Services</strong><br>
                                          Uğur Tufan Emeksiz,<br>
                                          Atalar Mah. Dolunay Sok. Gönül Apt. No:14/8 Kartal, Istanbul, Turkey<br>
                                          Phone: +90 532 482 82 15<br>
                                          Email: operations@ratedmarineservices.com
                                       </p>
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
      </div>
      <div class="clear" bis_skin_checked="1"></div>
      <br><br>
      </div>
@endsection
     
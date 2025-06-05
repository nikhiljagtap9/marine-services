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
                                    <div class="platinm_titl">Consent Statement</div>
                                 </h4>
                                 <div class="clear"></div>
                                 <div class="terms_wrap terms_wrap_100">
                                    <div class="terms_data_1">
                                       <p>
                                          At Rated Marine Services, we are committed to ensuring transparency when collecting, processing, sharing, and transferring your personal data abroad. We ask for your consent regarding the following types of data processing activities:
                                       </p>
                                         
                                    </div>
                                    <div class="section">
                                       <div class="section-title">1. Data Collection and Processing</div>
                                       <div class="section-content">
                                          Your personal data will be collected and processed for the purpose of providing services on our platform, managing user interactions, and conducting analysis. This process will be carried out to ensure the proper functioning of the services provided and to enhance the user experience.
                                       </div>
                                    </div>
                                    <div class="section">
                                       <div class="section-title">2.Data Sharing</div>
                                       <div class="section-content">
                                         Your personal data may be shared with third parties necessary for providing the platform's services (e.g., hosting providers, software developers, analytics firms). Additionally, data may be shared between Platform Users and Service Providers. In this case, Platform Users' data may be shared with Service Providers, and Service Providers' data may be shared with Platform Users.
Service Providers' data may also be shared with other Service Providers. This provides Service Providers with various metrics to compare their own performance. These metrics may include the number of views, clicks, quote requests and response rates, star ratings and reviews, changes in star ratings (increase or decrease), among others. Additionally, Service Providers may view other performance metrics to assess their competitors' performance. These comparisons can help Service Providers make improvements to increase their visibility on the platform.

                                       </div>
                                    </div>
                                    <div class="section">
                                       <div class="section-title">3. Data Transfer Abroad</div>
                                       <div class="section-content">
                                         Your personal data may be stored on servers located abroad as part of the Rated Marine Services infrastructure. All necessary measures will be taken to ensure the secure transfer of this data.
                                       </div>
                                    </div>
                                    
                                     
                                  
                                   
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
     
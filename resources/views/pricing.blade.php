@extends('layouts.main')

@section('content')
<div class="clear"></div>
<br><br><br><br>
<div class="clear"></div>
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
<link rel="stylesheet" href="{{ asset('assets/css/internal_page.css')}}">
</div>
<div class="pricn_sectn">
   <!-- Main Content -->
   <div class="container container_pricng_sec">
      <div class="pricn_sectn_blue">
         <div class="pric_til_1">
            Be Noticed – Get Hired – Get Rated <br> Expand Your Reach
         </div>
         <div class="pric_til_2">
            Connect with shipowners worldwide and grow <br> your maritime business with our trusted platform.
         </div>
         <div class="pric_til_3">
            <b style="font-size: 24px;" >Silver Membership is FREE for 3 months</b>
            <br> valid until Oct 1, 2025 No credit card required. No strings attached.
         </div>
         <div class="fre_mbrshp_wrp">
            <a href="" class="fre_mbrshp" >
            Free Silver Membership 
            </a>
         </div>
         <div class="clear"></div>
         <video class="pricn_video" autoplay muted loop >
            <source src="{{ asset('assets/images/vi.mp4')}}" type="video/mp4">
            <source src="{{ asset('assets/images/vi.mp4')}}" type="video/ogg">
         </video>
      </div>
      <div class="clear"></div>
      <div class="sectn_4_al">
        
          <div class="section section_4_1 section_4_1_1">
            <div class="sec_4_icon">
               <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-gift"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 8m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z" /><path d="M12 8l0 13" /><path d="M19 12v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-7" /><path d="M7.5 8a2.5 2.5 0 0 1 0 -5a4.8 8 0 0 1 4.5 5a4.8 8 0 0 1 4.5 -5a2.5 2.5 0 0 1 0 5" /></svg>
            </div>
            <div class="sect_4_titl">
               Silver Plan <br> FREE Until 1 Oct 2025!
            </div>
            <div class="sect_4_titl_sub">
               Register anytime before 1 Oct and enjoy free access starting 1 July. <br>
               The earlier you register, the longer your free access will last.

            </div>
            <div class="clear"></div>
         </div>
         <div class="section section_4_2">
            <div class="sec_4_icon">
               <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-tag">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M11.172 2a3 3 0 0 1 2.121 .879l7.71 7.71a3.41 3.41 0 0 1 0 4.822l-5.592 5.592a3.41 3.41 0 0 1 -4.822 0l-7.71 -7.71a3 3 0 0 1 -.879 -2.121v-5.172a4 4 0 0 1 4 -4zm-3.672 3.5a2 2 0 0 0 -1.995 1.85l-.005 .15a2 2 0 1 0 2 -2" />
               </svg>
            </div>
            <div class="sect_4_titl">
               Up to 50% <br> OFF all plans  
            </div>
            <div class="sect_4_titl_sub">
               Exclusive launch pricing valid until <b> Oct 1, 2025</b>
            </div>
            <div class="clear"></div>
         </div>
         <div class="section section_4_3">
            <div class="sec_4_icon">
               <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-calendar">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M16 2a1 1 0 0 1 .993 .883l.007 .117v1h1a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-12a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h1v-1a1 1 0 0 1 1.993 -.117l.007 .117v1h6v-1a1 1 0 0 1 1 -1zm3 7h-14v9.625c0 .705 .386 1.286 .883 1.366l.117 .009h12c.513 0 .936 -.53 .993 -1.215l.007 -.16v-9.625z" />
                  <path d="M12 12a1 1 0 0 1 .993 .883l.007 .117v3a1 1 0 0 1 -1.993 .117l-.007 -.117v-2a1 1 0 0 1 -.117 -1.993l.117 -.007h1z" />
               </svg>
            </div>
            <div class="sect_4_titl">
               Limited <br> Availability
            </div>
            <div class="sect_4_titl_sub">
               Only <b> 15 slots</b> per port & category—first 15 paid subscribers only.
            </div>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
   </div>
   <div class="clear"></div>
</div>
<div class="clear"></div>
<br>
<div class="pricing_prc" style="display:none;" >
   <div class="pricing_prc_left_1" style="display:none;" >
      <div class="container">
         <div class="headline">Only 15 Companies Per Port & Main Category!</div>
         <div class="subheading">No Room for #16</div>
         <div class="content">
            Each port & main category is capped at 15 company listings with full company profile.
            <span class="highlight" style="margin-top: 20px; display: inline-block; " >
            No clutter. No crowd. <br>  Just premium visibility. AAAA
            </span> 
         </div>
         <div class="cta"><span class="emoji">🔐</span> Grab your place before it’s too late</div>
      </div>
   </div>
   <div class="pricing_prc_left" style="display:none;" >
      <table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; text-align: center;">
         <thead >
            <tr>
               <th>Plan</th>
               <th>Launch Price<br><small>(until Oct 1, 2025)</small></th>
               <th>Standard Price<br><small>(after Oct 1, 2025)</small></th>
               <th>Discount<br><small>$</small></th>
               <th>% Discount</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>Silver</td>
               <td>$99 / yr</td>
               <td>$169 / yr</td>
               <td>$70</td>
               <td>41% OFF</td>
            </tr>
            <tr>
               <td>Gold</td>
               <td>$149 / yr</td>
               <td>$269 / yr</td>
               <td>$120</td>
               <td>45% OFF</td>
            </tr>
            <tr>
               <td>Platinum</td>
               <td>$399 / yr</td>
               <td>$799 / yr</td>
               <td>$400</td>
               <td>50% OFF</td>
            </tr>
         </tbody>
      </table>
   </div>
</div>
<div class="clear"></div>
<div class="" style="display:none;" >
   <div class="pricn_sectn">
      <!-- Main Content -->
      <div class="container container_pricng_sec">
         <div class="pricn_sectn_blue">
            <div class="pric_til_1">
               Act early, secure your spot, <br> and enjoy long-term benefits.
            </div>
            <div class="pric_til_2">
               Join now. Be seen. Be trusted. Grow smart.
            </div>
            <div class="clear"></div>
            <video class="pricn_video" autoplay muted loop >
               <source src="{{ asset('assets/images/vi.mp4')}}" type="video/mp4">
               <source src="{{ asset('assets/images/vi.mp4')}}" type="video/ogg">
            </video>
         </div>
      </div>
      <div class="clear"></div>
   </div>
</div>
<div class="clear"></div>
<div class="py-5 bg-gradient rounded-4 mx-3 mt-3 pric_2_sm">
   <div class="container py-4">
      <!-- start tab content -->
      <div class="tab-content">
         <div class="tab-pane fade show active" id="monthly-tab-pane" role="tabpanel" aria-labelledby="monthly-tab" tabindex="0">
            <!-- start pricing table -->
            <div class="table-responsive">
               <table class="table table-hover pricing-table table-responsive-md">
                  <thead>
                     <tr>
                        <th scope="col">
                           <div class="fs-4 fw-semibold h6 mb-0 mb-2">Plan & Features</div>                          
                        </th>
                        @foreach($plans as $plan)
                           @php
                              $encryptedPlanId = encrypt($plan->id);
                           @endphp
                        <th scope="col">
                           <span class="font-caveat fs-3 text-primary">{{ $plan->name }}</span>
                           <div class="d-flex pt-md-3">
                              <span class="h3">$</span>
                              <span class="display-4 fw-semibold">{{ $plan->price == 0 ? 'Free' : $plan->price . '/Year'}}</span>
                           </div>
                           @if($plan->name == 'Silver')
                           <span class="text-muted small mt-1">FREE Until 1 Oct 2025!</span>
                           @endif
                            <a href="{{route('service-provider.membership', ['id' => $encryptedPlanId, 'from' => 'pricing'])}}" target="_blank" class="btn d-block mt-4 btn-primary text-nowrap">Get {{ $plan->name }}</a>
                           <!-- @if($plan->name == 'Basic' || $plan->name == 'Silver')
                              <a href="{{route('service-provider.membership', ['id' => $encryptedPlanId])}}" target="_blank" class="btn d-block mt-4 btn-primary text-nowrap">Get {{ $plan->name }}</a>  
                           @else
                              <a href="#" class="btn d-block mt-4 btn-primary text-nowrap">Get After Launch</a>
                           @endif    -->
                        </th>
                        @endforeach
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Listed in search results <br> (visible to shipowners)  
                           </span>
                        </th>
                        <td>
                           <span class="cros_as" >
                           Name Only
                           </span>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Visibility level in listing <br>(profile display style)  
                           </span>
                        </th>
                        <td>
                           <span class="cros_as" >
                           Full profile with logo & media shown
                           </span>
                        </td>
                        <td>
                           <span class="cros_as" >
                           Full profile with logo & media shown
                           </span>
                        </td>
                        <td>
                           <span class="cros_as" >
                           Full profile with logo & media shown
                           </span>
                        </td>
                        <td>
                           <span class="cros_as" >
                           Full profile with logo & media shown
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           QR code for collecting <br>instant service review  
                           </span>
                        </th>
                        <td>
                           <span class="cros_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M10 10l4 4m0 -4l-4 4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Use your QR code on print, <br>website or mobile
                           </span>
                        </th>
                        <td>
                           <span class="cros_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M10 10l4 4m0 -4l-4 4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Collect real-time reviews <br> from vessel while in port
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Receive RFQs
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Respond to RFQs
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Service coverage by port <br> (how many ports you're visible in)
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                           1 Port
                           </span>
                        </td>
                        <td>
                           <span class="cros_as">
                           1 Port
                           </span>
                        </td>
                        <td>
                           <span class="cros_as">
                           Up to 3 ports
                           </span>
                        </td>
                        <td>
                           <span class="cros_as">
                           Up to 7 ports
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Main Service Categories<br> shown on your profile<br> (visibility in multiple Main Categories)
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                             1 Main category
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              1 Main category
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              1 Main category
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              Up to  2 Main Categories
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Add to Favorites
                           </span>
                        </th>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Smart map visibility <br>(zoom dependent)
                           </span>
                        </th>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Appears in filtered searches <br> (by port & service type)
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Map Pin Visibility
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Add social media links <br> to your profile
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Profile badges <br> (Top Rated, Most Viewed, etc.)
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Complete profile with <br> photo/video and details
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Photo Upload
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Contribute blog articles <br> (port insights, experience)
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Get Featured in Our Blog
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Show past clients & served <br> vessels (build trust)
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Dashboard Access
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="data_titl_acs">
                           🔒 Data Access Rights
                           </span>
                        </th>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           The number of Profile Views
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Messages & Quotes Received
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Access to reviews and RFQ trends in selected ports
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           View anonymous stats on similar service providers
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           See how many users requested contact
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Reviews Received
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-x">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                 <path d="M10 10l4 4m0 -4l-4 4"></path>
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                 <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                 <path d="M9 12l2 2l4 -4" />
                              </svg>
                           </span>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <span class="d-block fw-semibold h6 mb-0 text-nowrap">
                           Best For
                           </span>
                        </th>
                        <td>
                           <span class="cros_as">
                           For small service providers who want to explore the platform and get a basic listing.
                           </svg>
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                           For established professionals operating in a single port who want visibility, ratings, and client interaction.
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                           Perfect for companies expanding to multiple ports and looking to build regional authority.
                           </span>
                        </td>
                        <td>
                           <span class="check_as" >
                           Designed for firms offering multiple services across several ports and seeking maximum exposure and credibility.
                           </span>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- end /. pricing table -->
         </div>
      </div>





      <div class="pricing_prc pricing_prc_2_botm ">
      <div class="pricing_prc_left pricing_prc_left_main" >
      <table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; text-align: center;">
         <thead >
            <tr>
               <th>Plan</th>
               <th>Launch Price<br><small>(until Oct 15, 2025)</small></th>
               <th>Standard Price<br><small>(after Oct 15, 2025)</small></th>
               <th>Discount<br><small>$</small></th>
               <th>% Discount</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>Silver</td>
               <td>$99 / yr</td>
               <td>$169 / yr</td>
               <td>$70</td>
               <td>41% OFF</td>
            </tr>
            <tr>
               <td>Gold</td>
               <td>$149 / yr</td>
               <td>$269 / yr</td>
               <td>$120</td>
               <td>45% OFF</td>
            </tr>
            <tr>
               <td>Platinum</td>
               <td>$399 / yr</td>
               <td>$799 / yr</td>
               <td>$400</td>
               <td>50% OFF</td>
            </tr>
         </tbody>
      </table>
   </div>
</div>


      <div class="why_sec_1">
         <div class="why_sec_1_ttil">Why Join Now ?</div>
         <div class="why_tex_j1">
            <div class="why_icon">
               <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-world">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                  <path d="M3.6 9h16.8" />
                  <path d="M3.6 15h16.8" />
                  <path d="M11.5 3a17 17 0 0 0 0 18" />
                  <path d="M12.5 3a17 17 0 0 1 0 18" />
               </svg>
            </div>
            <div class="why_text_sub">
               Appear on our real-time map and in filtered searches
            </div>
            <div class="clear"></div>
         </div>
         <div class="why_tex_j1">
            <div class="why_icon">
               <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-award">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M12 9m-6 0a6 6 0 1 0 12 0a6 6 0 1 0 -12 0" />
                  <path d="M12 15l3.4 5.89l1.598 -3.233l3.598 .232l-3.4 -5.889" />
                  <path d="M6.802 12l-3.4 5.89l3.598 -.233l1.598 3.232l3.4 -5.889" />
               </svg>
            </div>
            <div class="why_text_sub">
               Showcase your past clients and boost trust
            </div>
            <div class="clear"></div>
         </div>
         <div class="why_tex_j1">
            <div class="why_icon">
               <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                  <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                  <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
               </svg>
            </div>
            <div class="why_text_sub">
               Get verified star reviews from vessel crew instantly
            </div>
            <div class="clear"></div>
         </div>
         <div class="why_tex_j1">
            <div class="why_icon">
               <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-ship">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M2 20a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1" />
                  <path d="M4 18l-1 -5h18l-2 4" />
                  <path d="M5 13v-6h8l4 6" />
                  <path d="M7 7v-4h-1" />
               </svg>
            </div>
            <div class="why_text_sub">
               Let shipowners find you exactly where you operate.
            </div>
            <div class="clear"></div>
         </div>
      </div>
      <div class="">
         <div class="py-5">
            <div class="container py-4 pricng_contr_main">
               <div class="why_sec_1_ttil">Frequently Asked Questions</div>
               <div class="clear"></div>
               <div class="row justify-content-center">
                  <div class="col-lg-12">
                     <div class="accordion" id="accordionExample">
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              How long does the free Silver trial last?
                              </button>
                           </h2>
                           <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 Your Silver membership is 100% free for 3 months, from July 1 to Oct 1, 2025. No credit card required; no strings attached.
                              </div>
                           </div>
                        </div>
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              What happens after my 3 month Silver trial ends?
                              </button>
                           </h2>
                           <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 o  If you upgrade to a paid Silver plan before Oct 1, 2025, you’ll pay $99 for your first paid year.<br><br>
                                 o  If you don’t upgrade by Oct 1, 2025, your Silver trial will expire and your account will revert to the Free plan. You’ll remain in our system but lose access to most premium features—such as collecting new reviews, displaying existing reviews, appearing in filtered searches, and showcasing your company logo, photos, and full profile details.
                              </div>
                           </div>
                        </div>
                        
                         <div class="clear"></div>
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                              What does “Covers up to 3 ports” mean?
                              </button>
                           </h2>
                           <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 With the Gold plan, you select up to three ports where your full profile is visible; shipowners searching in any of those ports will see your complete listing.
                              </div>
                           </div>
                        </div>
                        
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                              What does “Platinum covers 2 service categories” mean?
                              </button>
                           </h2>
                           <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 Service providers choose from main categories such as “Ship Repairs” or “Survey & Inspection.” <br><br>
                                 o  Silver & Gold let you pick one category. <br>
                                 o  Platinum lets you appear in two categories, doubling your visibility.
                              </div>
                           </div>
                        </div>
                        <div class="clear"></div>
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                              How do I collect real-time, verified reviews?
                              </button>
                           </h2>
                           <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 Every paid plan includes a unique QR code you can display on-site, on invoices, or on your website. When your service is completed, have your company representative ask the ship’s captain or chief engineer to scan the QR code. They will be directed to a feedback form where they can leave a star rating and comment about the service. Once they submit and confirm, the review and rating will appear immediately under your company profile.
                              </div>
                           </div>
                        </div>
                        
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                              Can I switch or cancel my plan at any time?**
                              </button>
                           </h2>
                           <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 Absolutely—you can upgrade, downgrade, or cancel anytime via your dashboard; benefits remain active through the end of your current billing period.
                              </div>
                           </div>
                        </div>
                        <div class="clear"></div>
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                              What happens if I need to serve more ports later?
                              </button>
                           </h2>
                           <div id="collapse8" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 Simply upgrade your plan (e.g., Silver → Gold) at any time; we’ll prorate the unused portion of your existing subscription toward the new plan.
                              </div>
                           </div>
                        </div>
                         
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                              Which plan is right for me?
                              </button>
                           </h2>
                           <div id="collapse9" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 Refer to the “Best For” row in the comparison table to choose the plan that best fits your needs before deciding.
                              </div>
                           </div>
                        </div>
                        <div class="clear"></div>
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                              What data will I have access to?
                              </button>
                           </h2>
                           <div id="collapse10" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 You’ll see how many times your profile was viewed, your appearance in searches, clicks on your contact details, number of reviews, RFQ messages received and responded to, and anonymous benchmarks of similar providers—helping you measure and improve performance.
                              </div>
                           </div>
                        </div>
                         
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                              Can I view a list of vessels arriving at my service port?
                              </button>
                           </h2>
                           <div id="collapse11" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 We’re developing an AIS & ETA module to display vessel arrival schedules for the ports in about 20 countries. It’s planned for Q1–Q2 2026. Early subscribers will receive free access once we develop our module, subject to technical requirements.
                              </div>
                           </div>
                        </div>
                        <div class="clear"></div>
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                              How often is data refreshed?
                              </button>
                           </h2>
                           <div id="collapse12" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 Profile views, reviews, and RFQ analytics update in real time. When launched, AIS vessel data will refresh once every week.
                              </div>
                           </div>
                        </div>
                        
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                              Can I edit or remove negative reviews?
                              </button>
                           </h2>
                           <div id="collapse13" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 No. Reviews are collected in real time to ensure authenticity. However, you can respond publicly to address concerns and demonstrate your commitment to service quality.
                              </div>
                           </div>
                        </div>
                        <div class="clear"></div>
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                              How many service categories/ports can I list?
                              </button>
                           </h2>
                           <div id="collapse14" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 You can select multiple main service categories and ports. The more coverage you have, the higher your visibility in filtered searches.
                              </div>
                           </div>
                        </div>
                         
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
                              Can I showcase past clients and vessels served?
                              </button>
                           </h2>
                           <div id="collapse15" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 Yes! Add your past client and vessel information under “Past Clients” in your profile to build trust and credibility
                              </div>
                           </div>
                        </div>
                        <div class="clear"></div>
                        <div class="accordion-item mb-3 rounded-4">
                           <h2 class="accordion-header">
                              <button class="accordion-button fs-5 p-4 text-dark collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse16" aria-expanded="false" aria-controls="collapse16">
                              How can I increase my company’s visibility in search results?
                              </button>
                           </h2>
                           <div id="collapse16" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body p-4 pt-0">
                                 Ensure your profile is complete—include photos/videos, service categories, and port coverage—and actively respond to RFQs. Premium features like Smart Map Visibility and multiple service categories also boost your discoverability.
                              </div>
                           </div>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end /. tab content -->
      <!-- <div class="text-center">Interested in a custom plan? <a href="#" class="text-primary fw-medium">Get in touch</a></div> -->
   </div>
</div>
<div class="clear"></div>
@endsection

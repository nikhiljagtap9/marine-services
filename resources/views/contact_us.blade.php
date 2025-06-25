@extends('layouts.main')

@section('content')
<div class="clear"></div>
<br><br><br><br>
<div class="clear"></div>
<style type="text/css">
   .about_activ{
   border-color: #124f98 !important;
   color: #124f98 !important;
   font-weight: 600 !important;
   }
   .footer-dark.main-footer .container.pt-4{
   display: none;
   }
</style>
<link rel="stylesheet" href="{{ asset('assets/css/internal_page.css')}}">
</div>
<section class="dark-overlay hero mx-3 overflow-hidden position-relative py-4 py-lg-5 rounded-4 text-white">
   <!-- <img class="bg-image" src="{{ asset('assets/images/03.jpg')}}" alt="Image"> -->

   <video class="bg-image" autoplay muted loop >
      <source src="{{ asset('assets/images/vi.mp4')}}" type="video/mp4">
      <source src="{{ asset('assets/images/vi.mp4')}}" type="video/ogg">
   </video>
   <div class="container overlay-content py-5">
      <div class="row justify-content-center">
         <div class="col-sm-10 col-md-10 col-lg-10">
            <!-- start section header -->
            <div class="section-header text-center" data-aos="fade-down">
               <!-- start description -->
              
               <!-- start section header -->
               <h2 class="display-4 fw-semibold mb-3 section-header__title text-capitalize">
                  Built for Ship Service Providers</h2>
                  <span style="font-size: 22px;" >
                     We’re not another generic directory. We’re your digital infrastructure. From chandlers to surveyors, repairs to bunkering — this is where ship service providers get discovered, respected, and remembered.
                  </span>
               <!-- end /. section header title -->
               <!-- start description -->
               <!-- end /. section header sub title -->
            </div>
            <!-- end /. section header -->
         </div>
      </div>
   </div>
</section>
<div class="py-5" bis_skin_checked="1">
   <div class="container py-4 abou_contr_1" bis_skin_checked="1">
       
      <div class="row g-4 justify-content-between" bis_skin_checked="1">
         <div class="col-lg-12 col-xl-12 about_sec_iner">
            <div class="container">
                

              <!--  <div class="box box_back_as">
                  <i class="fa fa-ship"></i> 
                  <div class="clear"></div>
                  <div class="icon-title"> 
                     Built for Ship Service Providers — Not as a Side Note, But as the Main Act.
                  </div>
                  <div class="content">
                     We’re not another generic directory. We’re your digital infrastructure. From chandlers to surveyors, repairs to bunkering — this is where ship service providers get discovered, respected, and remembered.
                  </div>
               </div>
                -->
               <div class="box">
                  <i class="fa fa-compass"></i>
                  <div class="icon-title">  Be Where Shipowners Are Looking</div>
                  <div class="content">Captains, operators, and managers aren’t browsing social media. They’re on our platform , searching by port, by service, by urgency. Your name, logo, services, and credibility , right where decisions are made.</div>
               </div>
               <div class="box">
                  <i class="fa fa-map-marker"></i>
                  <div class="icon-title"> Visibility that Follows the Map</div>
                  <div class="content">Whether they zoom in on a single dock or filter by category, your company appears exactly where it should , at the right port, in the right search, at the right time. You’re not chasing leads. They’re finding you.</div>
               </div>
               <div class="box">
                  <i class="fa fa-star"></i> 
                  <div class="icon-title">Get Rated for What You Actually Do</div>
                  <div class="content">Finally, feedback that means something. With your own smart QR code, vessels can rate your service in real-time , only if they’ve truly worked with you. Verified by invoice, order number, or a captain’s report. No fluff. No fakes. Just real reviews from real operations.</div>
               </div>
               <div class="box">
                  <i class="fa fa-trophy"></i>
                  <div class="icon-title"> Build a Reputation That Sails Ahead</div>
                  <div class="content">Every successful job now turns into social proof. Each review boosts your visibility, your credibility , and your next contract. Your good work deserves to be seen. And now, it will be.</div>
               </div>
               <div class="box">
                  <i class="fa fa-dashboard"></i>
                  <div class="icon-title"> Know What’s Working , And What’s Not</div>
                  <div class="content">Track profile views. See who clicks to contact you. Follow every action, from search to message. Your dashboard becomes your radar , guiding you to where the next opportunity is.</div>
               </div>
               <div class="box">
                  <i class="fa fa-line-chart"></i>
                  <div class="icon-title"> Improve. Impress. Expand.</div>
                  <div class="content">Each feedback is a gift , not just for pride, but for progress. Spot strengths. Fix weaknesses. Grow smarter. And more importantly , grow where you’re wanted.</div>
               </div>
            </div>
         </div>
      </div>
      
   </div>



</div>


<div class="clear"></div>

<div class="membrsh_3_a">
   <div class="py-5 bg-primary position-relative overflow-hidden text-white bg-primary bg-size-contain home-about js-bg-image" data-image-src="{{ asset('assets/images/lines.svg')}}" style="background-image: url(&quot;assets/images/lines.svg&quot;);" bis_skin_checked="1">
    <h1>Don’t Just Be Listed. Be Chosen.</h1>

  <div class="container">
    <div class="box">
      <h2>Let shipowners find you.</h2>
      <p>Be visible where it matters most. Trusted profiles, ready for hire.</p>
    </div>
    <div class="box">
      <h2>Let captains rate you.</h2>
      <p>Earn your reputation. Verified feedback from the field.</p>
    </div>
    <div class="box">
      <h2>Let your work speak for itself.</h2>
      <p>Showcase your performance and let the world hear your story.</p>
    </div>
  </div>
</div>
</div>


<div class="container membership_wrp">
         <h2>Membership Comparison</h2>
         <div class="grid-container">
            <!-- With Membership -->
            <div class="card with-membership">
               <h3>With Membership</h3>
               <ul>
                  <li>
                     <span>Smart QR Code Review System:</span><br />
                     Get reviews from captains while the ship is still at port.<br />
                     Your QR code is unique, printable, and powerful.
                  </li>
                  <li>
                     <span>Advanced Analytics Dashboard:</span><br />
                     See who visited, who clicked, and where you’re appearing in searches.
                  </li>
                  <li>
                     <span>Direct Messaging Module:</span><br />
                     Communicate directly with prospects. No delays. No middlemen.
                  </li>
                  <li>
                     <span>Verified Service History & References:</span><br />
                     Showcase the vessels you’ve served and the clients you’ve earned.
                  </li>
                  <li>
                     <span>Full Search & Map Visibility:</span><br />
                     Appear with your full profile — logo, media, ratings, trust badges — in filtered and zoom-based searches.
                  </li>
               </ul>
            </div>
            <!-- Without Membership -->
            <div class="card without-membership">
               <h3>Without Membership</h3>
               <ul>
                  <li>
                     <span>Limited Profile:</span><br />
                     Only your company name is listed — no logo, no visuals.
                  </li>
                  <li>
                     <span>No Insights:</span><br />
                     No access to analytics or messaging tools.
                  </li>
                  <li>
                     <span>No Review System:</span><br />
                     No ability to collect or display reviews.
                  </li>
                  <li>
                     <span>Low Visibility:</span><br />
                     No priority in search results or visibility on the map.
                  </li>
                  <li>
                     <span>Minimal Presence:</span><br />
                     You exist — but you’re invisible.
                  </li>
               </ul>
            </div>
         </div>
      </div>


@endsection
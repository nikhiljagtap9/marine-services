@extends('layouts.main')

@section('content')
<div class="clear"></div>
<br><br><br><br>
<div class="clear"></div>
<style type="text/css">
   .actv_expl{
   border-color: #124f98 !important;
   color: #124f98 !important;
   font-weight: 600 !important;
   }
   .footer-dark.main-footer .container.pt-4{
   display: none;
   }
</style>
<link rel="stylesheet" href="{{ asset('assets/css/internal_page.css')}}">
<!-- start details header -->
<div class="py-4 detl_pg ">
   <div class="container">
      <div class="justify-content-between row align-items-center g-4">
         <div class="col-lg col-xxl-8">
            <h1 class="h2 page-header-title fw-semibold">{{ ucwords($provider->company_name ?? 'N/A') }}</h1>
            <div class="catgry_wrp">
               @php
                  $allSubServiceIds = collect($provider->portServiceDetails)
                     ->pluck('sub_services')        // Pluck all sub_services arrays
                     ->flatten()                    // Flatten nested arrays
                     ->unique()                     // Keep unique IDs
                     ->values();                    // Reindex
                                                   
                  $subServiceNames = \App\Models\SubCategory::whereIn('id', $allSubServiceIds)->pluck('name')->toArray();
               @endphp
              
               @foreach($subServiceNames as $name)
                  <div class="singl_cat">
                     <i class="fa fa-ship" aria-hidden="true"></i>
                     <div class="singl_name">
                       {{ $name }}
                     </div>
                     <div class="clear"></div>
                  </div>
               @endforeach
               <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="info_detl">
               <div class="info_detl_titl">Overview</div>
               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
            </div>
            <div class="clear"></div>
            <ul class="list-inline list-separator d-flex align-items-center mb-2">

               <li class="list-inline-item">
                  <a href="" class="cont_num comn_num comn_num_con">
                     <i class="fa fa-phone" aria-hidden="true"></i>
                     <div class="data_li">{{ $provider->phone ?? 'N/A' }}</div>
                     <div class="clear"></div>
                  </a>
               </li>
               <li class="list-inline-item">
                  <a href="" class="cont_num comn_num">
                     <i class="fa fa-whatsapp" aria-hidden="true"></i>
                     <div class="data_li">{{ $provider->contactDetail->whatsapp_number ?? 'N/A' }}</div>
                     <div class="clear"></div>
                  </a>
               </li>
               <li class="list-inline-item">
                  <a href="" class="cont_num comn_num email_con">
                     <i class="fa fa-envelope" aria-hidden="true"></i>
                     <div class="data_li">{{ $provider->user->email ?? 'N/A' }}</div>
                     <div class="clear"></div>
                  </a>
               </li>
               <li class="list-inline-item">
                  <a href="" class="cont_num comn_num loctn_mail">
                     <i class="fa fa-map-marker" aria-hidden="true"></i>
                     <div class="data_li">{{ $provider->office_address ?? 'N/A' }}</div>
                     <div class="clear"></div>
                  </a>
               </li>

               @guest
               <li class="last_li_hide_new" >
                  <div class="">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                     Please Login/Register to view contact details.
                  </div>
               </li>
               <li class="cont_1 comn_cont" >
                  <div class="">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                     View Contact Number
                  </div>
               </li>
               <li class="cont_2 comn_cont" >
                  <div class="">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                     View WhatsApp Number
                  </div>
               </li>
               <li class="cont_3 comn_cont" >
                  <div class="">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                     View Email ID
                  </div>
               </li>
               <li class="cont_4 comn_cont" >
                  <div class="">
                     <i class="fa fa-lock" aria-hidden="true"></i>
                     View Location
                  </div>
               </li>
               @endguest
            </ul>
            <div class="clear"></div>
            <ul class="fs-14 fw-medium list-inline list-separator mb-0 text-muted">
               <li class="list-inline-item"> Posted {{ $subscription->created_at->diffForHumans() }}</li>
            </ul>
            <div class="clear"></div>
         </div>
         <div class="col-lg-auto">
            <!-- start checkbbox bookmark -->
            <div class="form-check form-check-bookmark mb-2 mb-sm-0">
               <input class="form-check-input" type="checkbox" value="" id="jobBookmarkCheck">
               <label class="form-check-label" for="jobBookmarkCheck">
               <span class="form-check-bookmark-default">
               <i class="fa fa-heart-o" aria-hidden="true"></i>  Save this listing
               </span>
               <span class="form-check-bookmark-active">
               <i class="fa-solid fa-heart me-1"></i> Saved
               </span>
               </label>
            </div>
            <!-- end /. checkbbox bookmark -->
            <div class="small mt-1">
               46 people added this company <br> to their Favorites.
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end /. details header -->
<!-- satart gallery -->

<div class="detl_left_panl">
<div class="container">
  @if(!empty($provider->companyDetail->photos))
    @php
        $photos = json_decode($provider->companyDetail->photos, true);
        $mainPhoto = $photos[0] ?? null;
        $sidePhotos = array_slice($photos, 1, 2); // Show next two photos
    @endphp

   <div class="rounded-4 overflow-hidden">
      <div class="row gx-2 zoom-gallery">
            {{-- Main Photo (Large left column) --}}
            <div class="col-md-8">
               @if($mainPhoto)
                  <a class="d-block position-relative" href="{{ asset('storage/' . $mainPhoto) }}">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $mainPhoto) }}" alt="Main Photo">
                        <div class="position-absolute bottom-0 end-0 mb-3 me-3">
                           <span class="align-items-center btn btn-light btn-sm d-flex d-md-none fw-semibold gap-2">
                              <i class="fa-solid fa-expand"></i>
                              <span> View photos</span>
                           </span>
                        </div>
                  </a>
               @endif
            </div>

            {{-- Side Photos (Right small column) --}}
            <div class="col-md-4 d-none d-md-inline-block">
               @foreach($sidePhotos as $photo)
                  <a class="d-block mb-2 position-relative" href="{{ asset('storage/' . $photo) }}">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $photo) }}" alt="Side Photo">
                        @if ($loop->last)
                        <div class="position-absolute bottom-0 end-0 mb-3 me-3">
                           <span class="align-items-center btn btn-light btn-sm d-md-inline-flex d-none fw-semibold gap-2">
                              <i class="fa-solid fa-expand"></i>
                              <span> View photos</span>
                           </span>
                        </div>
                        @endif
                  </a>
               @endforeach
            </div>
      </div>
   </div>
   @endif

   <div class="d-flex justify-content-end mt-2">
      <span class="small text-dark fw-semibold">Published:</span>
      <span class="small ms-1 text-muted"> {{ $subscription->created_at->format('F d, Y') }}</span>
   </div>
</div>
 
<div class="py-5">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 content">
            <div class="mb-4">
               <h4 class="fw-semibold fs-3 mb-4">About Us </h4>
               <p>{{ $provider->companyDetail->about ?? 'N/A' }}</p> 
            </div>

            <div class="mb-4">
               <h4 class="fw-semibold fs-3 mb-4">Service categories & Types </h4>
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p> 
            </div>

            <div class="mb-4">
               <h4 class="fw-semibold fs-3 mb-4">Service Brands </h4>
               <p>{{ $provider->companyDetail->brands ?? 'N/A' }}</p> 
            </div>
           
            <hr class="my-5">
            <div class="mb-4">
               <h4 class="fw-semibold fs-3 mb-4">Certifications 
                  <span class="font-caveat text-primary">& Achievements</span>
               </h4>
               <div class="clear"></div>
               <div class="certfc_docmnt">
                 @if(!empty($provider->companyDetail->certificates))
                     @php
                        $certs = json_decode($provider->companyDetail->certificates, true);
                     @endphp

                     <div class="d-flex flex-wrap gap-3">
                        @foreach($certs as $index => $cert)
                              <div class="certfc_docmnt_singl text-center">
                                 <a href="{{ asset('storage/' . $cert) }}" target="_blank">
                                    <img src="{{ asset('assets/images/certifct.jpg') }}" alt="Certificate" class="img-fluid">
                                 </a>
                                 <div class="certfc_docmnt_titl">
                                    Certificate {{ $index + 1 }}
                                 </div>
                              </div>
                        @endforeach
                     </div>
                  @endif

               </div>
               <div class="clear"></div>
            </div>
           
         </div>
        
      </div>
   </div>
</div>

</div>



<div class="detl_right_panl">

 
<div class="py-5">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 content">
             
            <div class="mb-4 righ_sub1" bis_skin_checked="1">
               <h4 class="fw-semibold fs-3 mb-4">Latest  <span class="font-caveat text-primary">Reviews</span></h4>
               <div class="border p-4 mb-5 rounded-4" bis_skin_checked="1">
                  <div class="row g-4 align-items-center" bis_skin_checked="1">
                     <div class="col-sm-auto" bis_skin_checked="1">
                        <div class="rating-block text-center" bis_skin_checked="1">
                           <!-- start title -->
                           <h5 class="font-caveat fs-4 mb-4">Average user rating</h5>
                           <!-- end /. title -->
                           <!-- Start Rating Point -->
                           <div class="rating-point position-relative ml-auto mr-auto" bis_skin_checked="1">
                              <!-- Start Svg Icon  -->
                              <svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width=".5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star text-primary">
                                 <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"> </polygon>
                              </svg>
                              <!-- /.End Svg Icon  -->
                              <h3 class="position-absolute mb-0 fs-18 text-primary">4.3</h3>
                           </div>
                           <!-- End Rating Point -->
                           <span class="fs-13">2,525 Ratings &amp;</span><br>
                           <span class="fs-13">293 Reviews</span>
                        </div>
                     </div>
                     <div class="col" bis_skin_checked="1">
                        <div class="rating-position" bis_skin_checked="1">
                           <!-- start title -->
                           <h5 class="font-caveat fs-4 mb-4">Rating breakdown</h5>
                           <!-- end /. title -->
                           <!-- Start Rating Point -->
                           <!-- start rating dimension -->
                           <div class="align-items-center d-flex mb-2 rating-dimension gap-2" bis_skin_checked="1">
                              <!-- start rating quantity -->
                              <div class="d-flex align-items-center gap-2" bis_skin_checked="1">
                                 <span class="fs-14 fw-semibold rating-points">5</span>
                                 <div class="d-flex align-items-center text-primary rating-stars" bis_skin_checked="1">
                                    <i class="fa-star-icon"></i>
                                    <i class="fa-star-icon"></i>
                                    <i class="fa-star-icon"></i>
                                    <i class="fa-star-icon"></i>
                                    <i class="fa-star-icon"></i>
                                 </div>
                              </div>
                              <!-- end /. rating quantity -->
                              <!-- Start Progress -->
                              <div class="progress flex-grow-1 me-2" bis_skin_checked="1">
                                 <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"></div>
                              </div>
                              <!-- /.End Progress -->
                              <!-- Start User Rating -->
                              <div class="bg-dark fs-11 fw-medium px-2 py-1 rounded-pill text-white user-rating" bis_skin_checked="1">4.5</div>
                              <!-- /.End User Rating -->
                           </div>
                           <!-- end /. rating dimension -->
                           <!-- start rating dimension -->
                           <div class="align-items-center d-flex mb-2 rating-dimension gap-2" bis_skin_checked="1">
                              <!-- start rating quantity -->
                              <div class="d-flex align-items-center gap-2" bis_skin_checked="1">
                                 <span class="fs-14 fw-semibold rating-points">5</span>
                                 <div class="d-flex align-items-center text-primary rating-stars" bis_skin_checked="1">
                                    <i class="fa-star-icon"></i>
                                    <i class="fa-star-icon"></i>
                                    <i class="fa-star-icon"></i>
                                    <i class="fa-star-icon half"></i>
                                    <i class="fa-star-icon none"></i>
                                 </div>
                              </div>
                              <!-- end /. rating quantity -->
                              <!-- start progress -->
                              <div class="progress flex-grow-1 me-2" bis_skin_checked="1">
                                 <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"></div>
                              </div>
                              <!-- end /. progress -->
                              <!-- start user rating -->
                              <div class="bg-dark fs-11 fw-medium px-2 py-1 rounded-pill text-white user-rating" bis_skin_checked="1">3.5</div>
                              <!-- end /. user rating -->
                           </div>
                           <!-- end /. rating dimension -->
                           <!-- start rating dimension -->
                           <div class="align-items-center d-flex mb-2 rating-dimension gap-2" bis_skin_checked="1">
                              <!-- start rating quantity -->
                              <div class="d-flex align-items-center gap-2" bis_skin_checked="1">
                                 <span class="fs-14 fw-semibold rating-points">3</span>
                                 <div class="d-flex align-items-center text-primary rating-stars" bis_skin_checked="1">
                                    <i class="fa-star-icon"></i>
                                    <i class="fa-star-icon"></i>
                                    <i class="fa-star-icon half"></i>
                                    <i class="fa-star-icon none"></i>
                                    <i class="fa-star-icon none"></i>
                                 </div>
                              </div>
                              <!-- end /. rating quantity -->
                              <!-- start progress -->
                              <div class="progress flex-grow-1 me-2" bis_skin_checked="1">
                                 <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"></div>
                              </div>
                              <!-- end /. progress -->
                              <!-- start user rating -->
                              <div class="bg-dark fs-11 fw-medium px-2 py-1 rounded-pill text-white user-rating" bis_skin_checked="1">1.5</div>
                              <!-- end /. user rating -->
                           </div>
                           <!-- end /. rating dimension -->
                           <!-- start rating dimension -->
                           <div class="align-items-center d-flex mb-2 rating-dimension gap-2" bis_skin_checked="1">
                              <!-- start rating quantity -->
                              <div class="d-flex align-items-center gap-2" bis_skin_checked="1">
                                 <span class="fs-14 fw-semibold rating-points">3</span>
                                 <div class="d-flex align-items-center text-primary rating-stars" bis_skin_checked="1">
                                    <i class="fa-star-icon"></i>
                                    <i class="fa-star-icon half"></i>
                                    <i class="fa-star-icon none"></i>
                                    <i class="fa-star-icon none"></i>
                                    <i class="fa-star-icon none"></i>
                                 </div>
                              </div>
                              <!-- end /. rating quantity -->
                              <!-- start progress -->
                              <div class="progress flex-grow-1 me-2" bis_skin_checked="1">
                                 <div class="progress-bar bg-info" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"></div>
                              </div>
                              <!-- end /. progress -->
                              <!-- start user rating -->
                              <div class="bg-dark fs-11 fw-medium px-2 py-1 rounded-pill text-white user-rating" bis_skin_checked="1">5.2</div>
                              <!-- end /. user rating -->
                           </div>
                           <!-- end /. rating dimension -->
                           <!-- start rating dimension -->
                           <div class="align-items-center d-flex mb-2 rating-dimension gap-2" bis_skin_checked="1">
                              <!-- start rating quantity -->
                              <div class="d-flex align-items-center gap-2" bis_skin_checked="1">
                                 <span class="fs-14 fw-semibold rating-points">1</span>
                                 <div class="d-flex align-items-center text-primary rating-stars" bis_skin_checked="1">
                                    <i class="fa-star-icon"></i>
                                    <i class="fa-star-icon none"></i>
                                    <i class="fa-star-icon none"></i>
                                    <i class="fa-star-icon none"></i>
                                    <i class="fa-star-icon none"></i>
                                 </div>
                              </div>
                              <!-- end /. rating quantity -->
                              <!-- start progress -->
                              <div class="progress flex-grow-1 me-2" bis_skin_checked="1">
                                 <div class="progress-bar text-bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" bis_skin_checked="1"></div>
                              </div>
                              <!-- end /. progress -->
                              <!-- start user rating -->
                              <div class="bg-dark fs-11 fw-medium px-2 py-1 rounded-pill text-white user-rating" bis_skin_checked="1">6.9</div>
                              <!-- end /. user rating -->
                           </div>
                           <!-- end /. rating dimension -->
                        </div>
                     </div>
                  </div>
               </div>
               <div class="d-flex mb-4 border-bottom pb-4" bis_skin_checked="1">
                  <div class="flex-shrink-0" bis_skin_checked="1">
                     <img src="{{ asset('assets/images/avatar/01.jpg')}}" alt="..." height="70" width="70" class="object-fit-cover rounded-circle">
                  </div>
                  <div class="flex-grow-1 ms-4" bis_skin_checked="1">
                     <div class="comment-header d-flex flex-wrap gap-2 mb-3" bis_skin_checked="1">
                        <div bis_skin_checked="1">
                           <h4 class="fs-18 mb-0">- Ethan Blackwood</h4>
                           <div class="comment-datetime fs-12 text-muted" bis_skin_checked="1">25 Oct 2025 at 12.27 pm</div>
                        </div>
                        <!-- start rating -->
                        <div class="d-flex align-items-center gap-2 ms-auto" bis_skin_checked="1">
                           <div class="d-flex align-items-center text-primary rating-stars" bis_skin_checked="1">
                              <i class="fa-star-icon"></i>
                              <i class="fa-star-icon"></i>
                              <i class="fa-star-icon"></i>
                              <i class="fa-star-icon half"></i>
                              <i class="fa-star-icon none"></i>
                           </div>
                           <span class="fs-14 fw-semibold rating-points">3.5/5</span>
                        </div>
                        <!-- end /. rating -->
                     </div>
                     <div class="fs-15" bis_skin_checked="1">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which.</div>
                  </div>
               </div>
               <div class="d-flex mb-4 border-bottom pb-4" bis_skin_checked="1">
                  <div class="flex-shrink-0" bis_skin_checked="1">
                     <img src="{{ asset('assets/images/avatar/04.jpg')}}" alt="..." height="70" width="70" class="object-fit-cover rounded-circle">
                  </div>
                  <div class="flex-grow-1 ms-3" bis_skin_checked="1">
                     <div class="comment-header d-flex flex-wrap gap-2 mb-3" bis_skin_checked="1">
                        <div bis_skin_checked="1">
                           <h4 class="fs-18 mb-0">- Pranoti </h4>
                           <div class="comment-datetime fs-12 text-muted" bis_skin_checked="1">25 Oct 2025 at 12.27 pm</div>
                        </div>
                        <!-- start rating -->
                        <div class="d-flex align-items-center gap-2 ms-auto" bis_skin_checked="1">
                           <div class="d-flex align-items-center text-primary rating-stars" bis_skin_checked="1">
                              <i class="fa-star-icon"></i>
                              <i class="fa-star-icon"></i>
                              <i class="fa-star-icon"></i>
                              <i class="fa-star-icon half"></i>
                              <i class="fa-star-icon none"></i>
                           </div>
                           <span class="fs-14 fw-semibold rating-points">3.5/5</span>
                        </div>
                        <!-- end /. rating -->
                     </div>
                     <div class="fs-15" bis_skin_checked="1">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </div>
                  </div>
               </div>
               <div class="d-flex mb-4" bis_skin_checked="1">
                  <div class="flex-shrink-0" bis_skin_checked="1">
                     <img src="{{ asset('assets/images/avatar/05.jpg')}}" alt="..." height="70" width="70" class="object-fit-cover rounded-circle">
                  </div>
                  <div class="flex-grow-1 ms-3" bis_skin_checked="1">
                     <div class="comment-header d-flex flex-wrap gap-2 mb-3" bis_skin_checked="1">
                        <div bis_skin_checked="1">
                           <h4 class="fs-18 mb-0">- Marcus Knight</h4>
                           <div class="comment-datetime fs-12 text-muted" bis_skin_checked="1">25 Oct 2025 at 12.27 pm</div>
                        </div>
                        <!-- start rating -->
                        <div class="d-flex align-items-center gap-2 ms-auto" bis_skin_checked="1">
                           <div class="d-flex align-items-center text-primary rating-stars" bis_skin_checked="1">
                              <i class="fa-star-icon"></i>
                              <i class="fa-star-icon"></i>
                              <i class="fa-star-icon"></i>
                              <i class="fa-star-icon half"></i>
                              <i class="fa-star-icon none"></i>
                           </div>
                           <span class="fs-14 fw-semibold rating-points">3.5/5</span>
                        </div>
                        <!-- end /. rating -->
                     </div>
                     <div class="fs-15" bis_skin_checked="1"> This is some content from a media component. You can replace this with any content and adjust it as needed.</div>
                  </div>
               </div>
            </div>
            <hr class="my-5">
            <div class="mb-4 mb-lg-0" bis_skin_checked="1">
               <h4 class="fw-semibold fs-3 mb-4">Leave a <span class="font-caveat text-primary">Rating & Comment</span></h4>
               <div class="rating_star_a">
                  <div class="ad_rting_titl required ">Add Rating</div>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
               <form class="row g-4">
                  <div class="col-sm-12" bis_skin_checked="1">
                     <!-- start form group -->
                     <div class="" bis_skin_checked="1">
                        <label class="required fw-medium mb-2">Company Name</label>
                        <input type="text" class="form-control" placeholder="Enter Company Name" required="">
                     </div>
                     <!-- end /. form group -->
                  </div>

                  


                   
                  <div class="col-sm-6" bis_skin_checked="1">
                     <!-- start form group -->
                     <div class="" bis_skin_checked="1">
                        <label class="required fw-medium mb-2">Your Name</label>
                        <input type="text" class="form-control" placeholder="Enter Your Name" >
                     </div>
                     <!-- end /. form group -->
                  </div>


                  <div class="col-sm-6" bis_skin_checked="1">
                     <!-- start form group -->
                     <div class="" bis_skin_checked="1">
                        <label class="required fw-medium mb-2">Company Email Address</label>
                        <input type="text" class="form-control" placeholder="Enter Company Email Address" required="">
                     </div>
                     <!-- end /. form group -->
                  </div>
                   


                  <div class="col-sm-12" bis_skin_checked="1">
                     <!-- start form group -->
                     <div class="" bis_skin_checked="1">
                        <label class="required fw-medium mb-2">Comment</label>
                        <textarea class="form-control" rows="7" placeholder="Tell us what we can help you with!"></textarea>
                     </div>
                     <!-- end /. form group -->
                  </div>





                  <div class="col-sm-6" bis_skin_checked="1">
                     <!-- start form group -->
                     <div class="" bis_skin_checked="1">
                        <label class="required fw-medium mb-2">Upload Invoice</label>
                        <input type="file" class="form-control" placeholder="" >
                     </div>
                     <!-- end /. form group -->
                  </div>


                  <div class="col-sm-6" bis_skin_checked="1">
                     <!-- start form group -->
                     <div class="" bis_skin_checked="1">
                        <label class=" fw-medium mb-2">Upload Photo</label>
                        <input type="file" class="form-control"  >
                     </div>
                     <!-- end /. form group -->
                  </div>
                  <div class="clear"></div>
                  <div class="note_comn">
                     Note: To ensure the authenticity of all reviews, we require users to upload an invoice or a relevant proof of service received from the listed company. <br><br>
The invoice will NOT be displayed publicly and is only used for verification purposes.
You may blur or hide the price or any sensitive information on the document before uploading. <br><br>
We also encourage users to upload a photo of the service received, if possible

                  </div>
                  <div class="clear"></div>


                  <div class="col-sm-12 text-end" bis_skin_checked="1">
                     <button type="submit" class="btn btn-primary" fdprocessedid="rsydt2">Submit</button>
                  </div>
               </form>
            </div>
            
            <hr class="my-5">
            <div class="mb-4">
               <h4 class="fw-semibold fs-3 mb-4">References 
                  <span class="font-caveat text-primary"> Shipowners </span>
               </h4>
               <div class="clear"></div>
               <div class="certfc_docmnt certfc_docmnt_2" >
                  <div class="certfc_docmnt_singl">
                     <div class="certfc_docmnt_titl">
                        Lorem Shipowners
                     </div>
                     <div class="certfc_docmnt_year">
                        Sinc : 2005
                     </div>
                     <div class="catgry_wrp catgry_wrp_2" bis_skin_checked="1">
                        <div class="singl_cat" bis_skin_checked="1">
                           <i class="fa fa-ship" aria-hidden="true"></i>
                           <div class="singl_name" bis_skin_checked="1">Fuel Supply</div>
                           <div class="clear" bis_skin_checked="1"></div>
                        </div>
                        <div class="singl_cat" bis_skin_checked="1">
                           <i class="fa fa-ship" aria-hidden="true"></i>
                           <div class="singl_name" bis_skin_checked="1">Repairs</div>
                           <div class="clear" bis_skin_checked="1"></div>
                        </div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                  </div>
                  <div class="certfc_docmnt_singl">
                     <div class="certfc_docmnt_titl">
                        Lorem Shipowners
                     </div>
                     <div class="certfc_docmnt_year">
                        Sinc : 2005
                     </div>
                     <div class="catgry_wrp catgry_wrp_2" bis_skin_checked="1">
                        <div class="singl_cat" bis_skin_checked="1">
                           <i class="fa fa-ship" aria-hidden="true"></i>
                           <div class="singl_name" bis_skin_checked="1">Fuel Supply</div>
                           <div class="clear" bis_skin_checked="1"></div>
                        </div>
                        <div class="singl_cat" bis_skin_checked="1">
                           <i class="fa fa-ship" aria-hidden="true"></i>
                           <div class="singl_name" bis_skin_checked="1">Repairs</div>
                           <div class="clear" bis_skin_checked="1"></div>
                        </div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                  </div>
                  <div class="certfc_docmnt_singl">
                     <div class="certfc_docmnt_titl">
                        Lorem Shipowners
                     </div>
                     <div class="certfc_docmnt_year">
                        Sinc : 2005
                     </div>
                     <div class="catgry_wrp catgry_wrp_2" bis_skin_checked="1">
                        <div class="singl_cat" bis_skin_checked="1">
                           <i class="fa fa-ship" aria-hidden="true"></i>
                           <div class="singl_name" bis_skin_checked="1">Fuel Supply</div>
                           <div class="clear" bis_skin_checked="1"></div>
                        </div>
                        <div class="singl_cat" bis_skin_checked="1">
                           <i class="fa fa-ship" aria-hidden="true"></i>
                           <div class="singl_name" bis_skin_checked="1">Repairs</div>
                           <div class="clear" bis_skin_checked="1"></div>
                        </div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                  </div>
                  <div class="certfc_docmnt_singl">
                     <div class="certfc_docmnt_titl">
                        Lorem Shipowners
                     </div>
                     <div class="certfc_docmnt_year">
                        Sinc : 2005
                     </div>
                     <div class="catgry_wrp catgry_wrp_2" bis_skin_checked="1">
                        <div class="singl_cat" bis_skin_checked="1">
                           <i class="fa fa-ship" aria-hidden="true"></i>
                           <div class="singl_name" bis_skin_checked="1">Fuel Supply</div>
                           <div class="clear" bis_skin_checked="1"></div>
                        </div>
                        <div class="singl_cat" bis_skin_checked="1">
                           <i class="fa fa-ship" aria-hidden="true"></i>
                           <div class="singl_name" bis_skin_checked="1">Repairs</div>
                           <div class="clear" bis_skin_checked="1"></div>
                        </div>
                        <div class="clear" bis_skin_checked="1"></div>
                     </div>
                  </div>
                  <div class="certfc_docmnt_singl">
                     <div class="certfc_docmnt_titl">
                        Lorem Shipowners
                     </div>
                     <div class="certfc_docmnt_year">
                        Sinc : 2005
                     </div>
                     <div class="catgry_wrp catgry_wrp_2" bis_skin_checked="1">
                        <div class="singl_cat" bis_skin_checked="1">
                           <i class="fa fa-ship" aria-hidden="true"></i>
                           <div class="singl_name" bis_skin_checked="1">Fuel Supply</div>
                           <div class="clear" bis_skin_checked="1"></div>
                        </div>
                        <div class="singl_cat" bis_skin_checked="1">
                           <i class="fa fa-ship" aria-hidden="true"></i>
                           <div class="singl_name" bis_skin_checked="1">Repairs</div>
                           <div class="clear" bis_skin_checked="1"></div>
                        </div>
                        <div class="clear" bis_skin_checked="1"></div>
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

<div class="clear"></div>

<!-- end /. listing details -->
<!-- start listings carousel -->
<div class="ak_pop">
   <div class="overlay" id="overlay"></div>
   <!-- Popup -->
   <div class="popup" id="popup">
      <div class="">
         <div class="login_icon">
            <i class="fa fa-sign-in" aria-hidden="true"></i>
         </div>
         <div class="login_titl">
            Please Log In <br> To View Contact Details.
         </div>
         <div class="login_btns">
            <a class="login_pop" href="{{ route('login', ['redirect' => request()->fullUrl()]) }}">Login</a>
            <a class="reg_pop" href="{{ route('register', ['redirect' => request()->fullUrl()]) }}">Register</a>
            <div class="clear"></div>
         </div>
      </div>
      <button class="close-btn" onclick="closePopup()">
         <i class="fa fa-times" aria-hidden="true"></i>
      </button>
   </div>
</div>
<!-- POPUP_SCRIPT 603 -->
@endsection
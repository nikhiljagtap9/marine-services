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

   .thumb-wrapper {
    display: block;
    overflow: hidden;
}

.thumb-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.2s ease;
}

.thumb-img:hover {
    transform: scale(1.05);
}

/* Size classes based on image count */
.thumb-large {
  /*  width: 110px;
    height: 110px; */
}

.thumb-medium {
    width: 80px;
    height: 80px;
}

.thumb-small {
    width: 62px;
    height: 62px;
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
              
               @foreach ($provider->portServiceDetails->unique('category_id') as $portService)
                  <div class="singl_cat">
                     <i class="fa fa-ship" aria-hidden="true"></i>
                     <div class="singl_name">
                        {{ $portService->category->name ?? 'N/A' }}
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
                  <a href="https://www.google.com/maps?q={{ $provider->lat }},{{ $provider->lng }}" target="_blank" class="cont_num comn_num loctn_mail">
                     <i class="fa fa-map-marker" aria-hidden="true"></i>
                     <!-- <div class="data_li">{{ $provider->office_address ?? 'N/A' }}</div> -->
                     <div class="data_li" title="{{ $provider->office_address }}">{{ \Illuminate\Support\Str::limit($provider->office_address, 20) }}</div>
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
            <div style="float:right; width: 200px; text-align: center; background:#fff; padding: 20px; margin-bottom: 20px; border-radius: 10px; box-shadow: 0px 0px 13px #ccc; position: relative; ">

               <a class="downld_btn" id="downloadQR" style="cursor: pointer; padding-top: 6px; position: absolute; right: 0; top: 0; width: 40px; height: 40px; background: #124f98; margin-top: -15px; margin-right: -20px; border-radius: 10px; " >
                  <svg style="color:#fff;" xmlns="http://www.w3.org/2000/svg"  width="25"  height="25"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                  
               </a>
               @php
                  $qrCodeSvg = base64_encode(QrCode::format('svg')->size(150)->generate(route('review.form', [$encryptedUserId, $subscription->id])));
               @endphp

               <img id="qrImage" src="data:image/svg+xml;base64,{{ $qrCodeSvg }}" alt="QR Code" style="width: 90%;">


               <div style="float:left; width: 100%; font-size: 20px; font-weight: 500; ">
                  Scan for Review
               </div>
            </div>
            <!-- start checkbbox bookmark -->
            @php
               $isClient = Auth::check() && Auth::user()->user_type === 'client';
               $favourite = $isClient
                  ? \App\Models\Favourite::where('user_id', Auth::id())->where('subscription_id', $subscription->id)->exists()
                  : false;

               $loginUrl = route('login', ['redirect' => request()->fullUrl()]);
            @endphp

            @if(!Auth::check())
               {{-- Not logged in, show fake checkbox with login redirect --}}
               <a href="{{ $loginUrl }}" class="text-decoration-none">
                  <div class="form-check form-check-bookmark mb-2 mb-sm-0">
                     <input class="form-check-input" type="checkbox" disabled>
                     <label class="form-check-label">
                        <span class="form-check-bookmark-default">
                           <i class="fa fa-heart-o" aria-hidden="true"></i> Save this listing
                        </span>
                        <span class="form-check-bookmark-active">
                           <i class="fa-solid fa-heart me-1"></i> Saved
                        </span>
                     </label>
                  </div>
               </a>
            @else
               {{-- Logged in --}}
               <div class="form-check form-check-bookmark mb-2 mb-sm-0">
                  <input class="form-check-input" type="checkbox" id="jobBookmarkCheck"
                     {{ $favourite ? 'checked' : '' }} {{ $isClient ? '' : 'disabled' }}>
                  <label class="form-check-label" for="jobBookmarkCheck">
                     <span class="form-check-bookmark-default">
                        <i class="fa fa-heart-o" aria-hidden="true"></i> Save this listing
                     </span>
                     <span class="form-check-bookmark-active">
                        <i class="fa-solid fa-heart me-1"></i> Saved
                     </span>
                  </label>
               </div>
            @endif


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
  <!-- @if(!empty($provider->companyDetail->photos))
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
                  <a class="d-block position-relative" href="{{ asset('storage/' . $mainPhoto) }}" title="Main Photo">
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
                  <a class="d-block mb-2 position-relative" href="{{ asset('storage/' . $photo) }}"title="Side Photo">
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
   @endif -->

@if(!empty($provider->companyDetail->photos))
    @php
        $photos = json_decode($provider->companyDetail->photos, true);
        $mainPhoto = $photos[0] ?? null;
        $otherPhotos = array_slice($photos, 1);
        $count = count($otherPhotos);
        
        // Determine size class based on count
        if ($count <= 2) {
            $thumbSize = 'large'; // ~120px
        } elseif ($count <= 9) {
            $thumbSize = 'medium'; // ~90px
        } else {
            $thumbSize = 'small'; // ~70px
        }
    @endphp

    @if($mainPhoto)
        <div class="rounded-4 overflow-hidden">
            <div class="row gx-2 zoom-gallery">
                {{-- Main Photo --}}
                <div class="col-md-8 mb-2 mb-md-0">
                    <a href="{{ asset('storage/' . $mainPhoto) }}" class="d-block position-relative" title="Main Photo">
                        <img src="{{ asset('storage/' . $mainPhoto) }}" class="img-fluid w-100 rounded" alt="Main Photo">
                        <div class="position-absolute bottom-0 end-0 mb-2 me-2">
                            <span class="align-items-center btn btn-light btn-sm fw-semibold gap-2 d-flex d-md-none">
                                <i class="fa-solid fa-expand"></i>
                                <span> View photos</span>
                            </span>
                        </div>
                    </a>
                </div>

                {{-- Auto-sized thumbnails --}}
                <div class="col-md-4">
                    <div class="d-flex flex-wrap gap-2 justify-content-start">
                        @foreach($otherPhotos as $index => $photo)
                            <a href="{{ asset('storage/' . $photo) }}" class="thumb-wrapper thumb-{{ $thumbSize }} position-relative" title="Photo {{ $index + 2 }}">
                                <img src="{{ asset('storage/' . $photo) }}" class="thumb-img rounded" alt="Photo {{ $index + 2 }}">
                                @if ($loop->last)
                                    <div class="position-absolute bottom-0 end-0 mb-1 me-1">
                                        <span class="align-items-center btn btn-light btn-sm fw-semibold gap-2 d-none d-md-flex">
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
        </div>
    @endif
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
               <div class="d-flex mb-4 border-bottom pb-4" bis_skin_checked="1">
                  
                  @php
                  // Group portServiceDetails by category_id
                  $groupedServices = $provider->portServiceDetails->groupBy('category_id');
                  @endphp

                  @foreach ($groupedServices as $categoryId => $services)
                     @php
                        $categoryName = optional($services->first()->category)->name ?? 'N/A';

                        // Collect all sub-services for this category group
                        $subServiceIds = $services->pluck('sub_services')->flatten()->unique()->filter();

                        // Fetch sub-service names
                        $subServiceNames = \App\Models\SubCategory::whereIn('id', $subServiceIds)->pluck('name');
                     @endphp                 
               
                     <div class="flex-grow-1 ms-3" bis_skin_checked="1">
                        <div class="comment-header d-flex flex-wrap gap-2 mb-3" bis_skin_checked="1">
                           <div bis_skin_checked="1">
                              <div class="singl_cat">
                                 <i class="fa fa-ship" aria-hidden="true"></i>
                                 <div class="singl_name">
                                 {{ ucFirst($categoryName) }}
                                 </div>
                                 <div class="clear"></div>
                              </div>
                           </div>
                        </div>
                        <div class="fs-15" bis_skin_checked="1"> 
                              @foreach ($subServiceNames as $subName)
                                 <li>{{ ucFirst($subName) }}</li>
                              @endforeach
                        </div>
                     </div>
                  @endforeach
               </div>
              
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
                                    <img src="{{ asset('storage/' . $cert) }}" alt="Certificate" class="img-fluid">
                                 </a>
                                 <div class="certfc_docmnt_titl">
                                    <!-- Certificate {{ $index + 1 }} -->
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
                              <h3 class="position-absolute mb-0 fs-18 text-primary">{{ $averageRating }}</h3>
                           </div>
                           <!-- End Rating Point -->
                           <span class="fs-13">{{ $totalRatings }} Ratings &amp;</span><br>
                           <span class="fs-13">{{ $reviews->count() }} Reviews</span>
                        </div>
                     </div>
                     <div class="col" bis_skin_checked="1">
                        <div class="rating-position" bis_skin_checked="1">
                           <!-- start title -->
                           <h5 class="font-caveat fs-4 mb-4">Rating breakdown</h5>
                           <!-- end /. title -->
                           <!-- Start Rating Point -->
                           <!-- start rating dimension -->
                           @for($i = 5; $i >= 1; $i--)
                              @php
                                 $count = $ratingCounts[$i] ?? 0;
                                 $percentage = $totalRatings > 0 ? ($count / $totalRatings) * 100 : 0;
                              @endphp
                              <div class="align-items-center d-flex mb-2 rating-dimension gap-2">
                                 <div class="d-flex align-items-center gap-2">
                                       <span class="fs-14 fw-semibold rating-points">{{ $i }}</span>
                                       <div class="d-flex align-items-center text-primary rating-stars">
                                          @for($s = 0; $s < 5; $s++)
                                             <i class="fa-star-icon {{ $s < $i ? '' : 'none' }}"></i>
                                          @endfor
                                       </div>
                                 </div>
                                 <div class="progress flex-grow-1 me-2">
                                       <div class="progress-bar {{ $i >= 4 ? 'bg-primary' : ($i == 3 ? 'bg-warning' : 'text-bg-danger') }}" 
                                          role="progressbar" 
                                          style="width: {{ $percentage }}%" 
                                          aria-valuenow="{{ $percentage }}" 
                                          aria-valuemin="0" 
                                          aria-valuemax="100"></div>
                                 </div>
                                 <div class="bg-dark fs-11 fw-medium px-2 py-1 rounded-pill text-white user-rating">{{ number_format($percentage, 1) }}%</div>
                              </div>
                           @endfor
                           <!-- end /. rating dimension -->
                        </div>
                     </div>
                  </div>
               </div>

               <div id="review-container">
                  @include('partials.review_item', ['reviews' => $reviews])
               </div>


               {{-- Show Load More only if there are reviews to show AND more pages --}}
               @if ($reviews->hasMorePages())
                  <div class="text-center mt-4" id="load-more-container">
                     <button id="load-more-reviews" class="btn btn-outline-primary" data-page="2">Load More</button>
                  </div>
               @endif
            </div>
            <hr class="my-5">
            <div class="mb-4 mb-lg-0" bis_skin_checked="1" id="enquiryForm">
               <h4 class="fw-semibold fs-3 mb-4">Leave a <span class="font-caveat text-primary">Enquiry & Comment</span></h4>
               <div class="rating_star_a">
                  <div class="ad_rting_titl required ">Add Enquiry</div>
                  <div class="clear"></div>
               </div>
               <div class="clear"></div>
               @if(session('success'))
                  <div class="alert alert-success">
                     {{ session('success') }}
                  </div>
               @endif
               <form  class="row g-4" action="{{ route('enquiry.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="col-sm-12" bis_skin_checked="1">
                     
                     <!-- start form group -->
                     <div class="" bis_skin_checked="1">
                        <!-- Hidden inputs for subscription_id and user_id -->
                        <input type="hidden" name="subscription_id" value="{{ $subscription->id }}">
                        <input type="hidden" name="service_user_id" value="{{ $subscription->user_id }}">
                        <label class="required fw-medium mb-2">Company Name</label>
                        <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" placeholder="Enter Company Name">
                        @error('company_name')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                        @enderror
                     </div>
                     <!-- end /. form group -->
                  </div>

                  <div class="col-sm-6" bis_skin_checked="1">
                     <!-- start form group -->
                     <div class="" bis_skin_checked="1">
                        <label class="required fw-medium mb-2">Your Name</label>
                        <input type="text" name="your_name" class="form-control @error('your_name') is-invalid @enderror" placeholder="Enter Your Name" >
                        @error('your_name')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                        @enderror
                     </div>
                     <!-- end /. form group -->
                  </div>

                  <div class="col-sm-6" bis_skin_checked="1">
                     <!-- start form group -->
                     <div class="" bis_skin_checked="1">
                        <label class="required fw-medium mb-2">Company Email Address</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Company Email Address">
                        @error('email')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                        @enderror
                     </div>
                     <!-- end /. form group -->
                  </div>

                  <div class="col-sm-12" bis_skin_checked="1">
                     <!-- start form group -->
                     <div class="" bis_skin_checked="1">
                        <label class="required fw-medium mb-2">Comment</label>
                        <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" rows="7" placeholder="Tell us what we can help you with!"></textarea>
                        @error('comment')
                                <div class="invalid-feedback text-start">{{ $message }}</div>
                        @enderror
                     </div>
                     <!-- end /. form group -->
                  </div>

                  <div class="col-sm-6" bis_skin_checked="1">
                     <!-- start form group -->
                     <div class="" bis_skin_checked="1">
                        <label class=" fw-medium mb-2">Upload Photo</label>
                        <input type="file"  name="photo" class="form-control"  >
                     </div>
                     <!-- end /. form group -->
                  </div>
                  <div class="clear"></div>
                  <!-- <div class="note_comn">
                     Note: To ensure the authenticity of all reviews, we require users to upload an invoice or a relevant proof of service received from the listed company. <br><br>
The invoice will NOT be displayed publicly and is only used for verification purposes.
You may blur or hide the price or any sensitive information on the document before uploading. <br><br>
We also encourage users to upload a photo of the service received, if possible

                  </div> 
                  <div class="clear"></div>
                  -->


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
 @section('scripts')
   <!-- @auth
   <script>
      $(document).ready(function () {
         $(".last_li_hide_new").addClass("last_li_hide_new_hide");
         $(".comn_cont").addClass("comn_cont_show");
      });
   </script>
   @endauth -->
<script>
   // Add JavaScript to Trigger Download
    document.getElementById('downloadQR').addEventListener('click', function () {
        const qrImg = document.getElementById('qrImage');
        const link = document.createElement('a');
        link.href = qrImg.src;
        link.download = 'qr-code.png';
        link.click();
    });
</script>

<script>
   // load more review data
   $(document).on('click', '#load-more-reviews', function () {
      let page = $(this).data('page');
      let button = $(this);

      $.ajax({
         url: "?page=" + page,
         type: "get",
         beforeSend: function () {
               button.prop('disabled', true).text('Loading...');
         },
         success: function (response) {
                // Append the content first
               $('#review-container').append(response);
               if (response.trim() === '' || response.includes('No reviews found')) {
                  $('#load-more-container').remove(); // Hide button if no more data
               } else {            
                  button.data('page', page + 1);
                  button.prop('disabled', false).text('Load More');
               }
         },
         error: function () {
               button.prop('disabled', false).text('Load More');
         }
      });
   });

</script>

<script>
   // add favourite
    $(document).on('change', '#jobBookmarkCheck', function () {
        let isChecked = $(this).is(':checked');

        $.ajax({
            url: "{{ route('favourite.toggle') }}",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                subscription_id: '{{ $subscription->id }}'
            },
            success: function (res) {
                if (res.status === 'added') {
                    console.log('Saved');
                } else if (res.status === 'removed') {
                    console.log('Removed');
                }
            },
            error: function (xhr) {
                if (xhr.status === 403) {
                    alert('Please login as a client to save this listing.');
                    $('#jobBookmarkCheck').prop('checked', false);
                } else {
                    alert('An error occurred.');
                }
            }
        });
    });
</script>



@endsection
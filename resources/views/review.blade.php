@extends('layouts.main')
<link rel="stylesheet" href="{{ asset('privacy-t&c-consent/assets/css/scan.css') }}">
<link rel="stylesheet" href="{{ asset('privacy-t&c-consent/assets/css/internal_page.css') }}">
<style>
   .invalid-feedback{
      display: block !important;;
   }
   #star-rating .star {
      font-size: 28px;
      color: #f39c12;
      cursor: pointer;
      margin-right: 5px;
      transition: color 0.2s;
   }

   #star-rating .star.selected {
      color: #f39c12;
   }
</style>
@section('content')

<div class="reviw_wrap">
   <video class="reviw_wrap_inner" autoplay="" muted="" loop="">
            <source src="{{ asset('privacy-t&c-consent/assets/img/vi.mp4')}}" type="video/mp4">
            <source src="{{ asset('privacy-t&c-consent/assets/img/vi.mp4')}}" type="video/ogg">
    </video>
   <div class="rewv_inner_scan">
      <div class="logo_scn_centr">
         <img src="{{ asset('storage/' . $provider->serviceProviderDetail->company_logo) }}" class="logo_scn_logo" >
         <div class="scan_nam_titl">
            {{ ucwords($provider->serviceProviderDetail->company_name) }}
         </div>
         <div class="clear"></div>
      </div>
      <div class="detl_right_panl" style="transform: none;" bis_skin_checked="1">
         <div class="py-5" style="transform: none;" bis_skin_checked="1">
            <div class="container" style="transform: none;" bis_skin_checked="1">
               <div class="row" style="transform: none;" bis_skin_checked="1">
                  <div class="col-lg-12 content" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;" bis_skin_checked="1">
                     <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;" bis_skin_checked="1">
                        
                        
                        <div class="mb-4 mb-lg-0" bis_skin_checked="1">
                           <h4 class="fw-semibold fs-3 mb-4">Leave a <span class="font-caveat text-primary">Rating &amp; Comment</span></h4>
                           @if(session('success'))
                              <div id="successMessage" class="text-success text-center fw-bold mt-2">
                                 {{ session('success') }}
                              </div>
                           @endif


                           <form method="POST" action="{{ route('review.store', $provider->id) }}" enctype="multipart/form-data" class="row g-4">
                               @csrf
                              <div class="rating_star_a mb-3">
                                    <input type="hidden" name="subscription_id" value="{{ $subscriptionId }}">
                                    <div class="ad_rting_titl required mb-2 d-block">Add Rating</div>
                                    <div id="star-rating">
                                       @for ($i = 1; $i <= 5; $i++)
                                          <i class="fa {{ old('rating') >= $i ? 'fa-star selected' : 'fa-star-o' }} star" data-value="{{ $i }}"></i>
                                       @endfor
                                    </div>
                                    <input type="hidden" name="rating" id="rating-value" value="{{ old('rating') }}">
                                    @error('rating')
                                       <div class="invalid-feedback text-start d-block">{{ $message }}</div>
                                    @enderror
                              </div>
                              <div class="col-sm-4" bis_skin_checked="1">
                                 <!-- start form group -->
                                 <div class="" bis_skin_checked="1">
                                    <label class="required fw-medium mb-2">Vessel/Company Name</label>
                                    <input type="text" name="vessel_company_name" value="{{ old('vessel_company_name') }}" class="form-control" placeholder="Enter Vessel/Company Name" >
                                    @error('vessel_company_name')
                                          <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                 </div>
                                 <!-- end /. form group -->
                              </div>
                              <div class="col-sm-4" bis_skin_checked="1">
                                 <!-- start form group -->
                                 <div class="" bis_skin_checked="1">
                                    <label class="required fw-medium mb-2">Vessel/Company Email Address</label>
                                    <input type="text" name="vessel_company_email" value="{{ old('vessel_company_email') }}" class="form-control" placeholder="Enter Vessel/Company Email Address">
                                    @error('vessel_company_email')
                                          <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                 </div>
                                 <!-- end /. form group -->
                              </div>

                               
                              <div class="col-sm-4" bis_skin_checked="1">
                                 <div class="" bis_skin_checked="1">
                                    <label class="required fw-medium mb-2">Port Name</label>
                                    <select name="port_id" class="form-control">
                                        <option value="">Select Port Name</option>
                                        @foreach($ports as $port)
                                          <option value="{{ $port->id }}" {{ old('port_id') == $port->id ? 'selected' : '' }}>
                                                {{ $port->name }}
                                          </option>
                                        @endforeach
                                    </select>
                                    @error('port_id')
                                          <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-sm-4" bis_skin_checked="1">
                                 <div class="" bis_skin_checked="1">
                                    <label class="required fw-medium mb-2">Date of Service</label>
                                    <input name="service_date" type="date" value="{{ old('service_date') }}" class="form-control" placeholder="Enter Date of Service">
                                    @error('service_date')
                                          <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                 </div>
                              </div>

                              <div class="col-sm-4" bis_skin_checked="1">
                                 <div class="" bis_skin_checked="1">
                                    <label class="required fw-medium mb-2">Service Received </label>
                                    <select name="service_category_id" class="form-control">
                                        <option value="">Select Service Received</option>
                                        @foreach($categories as $category)
                                          <option value="{{ $category->id }}"  {{ old('service_category_id') == $category->id ? 'selected' : '' }} >
                                             {{ $category->name }}
                                          </option>
                                        @endforeach
                                    </select>
                                    @error('service_category_id')
                                          <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-sm-4" bis_skin_checked="1">
                                 <div class="" bis_skin_checked="1">
                                    <label class="fw-medium mb-2">Invoice/Delivery Document</label>
                                    <input name="invoice_document"  type="file" class="form-control" >
                                 </div>
                                 @error('invoice_document')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                 @enderror
                              </div>

                              <div class="col-sm-12" bis_skin_checked="1">
                                 <!-- start form group -->
                                 <div class="" bis_skin_checked="1">
                                    <label class="fw-medium mb-2">Comment</label>
                                    <textarea name="comment" class="form-control" rows="5" placeholder="Tell us your experience with this service">{{ old('comment') }}</textarea>
                                 </div>
                                 <!-- end /. form group -->
                              </div>
                              
                              <div class="clear" bis_skin_checked="1"></div>
                              <div class="note_comn" bis_skin_checked="1">
                                 Note: To ensure the authenticity of all reviews, we require users to upload an invoice or a relevant proof of service received from the listed company. <br><br>
                                 The invoice will NOT be displayed publicly and is only used for verification purposes.
                                 You may blur or hide the price or any sensitive information on the document before uploading. <br><br>
                                 We also encourage users to upload a photo of the service received, if possible
                              </div>
                              <div class="clear" bis_skin_checked="1"></div>
                              <div class="col-sm-12 text-end" bis_skin_checked="1">
                                 <button type="submit" class="btn btn-primary" >Submit <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M13 18l6 -6" /><path d="M13 6l6 6" /></svg> </button>
                              </div>
                           </form>
                        </div>

                      
                        <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;" bis_skin_checked="1">
                           <div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;" bis_skin_checked="1">
                              <div style="position: absolute; left: 0px; top: 0px; transition: all; width: 622px; height: 2585px;" bis_skin_checked="1"></div>
                           </div>
                           <div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;" bis_skin_checked="1">
                              <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%" bis_skin_checked="1"></div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="clear"></div> <br><br>
</div>
@endsection
@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll("#star-rating .star");
        const ratingInput = document.getElementById("rating-value");

        function updateStars(selectedRating) {
            stars.forEach((s, i) => {
                s.classList.remove("fa-star", "selected");
                s.classList.add("fa-star-o");
                if (i < selectedRating) {
                    s.classList.remove("fa-star-o");
                    s.classList.add("fa-star", "selected");
                }
            });
        }

        // On load, set stars based on input value
        const currentRating = parseInt(ratingInput.value || 0);
        if (currentRating > 0) updateStars(currentRating);

        // On click, update rating
        stars.forEach((star) => {
            star.addEventListener("click", function () {
                const selectedRating = parseInt(this.getAttribute("data-value"));
                ratingInput.value = selectedRating;
                updateStars(selectedRating);
            });
        });
    });
</script>


<script>
   // Auto-Hide Message
    document.addEventListener("DOMContentLoaded", function () {
        const message = document.getElementById('successMessage');
        if (message) {
            setTimeout(() => {
                message.style.transition = 'opacity 0.5s ease';
                message.style.opacity = '0';
                setTimeout(() => message.remove(), 500);
            }, 3000); // Hide after 3 seconds
        }
    });
</script>
@endsection

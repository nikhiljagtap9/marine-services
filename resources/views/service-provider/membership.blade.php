@extends('service-provider.main')

@section('content')
<div id="preloader" class="preloader">
   <div class='inner'>
      <div class='line1'></div>
      <div class='line2'></div>
      <div class='line3'></div>
   </div>
</div>
<div class="reviw_wrap" style="transform: none;" bis_skin_checked="1">
   <video class="reviw_wrap_inner" autoplay="" muted="" loop="">
      <source src="img/vi.mp4" type="video/mp4">
      <source src="img/vi.mp4" type="video/ogg">
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
                              <div class="platinm_titl">{{$selectedPlan->name}} Plan</div>
                              <div class="platinm_titl_sub">Experience the Power of Priority.</div>
                           </h4>
                           <div class="clear"></div>
                           <div class="clear" bis_skin_checked="1"></div>
                           <form class="row g-4" id="masterForm">
                              <div class="wrp_section">
                                 <!-- Contact Details -->
                                    <div class="singl_from_wrp">
                                       <div class="socl_med_links">
                                          Contact Details
                                       </div>
                                       <div class="clear"></div>
                                       <div class="col-sm-4" bis_skin_checked="1">
                                             <input type="hidden" name="plan_id" value="{{ $planId }}">
                                          <div class="" bis_skin_checked="1">
                                             <label class="required fw-medium mb-2">Alternative Email</label>
                                             <input type="text"
                                                value="{{ old('alternative_email', $contact->alternative_email ?? '') }}"
                                                name="alternative_email" class="form-control" placeholder="Enter Alternative Email">
                                          </div>
                                       </div>
                                       <div class="col-sm-4" bis_skin_checked="1">
                                          <div class="" bis_skin_checked="1">
                                             <label class="required fw-medium mb-2">Office Telephone Number</label>
                                             <input type="text"
                                                value="{{ old('office_telephone', $contact->office_telephone ?? '') }}"
                                                name="office_telephone" class="form-control" placeholder="Enter Office Telephone Number">
                                          </div>
                                       </div>
                                       <div class="col-sm-4" bis_skin_checked="1">
                                          <div class="" bis_skin_checked="1">
                                             <label class="required fw-medium mb-2">Mobile Number</label>
                                             <input type="text"
                                                value="{{old('mobile_number',$contact->mobile_number ?? '')}}"
                                                name="mobile_number" class="form-control" placeholder="Enter Mobile Number">
                                          </div>
                                       </div>
                                       <div class="col-sm-4" bis_skin_checked="1">
                                          <div class="" bis_skin_checked="1">
                                             <label class="required fw-medium mb-2">WhatsApp Number</label>
                                             <input type="text"
                                                value="{{old('whatsapp_number', $contact->whatsapp_number ?? '')}}"
                                                name="whatsapp_number" class="form-control" placeholder="Enter WhatsApp Number">
                                          </div>
                                       </div>
                                    </div>

                                 <div class="clear"></div>
                                 <!-- Social Media Details -->
                                 @if($selectedPlan->name != 'Basic')
                                 <div class="singl_from_wrp singl_from_socil">
                                    <div class="socl_med_links">
                                       Social Media Details
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-4" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">LinkedIn</label>
                                          <input type="text"
                                             value="{{old('linkedin', $social->linkedin ?? '')}}"
                                             name="linkedin" class="form-control" placeholder="Enter LinkedIn Link">
                                       </div>
                                    </div>
                                    <div class="col-sm-4" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">Instagram</label>
                                          <input type="text"
                                             value="{{old('instagram', $social->instagram ?? '')}}"
                                             name="instagram" class="form-control" placeholder="Enter Instagram">
                                       </div>
                                    </div>
                                    <div class="col-sm-4" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">X (Twitter)</label>
                                          <input type="text"
                                             value="{{old('twitter', $social->twitter ?? '')}}"
                                             name="twitter" class="form-control" placeholder="Enter X (Twitter)">
                                       </div>
                                    </div>
                                 </div>
                                 @endif

                                 <div class="clear"></div>
                                 <!-- Other Details / Ports and Services -->
                                 <div class="singl_from_wrp">
                                    <div class="socl_med_links">
                                       Other Details  
                                    </div>
                                    <div class="clear"></div>
                                    @php
                                       $hasEmergency = $contact->has_emergency_contact ?? 0;
                                    @endphp
                                    <div class="col-sm-4 col-sm-4_40per" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2 labl_doyuy">Do you have a 24/7<br> emergency contact number? </label>
                                          <div class="clear"></div>
                                          <div class="yes_no_inp">
                                             <label>
                                                <input type="radio" name="has_emergency_contact" 
                                                value="1" onclick="togglePhoneInput(true)" {{ $hasEmergency == 1 ? 'checked' : '' }} > Yes
                                             </label>
                                             <label>
                                                <input type="radio" name="has_emergency_contact" 
                                                value="0" onclick="togglePhoneInput(false)" {{ $hasEmergency == 0 ? 'checked' : '' }}> No
                                             </label>
                                          </div>
                                          <div  style="{{ $hasEmergency == 1 ? '' : 'display: none;' }}" id="emergency-phone">
                                             <label class="required fw-medium mb-2">Contact Number</label>
                                             <input type="text" class="form-control" name="emergency_contact_number"
                                                   value="{{ $contact->emergency_contact_number ?? '' }}" placeholder="Enter Contact Number">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="clear"></div>

                                    <div class="clear"></div>
                                    <div class="col-sm-4 ful_100_port">
                                       <div class="ful_100_port_titl">
                                          Service Port, Categories and Types
                                       </div>
                                       <div id="portServiceBlocksWrapper">
                                          @foreach($groupedServiceDetails as $blockKey => $serviceGroup)
                                             @php
                                                [$countryId, $portId] = explode('_', $blockKey);
                                                $filteredPorts = $ports->where('country_id', $countryId);
                                                $blockIndex = $loop->index;
                                                // If no data, show 2 empty service slots
                                                $serviceGroup = $serviceGroup ?: [null, null];
                                             @endphp
                                             <div class="port_sinl_vend" data-index="{{ $blockIndex }}">
                                                <div class="port_drop port_drop_wdth">
                                                   <label class="required fw-medium mb-2">Select Country</label>
                                                   <select class="form-control" name="country[{{ $blockIndex }}]">
                                                      <option value="">Select Country</option>
                                                      @foreach($countries as $country)
                                                      <option value="{{ $country->id }}" {{ $country->id == $countryId ? 'selected' : '' }}>
                                                         {{ $country->name }}
                                                      </option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                                <div class="catgry_50 catgry_50_right">
                                                   <label class="required fw-medium mb-2">Select Port 1</label>
                                                   <select class="form-control" name="port[{{ $blockIndex }}]">
                                                      <option value="">Select Port</option>
                                                      @foreach($filteredPorts as $port)
                                                      <option value="{{ $port->id }}" {{ $port->id == $portId ? 'selected' : '' }}>{{ $port->name }}</option>
                                                      @endforeach
                                                   </select>
                                                </div>
                                                <div class="clear"></div>

                                                   <!-- {{-- Service Category 1 --}}
                                                   <div class="catgry_50 service-block-item">
                                                      <label class="required fw-medium mb-2">Service Categories 1</label>
                                                      {{-- Hidden input for ID (will be set dynamically if editing existing data) --}}
                                                      <input type="hidden" name="port_service_detail_id[0][0]" value="{{ $existingIds[0][0] ?? '' }}">
                                                      <select class="form-control serviceSelect" name="service_category[0][0]">
                                                         <option value="">Select Service Category</option>
                                                         @foreach($categories as $category)
                                                         <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                         @endforeach
                                                      </select>
                                                      <div id="subServicesWrapper_0_0" class="subServicesWrapper service-block" style="display: none;">
                                                         <div id="subServicesContainer_0_0" class="subServicesContainer"></div>
                                                         <div class="clear"></div>
                                                         <div class="mt-3">
                                                            <label for="s1_note" class="form-label">Additional Information</label>
                                                            <div class="" bis_skin_checked="1">
                                                               <label class="required fw-medium mb-2">Additional Information</label>
                                                               <input type="text" name="additional_info[0][0]" class="form-control" placeholder="Enter Additional Information">
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>

                                                   {{-- Service Category 2 --}}
                                                   <div class="catgry_50 catgry_50_right service-block-item">
                                                      <label class="required fw-medium mb-2">Service Categories 2</label>
                                                      {{-- Hidden input for ID --}}
                                                      <input type="hidden" name="port_service_detail_id[0][1]" value="{{ $existingIds[0][1] ?? '' }}">
                                                      <select class="form-control serviceSelect" name="service_category[0][1]">
                                                         <option value="">Select Service Category</option>
                                                         @foreach($categories as $category)
                                                         <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                         @endforeach
                                                      </select>
                                                      <div id="subServicesWrapper_0_1" class="subServicesWrapper service-block" style="display: none;">
                                                         <div id="subServicesContainer_0_1" class="subServicesContainer"></div>
                                                         <div class="clear"></div>
                                                         <div class="mt-3">
                                                            <label for="s1_note" class="form-label">Additional Information</label>
                                                            <div class="" bis_skin_checked="1">
                                                               <label class="required fw-medium mb-2">Additional Information</label>
                                                               <input type="text" name="additional_info[0][1]" class="form-control" placeholder="Enter Additional Information">
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div> -->
                                                

                                                   @foreach($serviceGroup as $serviceIndex => $detail)
                                                   @php
                                                      $blockIndex = $loop->parent->index; // from outer foreach ($groupedServiceDetails)
                                                      $categoryId = $detail->category_id ?? '';
                                                     // $selectedSubs = $detail ? json_decode($detail->sub_services, true) : [];
                                                      $selectedSubs = [];

                                                      if ($detail && isset($detail->sub_services)) {
                                                            $selectedSubs = is_string($detail->sub_services)
                                                               ? json_decode($detail->sub_services, true)
                                                               : (is_array($detail->sub_services) ? $detail->sub_services : []);
                                                      }
                                                      $additionalInfo = $detail->additional_info ?? '';
                                                      $detailId = $detail->id ?? '';
                                                      $categorySubCategories = $subCategories->where('category_id', $categoryId);
                                                   @endphp

                                                   {{-- Service Category {{ $serviceIndex + 1 }} --}}
                                                   <div class="catgry_50 {{ $serviceIndex % 2 == 1 ? 'catgry_50_right' : '' }} service-block-item">
                                                      <label class="required fw-medium mb-2">Service Categories {{ $serviceIndex + 1 }}</label>

                                                      {{-- Hidden input for ID --}}
                                                      <input type="hidden" name="port_service_detail_id[{{ $blockIndex }}][{{ $serviceIndex }}]" value="{{ $detailId }}">

                                                      {{-- Service category dropdown --}}
                                                      <select class="form-control serviceSelect"
                                                               name="service_category[{{ $blockIndex }}][{{ $serviceIndex }}]">
                                                            <option value="">Select Service Category</option>
                                                            @foreach($categories as $category)
                                                               <option value="{{ $category->id }}"
                                                                  {{ $categoryId == $category->id ? 'selected' : '' }}>
                                                                  {{ $category->name }}
                                                               </option>
                                                            @endforeach
                                                      </select>
                                          
                                                      {{-- Sub Services Wrapper --}}
                                                      <div id="subServicesWrapper_{{ $blockIndex }}_{{ $serviceIndex }}"
                                                            class="subServicesWrapper service-block"
                                                            style="display: {{ count($selectedSubs) ? 'block' : 'none' }};">
                                                            
                                                            {{-- Sub services container --}}
                                                            <div id="subServicesContainer_{{ $blockIndex }}_{{ $serviceIndex }}" class="subServicesContainer">
                                                               @foreach($categorySubCategories as $sub)

                                                                        <div class="form-check">
                                                                           <input type="checkbox"
                                                                                 class="form-check-input"
                                                                                 id="subcat_{{ $blockIndex }}_{{ $serviceIndex }}_{{ $sub->id }}"
                                                                                 name="sub_services[{{ $blockIndex }}][{{ $serviceIndex }}][]"
                                                                                 value="{{ $sub->id }}"
                                                                                 {{ in_array($sub->id, $selectedSubs ?? []) ? 'checked' : '' }}>
                                                                           <label class="form-check-label" for="subcat_{{ $blockIndex }}_{{ $serviceIndex }}_{{ $sub->id }}">
                                                                              {{ $sub->name }}
                                                                           </label>
                                                                        </div>
                                                                  
                                                               @endforeach
                                                            </div>


                                                            <div class="clear"></div>

                                                            {{-- Additional Information --}}
                                                            <div class="mt-3">
                                                               <label class="form-label">Additional Information</label>
                                                               <div>
                                                                  <label class="required fw-medium mb-2">Additional Information</label>
                                                                  <input type="text"
                                                                           name="additional_info[{{ $blockIndex }}][{{ $serviceIndex }}]"
                                                                           class="form-control"
                                                                           placeholder="Enter Additional Information"
                                                                           value="{{ $additionalInfo }}">
                                                               </div>
                                                            </div>
                                                      </div>
                                                   </div>
                                                @endforeach

                                                {{-- If only one service category exists, show the second one empty --}}
                                                @if(count($serviceGroup) < 2 && $selectedPlan->allow_category > 1 )
                                                   @php $serviceIndex = 1; @endphp
                                                   <div class="catgry_50 catgry_50_right service-block-item">
                                                      <label class="required fw-medium mb-2">Service Categories 2</label>
                                                      <input type="hidden" name="port_service_detail_id[{{ $blockIndex }}][{{ $serviceIndex }}]" value="">
                                                      <select class="form-control serviceSelect"
                                                            name="service_category[{{ $blockIndex }}][{{ $serviceIndex }}]">
                                                         <option value="">Select Service Category</option>
                                                         @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                         @endforeach
                                                      </select>

                                                      <div id="subServicesWrapper_{{ $blockIndex }}_{{ $serviceIndex }}"
                                                         class="subServicesWrapper service-block"
                                                         style="display: none;">
                                                         <div id="subServicesContainer_{{ $blockIndex }}_{{ $serviceIndex }}" class="subServicesContainer">
                                                         
                                                         </div>
                                                         <div class="clear"></div>
                                                         <div class="mt-3">
                                                            <label class="form-label">Additional Information</label>
                                                            <div>
                                                                  <label class="required fw-medium mb-2">Additional Information</label>
                                                                  <input type="text"
                                                                        name="additional_info[{{ $blockIndex }}][{{ $serviceIndex }}]"
                                                                        class="form-control"
                                                                        placeholder="Enter Additional Information">
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                @endif 
                                             </div>
                                          @endforeach
                                       </div>
                                       @if($selectedPlan->allow_port > 1  )
                                          <button type="button" class="btn btn-primary mt-3" id="addMorePortService">+ Add More</button>
                                       @endif
                                    </div>

                                    <div class="clear"></div>
                                 </div>
                                 <div class="clear"></div>
                                 <!-- Company Details -->
                                 @if($selectedPlan->name != 'Basic')
                                 <div class="singl_from_wrp singl_from_socil_2">
                                    <div class="socl_med_links">
                                       Company Details
                                    </div>
                                    <div class="clear"></div>
                                    <div class="col-sm-4 cols_30" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">Company Slogan / Short Description</label>
                                          <textarea class="form-control"
                                             name="slogan" rows="3" placeholder="A brief tagline or a short description of your company">{{old('slogan', $company->slogan ?? '')}}</textarea>
                                       </div>
                                    </div>
                                    <div class="col-sm-4 cols_30" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">About Your Company</label>
                                          <textarea class="form-control"
                                             name="about" rows="3" placeholder="Please tell us about your company's history, experience, mission, and vision">{{old('about', $company->about ?? '')}}</textarea>
                                       </div>
                                    </div>
                                    <div class="col-sm-4 cols_30" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">Service Brands</label>
                                          <textarea class="form-control"
                                             name="brands" rows="3" placeholder="Please list the machinery types, brand names, or any specific equipment you supply or work with.">{{old('brands', $company->brands ?? '')}}</textarea>
                                       </div>
                                    </div>
                                    <div class="col-sm-4" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">Certificates</label>
                                          <input type="file" name="certificates[]" multiple class="form-control" placeholder="Enter Instagram">
                                       </div>
                                       @if(!empty($company->certificates))
                                       @php
                                       $certs = json_decode($company->certificates, true);
                                       @endphp
                                       <ul>
                                          @foreach($certs as $cert)
                                          <li>
                                             <a href="{{ asset('storage/' . $cert) }}" target="_blank">View Certificate</a>
                                          </li>
                                          @endforeach
                                       </ul>
                                       @endif

                                    </div>
                                    <div class="col-sm-4" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">Photos</label>
                                          <input type="file" name="photos[]" multiple class="form-control" placeholder="Enter X (Twitter)">
                                       </div>
                                       @if(!empty($company->photos))
                                       @php
                                       $photos = json_decode($company->photos, true);
                                       @endphp
                                       <div class="row">
                                          @foreach($photos as $photo)
                                          <div class="col-md-3">
                                             <img src="{{ asset('storage/' . $photo) }}" class="img-thumbnail mb-2" width="100" />
                                          </div>
                                          @endforeach
                                       </div>
                                       @endif
                                    </div>

                                    <div class="col-sm-4" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">Reference Shipowners </label>
                                          <textarea class="form-control" name="reference_shipowners" rows="3" placeholder="Enter Reference Shipowners"></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 @endif
                              </div>
                           <div id="responseMessage" class="alert d-none"></div>   
                           <div class="col-sm-12 text-end" bis_skin_checked="1">
                              <button type="submit" class="btn btn-primary submit_btn" fdprocessedid="43gnio">
                                 Submit
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l14 0"></path>
                                    <path d="M13 18l6 -6"></path>
                                    <path d="M13 6l6 6"></path>
                                 </svg>
                              </button>
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
                        <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;" bis_skin_checked="1">
                           <div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;" bis_skin_checked="1">
                              <div style="position: absolute; left: 0px; top: 0px; transition: all; width: 1195px; height: 728px;" bis_skin_checked="1"></div>
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
   <div class="clear" bis_skin_checked="1"></div>
   <br><br>
</div>
@endsection

@section('scripts')

<script>
   const slides = document.getElementById('slides');
   const slideCount = slides.children.length;
   let index = 0;

   function updateSlider() {
      slides.style.transform = 'translateX(' + (-index * 100) + '%)';
   }

   document.querySelector('.arrow.left').addEventListener('click', () => {
      index = (index - 1 + slideCount) % slideCount;
      updateSlider();
      resetAutoSlide();
   });

   document.querySelector('.arrow.right').addEventListener('click', () => {
      index = (index + 1) % slideCount;
      updateSlider();
      resetAutoSlide();
   });

   function autoSlide() {
      index = (index + 1) % slideCount;
      updateSlider();
   }

   let autoSlideInterval = setInterval(autoSlide, 3000);

   function resetAutoSlide() {
      clearInterval(autoSlideInterval);
      autoSlideInterval = setInterval(autoSlide, 3000);
   }
</script>
<script>
   function togglePhoneInput(show) {
      const phoneDiv = document.getElementById('emergency-phone');
      phoneDiv.style.display = show ? 'block' : 'none';
   }
</script>



<script>
   // new 
   //  Clone and Add Up to 7 Blocks
   let blockIndex = $('.port_sinl_vend').length;
   let maxBlocks = {{ $selectedPlan->allow_port }};

   $('#addMorePortService').click(function () {
      if (blockIndex >= maxBlocks) {
         alert('Maximum ' + maxBlocks + '  blocks allowed.');
         return;
      }

      // Clone the first block
      let firstBlock = $('#portServiceBlocksWrapper .port_sinl_vend:first');
      let newBlock = firstBlock.clone();
      
      // Reset selects and inputs
      newBlock.find('.error-text').remove(); // Remove error messages
      newBlock.attr('data-index', blockIndex);
      newBlock.find('input[type="text"]').val('');
      newBlock.find('select').val('');
      newBlock.find('.subServicesWrapper').hide();
      newBlock.find('.subServicesContainer').empty();

       // Update name attributes and track service index
      let serviceCategoryCount = 0;

      // Update select/input names and IDs
      newBlock.find('.serviceSelect').each(function (i) {
         // Update service category select name
         $(this).attr('name', `service_category[${blockIndex}][${i}]`);

         // Update wrapper & container IDs
         newBlock.find(`[id^="subServicesWrapper_"]`).eq(i).attr('id', `subServicesWrapper_${blockIndex}_${i}`);
         newBlock.find(`[id^="subServicesContainer_"]`).eq(i).attr('id', `subServicesContainer_${blockIndex}_${i}`);

         // Update additional_info field name
         newBlock.find('input[name^="additional_info"]').eq(i)
                 .attr('name', `additional_info[${blockIndex}][${i}]`);

         // Update existing hidden port_service_detail_id input
         newBlock.find('input[name^="port_service_detail_id"]').eq(i)
               .attr('name', `port_service_detail_id[${blockIndex}][${i}]`)
               .val(''); // clear the value        
         });

       // Update country and port select names
      newBlock.find('select').each(function () {
         let oldName = $(this).attr('name');
         if (oldName?.includes('country')) {
            $(this).attr('name', `country[${blockIndex}]`);
         } else if (oldName?.includes('port')) {
            $(this).attr('name', `port[${blockIndex}]`);
         }
      });

      $('#portServiceBlocksWrapper').append(newBlock);
      blockIndex++;
   });

   // new 
   // AJAX Sub-services Loader dynamically
   $(document).on('change', '.serviceSelect', function () {
      let select = $(this);
      let block = select.closest('.port_sinl_vend');
      let blockIndex = block.data('index'); // outer block (0 to 6)
      let serviceIndex = block.find('.serviceSelect').index(select); // inner index (0 or 1 for Service Categories)

      let serviceId = select.val();
      let wrapperId = `#subServicesWrapper_${blockIndex}_${serviceIndex}`;
      let containerId = `#subServicesContainer_${blockIndex}_${serviceIndex}`;

      if (serviceId) {
         $.ajax({
            url: '/get-sub-service/' + serviceId,
            method: 'GET',
            success: function (res) {
               $(containerId).html('');
               if (res.length > 0) {
                  res.forEach(sub => {
                     $(containerId).append(`
                        <div class="form-check">
                           <input type="checkbox" name="sub_services[${blockIndex}][${serviceIndex}][]" class="form-check-input" value="${sub.id}">
                           <label class="form-check-label">${sub.name}</label>
                        </div>
                     `);
                  });
                  $(wrapperId).show();
               } else {
                  $(wrapperId).hide();
               }
            }
         });
      } else {
         $(wrapperId).hide();
         $(containerId).html('');
      }
   });


   // get port
   // Trigger on country change
    $(document).on('change', 'select[name^="country"]', function () {
        let $this = $(this);
        let countryId = $this.val();
        let blockIndex = $this.closest('.port_sinl_vend').data('index');
        let portSelect = $('select[name="port[' + blockIndex + ']"]');

        if (countryId) {
            $.ajax({
                url: '/get-ports/' + countryId,
                type: 'GET',
                data: { country_id: countryId },
                success: function (response) {
                    portSelect.empty().append('<option value="">Select Port</option>');
                    $.each(response, function (key, port) {
                        portSelect.append('<option value="' + port.id + '">' + port.name + '</option>');
                    });
                },
                error: function () {
                    alert('Unable to fetch ports. Please try again.');
                }
            });
        } else {
            portSelect.empty().append('<option value="">Select Port</option>');
        }
    });

</script>


<script>
 //  Handle Master Form Submission With AJAX
 

 

   function autoSave(sectionId, sectionName) {
      let form = $('#' + sectionId)[0]; // plain DOM element
      let formData = new FormData(form);

      $.ajax({
         url: `/service-provider-autosave/${sectionName}`,
         method: 'POST',
         data: formData,
         processData: false,
         contentType: false,
         headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
         },
         success: function(response) {
            // console.log(sectionId + " auto-saved.");
            $('#' + sectionId + ' .error-text').remove(); // clear old errors
         },
         error: function(xhr) {
            // console.error("Error auto-saving " + sectionId, xhr.responseText);
            let errors = xhr.responseJSON?.errors;

            // Clear previous errors
            $('#' + sectionId + ' .error-text').remove();

            if (errors) {
               Object.keys(errors).forEach(function(key) {
                  let input = $(`#${sectionId} [name="${key}"]`);
                  // Special case for array fields like photos[]
                  if (key.includes('.')) {
                     key = key.split('.')[0]; // get the base name
                  }
                  input = $(`#${sectionId} [name="${key}[]"], #${sectionId} [name="${key}"]`);
                  input.after(`<div class="error-text text-danger">${errors[key][0]}</div>`);
               });
            }
         }
      });
   }

   // Attach auto-save to each field with debounce
   $(document).ready(function() {
       
      $('#masterForm').on('submit', function(e) {
         e.preventDefault();

         // Clear previous errors
         $('.error-text').remove();
         
         let formData = new FormData(this);

         $.ajax({
            url: '{{ route("service-provider.membershipForm") }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
               $('#responseMessage')
                .removeClass('d-none alert-danger')
                .addClass('alert-success')
                .text('Data saved successfully!');
              // window.location.href = "{{ route('service-provider.index') }}";
            },
           error: function(xhr) {
               let errors = xhr.responseJSON?.errors;

               if (errors) {
                  Object.keys(errors).forEach(function(key) {
                        let nameSelector = key;

                        // Convert dot notation to bracket notation (e.g., service_category.0.0 => service_category[0][0])
                        nameSelector = key.replace(/\.(\d+)/g, '[$1]');

                        // Match input with bracket notation name
                        let input = $(`[name="${nameSelector}"]`);

                        if (input.length) {
                           //input.last().after(`<div class="error-text text-danger">${errors[key][0]}</div>`);
                            input.last().after(`<div class="error-text text-danger">${errors[key]}</div>`);
                        } else {
                           // If field not found, fallback to alert or console
                           console.warn(`Field not found for: ${key}`);
                        }
                  });
                   $('#responseMessage')
                    .removeClass('d-none alert-success')
                    .addClass('alert-danger')
                    .text('Please correct the highlighted errors.');
               } else {
                    $('#responseMessage')
                    .removeClass('d-none alert-success')
                    .addClass('alert-danger')
                    .text('Something went wrong. Please try again.');
               }

           

            }
         });
      });
   //   let autoSaveTimer;
   //    $('#masterForm input, #masterForm textarea, #masterForm select').on('change', function () {
   //       clearTimeout(autoSaveTimer);
   //       autoSaveTimer = setTimeout(() => {
   //          autoSave();
   //       }, 1500); // Save after 1.5 seconds
   //    });
   });
</script>

@endsection
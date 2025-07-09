@extends('service-provider.main')

@section('content')
<style>
   .mak_pmnt{
width: 400px;
background-color:#ececec;
margin-bottom: 40px;
border-radius: 20px;
padding: 10px 30px;
}
.com_mn{
width: 100%;
text-align:center !important;
}
.submit_btn.submit_btn_membr{
float: none;
background-color:#124f98;
border-radius: 100px;
}
.btn_pop1, .btn_pop2{
float: left;
width: 50%;
margin: 0px !important;
border-radius: 0px !important;
}
.btn.btn_pop2{
background-color:#497c97;
}
.modal-footer{
float: left;
width: 70%;
padding: 0px !important;
border-radius: 100px;
overflow: hidden;
margin-left: 15%;
}
.modal-header, .modal-footer{
border:0px;
}
.modal-footer .btn.btn-primary{
background-color:#305b72;
}
.modal {
display: none;
position: fixed;
z-index: 1000;
left: 0;
top: 0;
width: 100%;
height: 100%;
background-color: rgba(0,0,0,0.5);
animation: fadeIn 0.3s;
}
.modal-content {
background-color: #fff;
margin: 10% auto;
margin-top: 4%;
padding: 20px;
border-radius: 8px;
width: 90%;
max-width: 700px;
box-shadow: 0 5px 15px rgba(0,0,0,0.3);
transform: translateY(-50px);
opacity: 0;
animation: slideUp 0.4s forwards;
}
@keyframes fadeIn {
from { opacity: 0; }
to { opacity: 1; }
}
@keyframes slideUp {
to {
transform: translateY(0);
opacity: 1;
}
}
.modal-header {
font-size: 20px;
font-weight: bold;
margin-bottom: 15px;
}
.modal-footer {
margin-top: 00px;
margin-bottom: 30px;
}
.submit_btn_membr {
padding: 10px 20px;
margin: 5px;
border: none;
cursor: pointer;
border-radius: 5px;
}
.btn-primary {
background-color: #007BFF;
color: white;
}
.btn-secondary {
background-color: #28a745;
color: white;
}
.bank-details {
display: none;
margin-top: 20px;
font-size: 16px;
line-height: 28px;
background: #f9f9f9;
padding: 30px;
border-radius: 6px;
}
.close {
float: right;
font-size: 20px;
font-weight: bold;
cursor: pointer;
}
</style>
<div id="preloader" class="preloader">
   <div class='inner'>
      <div class='line1'></div>
      <div class='line2'></div>
      <div class='line3'></div>
   </div>
</div>
<div class="reviw_wrap" style="transform: none;" bis_skin_checked="1">
   <video class="reviw_wrap_inner" autoplay="" muted="" loop="">
      <source src="{{ asset('service-provider/assets/img/vi.mp4')}}" type="video/mp4">
      <source src="{{ asset('service-provider/assets/img/vi.mp4')}}" type="video/ogg">
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
                                          <div id="portServiceError" class="text-danger mt-2"></div>
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
                                    <div class="col-sm-4 cols_30 mb-4" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">Company Slogan / Short Description</label>
                                          <textarea class="form-control"
                                             name="slogan" rows="3" placeholder="A brief tagline or a short description of your company">{{old('slogan', $company->slogan ?? '')}}</textarea>
                                       </div>
                                    </div>
                                    <div class="col-sm-4 cols_30 mb-4" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">About Your Company</label>
                                          <textarea class="form-control"
                                             name="about" rows="3" placeholder="Please tell us about your company's history, experience, mission, and vision">{{old('about', $company->about ?? '')}}</textarea>
                                       </div>
                                    </div>
                                    <div class="col-sm-4 cols_30 mb-4" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">Service Brands</label>
                                          <textarea class="form-control"
                                             name="brands" rows="3" placeholder="Please list the machinery types, brand names, or any specific equipment you supply or work with.">{{old('brands', $company->brands ?? '')}}</textarea>
                                       </div>
                                    </div>
                                    <div class="col-sm-4 cols_30 mb-4" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">Certificates</label>
                                          <input type="file" name="certificates[]" multiple class="form-control" id="certificate-upload" accept=".jpg,.jpeg,.png">
                                          <small class="text-muted">Max 20 photos (jpeg, png, jpg, max size 1MB each)</small>
                                       </div>
                                       <div class="row" id="certificate-preview">
                                          @if(!empty($company->certificates))
                                          @php
                                          $certs = json_decode($company->certificates, true);
                                          @endphp
                                             @foreach($certs as $key => $cert)
                                             <div class="col-md-3 position-relative mb-2 existing-cert" id="cert-{{ $key }}">
                                                         <img src="{{ asset('storage/' . $cert) }}" class="img-thumbnail mb-2"/>
                                                         {{-- Optional Remove Button --}}
                                                         <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-db-cert"
                                                            data-key="{{ $key }}" data-path="{{ $cert }}">&times;</button>
                                                         <input type="hidden" name="existing_cert[]" value="{{ $cert }}">
                                                      </div>
                                             @endforeach
                                          @endif
                                       </div>

                                    </div>
                                    <div class="col-sm-4 cols_30 mb-4" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">Photos</label>
                                          <input type="file" name="photos[]" multiple class="form-control" id="photo-upload" accept=".jpg,.jpeg,.png">
                                          <small class="text-muted">Min 3 & max 20 photos (jpeg, png, jpg, max size 1MB each)</small>
                                       </div>
                                       <!-- @if(!empty($company->photos))
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
                                       @endif -->


                                       <div class="row" id="photo-preview">
                                          @if(!empty($company->photos))
                                                @php
                                                   $photos = json_decode($company->photos, true);
                                                @endphp
                                                @foreach($photos as $key => $photo)
                                                   <div class="col-md-3 position-relative mb-2 existing-photo" id="photo-{{ $key }}">
                                                      <img src="{{ asset('storage/' . $photo) }}" class="img-thumbnail mb-2 " width="100" />
                                                      {{-- Optional Remove Button --}}
                                                      <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-db-photo"
                                                         data-key="{{ $key }}" data-path="{{ $photo }}">&times;</button>
                                                      <input type="hidden" name="existing_photos[]" value="{{ $photo }}">
                                                   </div>
                                                @endforeach
                                          @endif
                                       </div>
                                    </div>

                                    <div class="col-sm-4 cols_30 mb-4" bis_skin_checked="1">
                                       <div class="" bis_skin_checked="1">
                                          <label class="required fw-medium mb-2">Reference Shipowners </label>
                                          <textarea class="form-control" name="reference_shipowners" rows="3" placeholder="Enter Reference Shipowners"></textarea>
                                       </div>
                                    </div>
                                 </div>
                                 @endif
                              </div>
                           <div id="responseMessage" class="alert d-none"></div> 
                           @if($showPaymentButton)  
                              <div class="col-sm-12 text-end" bis_skin_checked="1">
                                 <div class="col-sm-12 text-end com_mn" bis_skin_checked="1" id="make_payment">
                                    <img src="{{ asset('service-provider/assets/img/payment.png')}}" class="mak_pmnt" >
                                    <div class="clear"></div>
                                    <!-- <a onclick="showModal()" class="btn btn-primary submit_btn submit_btn_membr" >
                                       Make Payment  
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                          <path d="M5 12l14 0"></path>
                                          <path d="M13 18l6 -6"></path>
                                          <path d="M13 6l6 6"></path>
                                       </svg>
                                    </a> -->
                                    
                                       <button type="submit" class="btn btn-primary submit_btn" id="submitBtn">
                                       <span id="submitText">Make Payment </span>
                                       <span id="submitLoader" class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                          <path d="M5 12l14 0"></path>
                                          <path d="M13 18l6 -6"></path>
                                          <path d="M13 6l6 6"></path>
                                       </svg>
                                       </button>
                                    
                                 </div>
                                 
                              </div>
                           @endif
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

 <!-- Modal -->
      <div id="paymentModal" class="modal">
         <div class="modal-content">
            <div class="modal-header">Choose Payment Method
               <span class="close" onclick="closeModal()">&times;</span>
            </div>
            <div class="modal-footer">
               <button class="btn btn-primary btn_pop1" onclick="showBankDetails()">Pay via Bank Transfer</button>
               <form action="{{ route('iyzico.pay') }}" method="POST">
                  @csrf
                  <input type="hidden" name="product_name" value="{{$selectedPlan->name}}">
                  <input type="hidden" name="amount" value="{{$selectedPlan->price}}">
                  <input type="hidden" name="category" value="Membership">
                  <input type="hidden" name="plan_id" value="{{ $planId }}">
                  <button type="submit" class="btn btn-secondary btn_pop2">Pay Online</button>
               </form>

               <!-- <a href="{{ route('iyzico.pay') }}" class="btn btn-secondary btn_pop2">Pay Online</a> -->
            </div>
            <div class="bank-details" id="bankDetails">
               <strong>BANK NAME:</strong> {{ config('bank.name') }}<br>
               <strong>BRANCH NAME AND CODE:</strong> {{ config('bank.branch') }}<br>
               <strong>BENEFICIARY:</strong> {{ config('bank.beneficiary') }}<br>
               <strong>ACCOUNT NO:</strong> {{ config('bank.account') }}<br>
               <strong>IBAN:</strong> {{ config('bank.iban') }}<br>
               <strong>SWIFT CODE:</strong> {{ config('bank.swift') }}
            </div>
         </div>
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
         $('#portServiceError').text('Maximum of ' + maxBlocks + ' blocks are allowed.');
         return;
      }

      // Clear any previous error message
      $('#portServiceError').text('');

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

         // Show loader
         $('#submitBtn').prop('disabled', true);
         $('#submitText').text('Submitting...');
         $('#submitLoader').removeClass('d-none');

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
                .text('Form validated. Redirecting to payment...');
               
               // Reload page after 2 seconds
                  setTimeout(function() {
                     // Show payment popup/modal
                     showModal();
                    // window.location.href = "{{ route('service-provider.confirmTemp') }}";
                  }, 2000);
            },
           error: function(xhr) {
               let errors = xhr.responseJSON?.errors;

               if (errors) {
                  Object.keys(errors).forEach(function(key) {
                        let nameSelector = key;

                        // Convert dot notation to bracket notation (e.g., service_category.0.0 => service_category[0][0])
                        nameSelector = key.replace(/\.(\d+)/g, '[$1]');

                        // Special case for photos.* errors: target input[name="photos[]"]
                        if (key.startsWith('photos')) {
                           // file input with name photos[]
                           let input = $(`[name="photos[]"]`);
                           if (input.length) {
                              input.last().after(`<div class="error-text text-danger">${errors[key][0] || errors[key]}</div>`);
                           }
                        } else {

                           // Match input with bracket notation name
                           let input = $(`[name="${nameSelector}"]`);

                           if (input.length) {
                              //input.last().after(`<div class="error-text text-danger">${errors[key][0]}</div>`);
                              input.last().after(`<div class="error-text text-danger">${errors[key]}</div>`);
                           } else {
                              // If field not found, fallback to alert or console
                              console.warn(`Field not found for: ${key}`);
                           }
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

           

            },
            complete: function() {
                 // Hide loader and re-enable button
                 $('#submitBtn').prop('disabled', false);
                 $('#submitText').text('Make Payment');
                 $('#submitLoader').addClass('d-none');
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

<script>
    // multiple upload photo, preview,removed
    let selectedFiles = [];
   
    $('#photo-upload').on('change', function (e) {
        const newFiles = Array.from(e.target.files);
        const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

        newFiles.forEach((file) => {
            // if (!allowedTypes.includes(file.type)) {
            //     alert(file.name + " is not a valid image.");
            //     return;
            // }
            // if (file.size > 1024 * 1024) {
            //     alert(file.name + " exceeds 1MB.");
            //     return;
            // }

            // if ((selectedFiles.length + $('.existing-photo').length) >= 20) {
            //    <div class="error-text text-danger">You can upload a maximum of 20 photos</div>
            //     return;
            // }

            selectedFiles.push(file);
            const reader = new FileReader();
            reader.onload = function (e) {
                const index = selectedFiles.length - 1;
                const previewHtml = `
                    <div class="col-md-3 position-relative mb-2 new-photo" data-index="${index}">
                        <img src="${e.target.result}" class="img-thumbnail">
                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-photo">&times;</button>
                    </div>
                `;
                $('#photo-preview').append(previewHtml);
            };
            reader.readAsDataURL(file);
        });

        updateFileInput();
    });

    // Remove new photo
    $(document).on('click', '.remove-photo', function () {
        const index = $(this).parent().data('index');
        selectedFiles.splice(index, 1);
        $(this).parent().remove();
        rebuildNewPreviews();
        updateFileInput();
    });

    // Remove existing photo
    $(document).on('click', '.remove-db-photo', function () {
        const key = $(this).data('key');
        $(this).parent().remove();
    });

    function updateFileInput() {
        const input = document.getElementById('photo-upload');
        const dt = new DataTransfer();
        selectedFiles.forEach(file => dt.items.add(file));
        input.files = dt.files;
    }

    function rebuildNewPreviews() {
        $('.new-photo').remove();
        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const html = `
                    <div class="col-md-3 position-relative mb-2 new-photo" data-index="${index}">
                        <img src="${e.target.result}" class="img-thumbnail">
                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-photo">&times;</button>
                    </div>
                `;
                $('#photo-preview').append(html);
            };
            reader.readAsDataURL(file);
        });
    }
</script>

<script>
    // multiple upload certificate, preview,removed
let selectedCerts = [];

$('#certificate-upload').on('change', function (e) {
    const newFiles = Array.from(e.target.files);
    const allowedTypes = [
        'image/jpeg', 'image/png', 'image/jpg',
        'application/pdf', 'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
    ];

    newFiles.forEach((file) => {
      //   if (!allowedTypes.includes(file.type)) {
      //       alert(file.name + " is not a valid file.");
      //       return;
      //   }

      //   if (file.size > 1024 * 1024) {
      //       alert(file.name + " exceeds 1MB.");
      //       return;
      //   }

      //   if ((selectedCerts.length + $('.existing-cert').length) >= 20) {
      //       alert("You can upload a maximum of 20 certificates.");
      //       return;
      //   }

        selectedCerts.push(file);
        const index = selectedCerts.length - 1;

        const reader = new FileReader();
        reader.onload = function (e) {
            let previewHtml = '';
            if (file.type.startsWith('image/')) {
                previewHtml = `
                    <div class="col-md-3 position-relative mb-2 new-cert" data-index="${index}">
                        <img src="${e.target.result}" class="img-thumbnail">
                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-cert">&times;</button>
                    </div>
                `;
            } else {
                previewHtml = `
                    <div class="col-md-3 position-relative mb-2 new-cert" data-index="${index}">
                        <div class="border p-2">${file.name}</div>
                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-cert">&times;</button>
                    </div>
                `;
            }

            $('#certificate-preview').append(previewHtml);
        };
        reader.readAsDataURL(file);
    });

    updateCertInput();
});

// Remove new cert
$(document).on('click', '.remove-cert', function () {
    const index = $(this).parent().data('index');
    selectedCerts.splice(index, 1);
    $(this).parent().remove();
    rebuildNewCerts();
    updateCertInput();
});

// Remove existing cert
$(document).on('click', '.remove-db-cert', function () {
    $(this).closest('.existing-cert').remove();
});

function updateCertInput() {
    const input = document.getElementById('certificate-upload');
    const dt = new DataTransfer();
    selectedCerts.forEach(file => dt.items.add(file));
    input.files = dt.files;
}

function rebuildNewCerts() {
    $('.new-cert').remove();
    selectedCerts.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function (e) {
            let html = '';
            if (file.type.startsWith('image/')) {
                html = `
                    <div class="col-md-3 position-relative mb-2 new-cert" data-index="${index}">
                        <img src="${e.target.result}" class="img-thumbnail">
                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-cert">&times;</button>
                    </div>
                `;
            } else {
                html = `
                    <div class="col-md-3 position-relative mb-2 new-cert" data-index="${index}">
                        <div class="border p-2">${file.name}</div>
                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 remove-cert">&times;</button>
                    </div>
                `;
            }
            $('#certificate-preview').append(html);
        };
        reader.readAsDataURL(file);
    });
}
</script>

<script>
   function showModal() {
      const modal = document.getElementById('paymentModal');
      modal.style.display = 'block';
      
      // Force reflow to restart animation
      void modal.offsetWidth;
   }
   
   function closeModal() {
      const modal = document.getElementById('paymentModal');
      modal.style.display = 'none';
      document.getElementById('bankDetails').style.display = 'none';
   }
   
   function showBankDetails() {
      document.getElementById('bankDetails').style.display = 'block';
   }
</script>



@endsection
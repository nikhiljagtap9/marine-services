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
                                    <div class="platinm_titl">Platinum Plan</div>
                                    <div class="platinm_titl_sub">Experience the Power of Priority.</div>
                                 </h4>
                                 <div class="clear"></div>
                                 <div class="clear" bis_skin_checked="1"></div>
                                 <!-- <form class="row g-4"> -->
                                    <div class="wrp_section">
                                       <form id="contactDetailsForm">
                                          <div class="singl_from_wrp">
                                             <div class="socl_med_links">
                                                Contact Details
                                             </div>
                                             <div class="clear"></div>
                                             <div class="col-sm-4" bis_skin_checked="1">
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
                                       </form>
                                       <div class="clear"></div>
                                       <form id="socialMediaForm">
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
                                       </form>
                                       <div class="clear"></div>
                                       <form id="sdssdds">
                                          <div class="singl_from_wrp">
                                             <div class="socl_med_links">
                                                Other Details
                                             </div>
                                             <div class="clear"></div>
                                             <div class="col-sm-4 col-sm-4_40per" bis_skin_checked="1">
                                                <div class="" bis_skin_checked="1">
                                                   <label class="required fw-medium mb-2 labl_doyuy">Do you have a 24/7<br> emergency contact number? </label>
                                                   <div class="clear"></div>
                                                   <div class="yes_no_inp">
                                                      <label>
                                                      <input type="radio" name="emergency_contact" value="yes" onclick="togglePhoneInput(true)"> Yes
                                                      </label>
                                                      <label>
                                                      <input type="radio" name="emergency_contact" value="no" onclick="togglePhoneInput(false)"> No
                                                      </label>
                                                   </div>
                                                   <div id="emergency-phone"> 
                                                      <label class="required fw-medium mb-2">Contact Number</label>
                                                      <input type="text" class="form-control" placeholder="Enter Contact Number">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="clear"></div>
                                             
                                             <div class="clear"></div>
                                             <div class="col-sm-4 ful_100_port">
                                                <div class="ful_100_port_titl">
                                                   Service Port, Categories and Types  
                                                </div>
                                                <div class="port_sinl_vend">

                                                   <div class="port_drop port_drop_wdth">
                                                      <label class="required fw-medium mb-2">Select Country</label>
                                                      <select class="form-control">
                                                         <option>Select Country </option>
                                                         <option>Country ABC </option>
                                                         <option>Country Lorem </option>
                                                         <option>Country Lorem </option>
                                                      </select>
                                                   </div>


                                                   <div class="catgry_50 catgry_50_right">
                                                      <label class="required fw-medium mb-2">Select Port 1</label>
                                                      <select class="form-control">
                                                         <option>Select Port </option>
                                                         <option>Port ABC </option>
                                                         <option>Port Lorem </option>
                                                         <option>Port Lorem </option>
                                                      </select>
                                                   </div>
                                                   <div class="clear"></div>
                                                   <div class="catgry_50">
                                                      <label class="required fw-medium mb-2">Service Categories 1</label>
                                                      <select class="form-control" id="serviceSelect">
                                                         <option value="">Select Service Category</option>
                                                         <option value="service1">Service 1</option>
                                                         <option value="service2">Service 2</option>
                                                         <option value="service3">Service 3</option>
                                                      </select>
                                                      <!-- Service 1 -->
                                                      <div id="service1" class="service-block" style="display: none;">
                                                         <div class="sub-services">
                                                            <!-- 10 Checkboxes -->
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_1"><label for="s1_1" class="form-check-label">Sub Service 1</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_2"><label for="s1_2" class="form-check-label">Sub Service 2</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_3"><label for="s1_3" class="form-check-label">Sub Service 3</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_4"><label for="s1_4" class="form-check-label">Sub Service 4</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_5"><label for="s1_5" class="form-check-label">Sub Service 5</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_6"><label for="s1_6" class="form-check-label">Sub Service 6</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_7"><label for="s1_7" class="form-check-label">Sub Service 7</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_8"><label for="s1_8" class="form-check-label">Sub Service 8</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_9"><label for="s1_9" class="form-check-label">Sub Service 9</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_10"><label for="s1_10" class="form-check-label">Sub Service 10</label></div>
                                                         </div>
                                                         <div class="clear"></div>
                                                         <div class="mt-3">
                                                            <label for="s1_note" class="form-label">Additional Information</label>
                                                            <div class="" bis_skin_checked="1">
                                                               <label class="required fw-medium mb-2">Additional Information</label>
                                                               <input type="text" class="form-control" placeholder="Enter Additional Information">
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="catgry_50 catgry_50_right">
                                                      <label class="required fw-medium mb-2">Service Categories 2</label>
                                                      <select class="form-control" id="serviceSelect">
                                                         <option value="">Select Service Category</option>
                                                         <option value="service1">Service 1</option>
                                                         <option value="service2">Service 2</option>
                                                         <option value="service3">Service 3</option>
                                                      </select>
                                                      <!-- Service 1 -->
                                                      <div id="service1" class="service-block" style="display: none;">
                                                         <div class="sub-services">
                                                            <!-- 10 Checkboxes -->
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_1"><label for="s1_1" class="form-check-label">Sub Service 1</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_2"><label for="s1_2" class="form-check-label">Sub Service 2</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_3"><label for="s1_3" class="form-check-label">Sub Service 3</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_4"><label for="s1_4" class="form-check-label">Sub Service 4</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_5"><label for="s1_5" class="form-check-label">Sub Service 5</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_6"><label for="s1_6" class="form-check-label">Sub Service 6</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_7"><label for="s1_7" class="form-check-label">Sub Service 7</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_8"><label for="s1_8" class="form-check-label">Sub Service 8</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_9"><label for="s1_9" class="form-check-label">Sub Service 9</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_10"><label for="s1_10" class="form-check-label">Sub Service 10</label></div>
                                                         </div>
                                                         <div class="clear"></div>
                                                         <div class="mt-3">
                                                            <label for="s1_note" class="form-label">Additional Information</label>
                                                            <div class="" bis_skin_checked="1">
                                                               <label class="required fw-medium mb-2">Additional Information</label>
                                                               <input type="text" class="form-control" placeholder="Enter Additional Information">
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>


                                                <div class="port_sinl_vend">

                                                   <div class="port_drop port_drop_wdth">
                                                      <label class="required fw-medium mb-2">Select Country</label>
                                                      <select class="form-control">
                                                         <option>Select Country </option>
                                                         <option>Country ABC </option>
                                                         <option>Country Lorem </option>
                                                         <option>Country Lorem </option>
                                                      </select>
                                                   </div>


                                                   <div class="catgry_50 catgry_50_right">
                                                      <label class="required fw-medium mb-2">Select Port 2</label>
                                                      <select class="form-control">
                                                         <option>Select Port </option>
                                                         <option>Port ABC </option>
                                                         <option>Port Lorem </option>
                                                         <option>Port Lorem </option>
                                                      </select>
                                                   </div>
                                                   <div class="clear"></div>
                                                   <div class="catgry_50">
                                                      <label class="required fw-medium mb-2">Service Categories 1</label>
                                                      <select class="form-control" id="serviceSelect">
                                                         <option value="">Select Service Category</option>
                                                         <option value="service1">Service 1</option>
                                                         <option value="service2">Service 2</option>
                                                         <option value="service3">Service 3</option>
                                                      </select>
                                                      <!-- Service 1 -->
                                                      <div id="service1" class="service-block" style="display: none;">
                                                         <div class="sub-services">
                                                            <!-- 10 Checkboxes -->
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_1"><label for="s1_1" class="form-check-label">Sub Service 1</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_2"><label for="s1_2" class="form-check-label">Sub Service 2</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_3"><label for="s1_3" class="form-check-label">Sub Service 3</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_4"><label for="s1_4" class="form-check-label">Sub Service 4</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_5"><label for="s1_5" class="form-check-label">Sub Service 5</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_6"><label for="s1_6" class="form-check-label">Sub Service 6</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_7"><label for="s1_7" class="form-check-label">Sub Service 7</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_8"><label for="s1_8" class="form-check-label">Sub Service 8</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_9"><label for="s1_9" class="form-check-label">Sub Service 9</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_10"><label for="s1_10" class="form-check-label">Sub Service 10</label></div>
                                                         </div>
                                                         <div class="clear"></div>
                                                         <div class="mt-3">
                                                            <label for="s1_note" class="form-label">Additional Information</label>
                                                            <div class="" bis_skin_checked="1">
                                                               <label class="required fw-medium mb-2">Additional Information</label>
                                                               <input type="text" class="form-control" placeholder="Enter Additional Information">
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="catgry_50 catgry_50_right">
                                                      <label class="required fw-medium mb-2">Service Categories 2</label>
                                                      <select class="form-control" id="serviceSelect">
                                                         <option value="">Select Service Category</option>
                                                         <option value="service1">Service 1</option>
                                                         <option value="service2">Service 2</option>
                                                         <option value="service3">Service 3</option>
                                                      </select>
                                                      <!-- Service 1 -->
                                                      <div id="service1" class="service-block" style="display: none;">
                                                         <div class="sub-services">
                                                            <!-- 10 Checkboxes -->
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_1"><label for="s1_1" class="form-check-label">Sub Service 1</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_2"><label for="s1_2" class="form-check-label">Sub Service 2</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_3"><label for="s1_3" class="form-check-label">Sub Service 3</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_4"><label for="s1_4" class="form-check-label">Sub Service 4</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_5"><label for="s1_5" class="form-check-label">Sub Service 5</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_6"><label for="s1_6" class="form-check-label">Sub Service 6</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_7"><label for="s1_7" class="form-check-label">Sub Service 7</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_8"><label for="s1_8" class="form-check-label">Sub Service 8</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_9"><label for="s1_9" class="form-check-label">Sub Service 9</label></div>
                                                            <div class="form-check"><input type="checkbox" class="form-check-input" id="s1_10"><label for="s1_10" class="form-check-label">Sub Service 10</label></div>
                                                         </div>
                                                         <div class="clear"></div>
                                                         <div class="mt-3">
                                                            <label for="s1_note" class="form-label">Additional Information</label>
                                                            <div class="" bis_skin_checked="1">
                                                               <label class="required fw-medium mb-2">Additional Information</label>
                                                               <input type="text" class="form-control" placeholder="Enter Additional Information">
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                
                                             </div>
                                             
                                             <div class="clear"></div>
                                          </div>
                                       </form>
                                       <div class="clear"></div>
                                       <form id="companyDetailsForm">
                                          <div class="singl_from_wrp singl_from_socil_2">
                                             <div class="socl_med_links">
                                                Company Details
                                             </div>
                                             <div class="clear"></div>
                                             <div class="col-sm-4 cols_30" bis_skin_checked="1">
                                                <div class="" bis_skin_checked="1">
                                                   <label class="required fw-medium mb-2">Company Slogan / Short Description</label>
                                                   <textarea class="form-control" 
                                                   name="slogan" rows="3" placeholder="A brief tagline or a short description of your company" >
                                                   {{old('slogan', $company->slogan ?? '')}}</textarea>
                                                </div>
                                             </div>
                                             <div class="col-sm-4 cols_30" bis_skin_checked="1">
                                                <div class="" bis_skin_checked="1">
                                                   <label class="required fw-medium mb-2">About Your Company</label>
                                                   <textarea class="form-control" 
                                                   name="about" rows="3" placeholder="Please tell us about your company’s history, experience, mission, and vision" >
                                                   {{old('about', $company->about ?? '')}}
                                                   </textarea>
                                                </div>
                                             </div>
                                             <div class="col-sm-4 cols_30" bis_skin_checked="1">
                                                <div class="" bis_skin_checked="1">
                                                   <label class="required fw-medium mb-2">Service Brands</label>
                                                   <textarea class="form-control" 
                                                   name="brands" rows="3" placeholder="Please list the machinery types, brand names, or any specific equipment you supply or work with." >
                                                   {{old('brands', $company->brands ?? '')}}
                                                </textarea>
                                                </div>
                                             </div>
                                             <div class="col-sm-4" bis_skin_checked="1">
                                                <div class="" bis_skin_checked="1">
                                                   <label class="required fw-medium mb-2">Certificates</label>
                                                   <input type="file" name="certificates[]" multiple class="form-control" placeholder="Enter Instagram">
                                                </div>
                                             </div>
                                             <div class="col-sm-4" bis_skin_checked="1">
                                                <div class="" bis_skin_checked="1">
                                                   <label class="required fw-medium mb-2">Photos</label>
                                                   <input type="file" name="photos[]" multiple class="form-control" placeholder="Enter X (Twitter)">
                                                </div>
                                             </div>
                                             <div class="col-sm-4" bis_skin_checked="1">
                                                <div class="" bis_skin_checked="1">
                                                   <label class="required fw-medium mb-2">Reference Shipowners </label>
                                                   <textarea class="form-control" name="reference_shipowners" rows="3" placeholder="Enter Reference Shipowners" ></textarea>
                                                </div>
                                             </div>
                                          </div>
                                       </form>
                                    </div>
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
                                 <!-- </form> -->
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
         const addPortButton = document.querySelector('.add-port');
         const portContainer = document.querySelector('.port_drop_container');
         let portCount = 1;
         
         addPortButton.addEventListener('click', () => {
           if (portCount >= 7) {
             alert("Maximum of 7 ports can be added.");
             return;
           }
         
           portCount++;
           
           // Clone the last port drop
           const lastPort = portContainer.lastElementChild;
           const newPort = lastPort.cloneNode(true);
         
           // Update the label and reset the dropdown
           newPort.querySelector('label').textContent = `Select Port ${portCount}`;
           newPort.querySelector('select').selectedIndex = 0;
         
           portContainer.appendChild(newPort);
         });
      </script>
      <script>
         document.getElementById('serviceSelect').addEventListener('change', function () {
             const selected = this.value;
             ['service1', 'service2', 'service3'].forEach(id => {
                 document.getElementById(id).style.display = (id === selected) ? 'block' : 'none';
             });
         });
      </script>

      <script>
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

         // Debounce function
         function debounce(fn, delay) {
            let timer;
            return function(...args) {
               clearTimeout(timer);
               timer = setTimeout(() => fn.apply(this, args), delay);
            };
         }

         // Attach auto-save to each field with debounce
         $(document).ready(function() {
            
            const sections = [
               { id: 'contactDetailsForm', type: 'contact' },
               { id: 'socialMediaForm', type: 'social' },
               { id: 'companyDetailsForm', type: 'company' }
            ];

            sections.forEach(section => {
               
               $('#' + section.id + ' input, #' + section.id + ' textarea').on('input', debounce(function () {
                  console.log("section.id " + section.id);
                  autoSave(section.id, section.type);
                  console.log('hererer');
               }, 500));
            });
         });
      </script>

@endsection

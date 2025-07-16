<div class="fxt-form-step">
                              <h2 class="fxt-page-title">Contact Information</h2>
                              <div class="col-xl-4 col-12 leftt link1 adres_fld_1">
                                 <label class="Mylabel" for="contact_person_name">First Name</label>
                                 <input id="contact_person_name" type="text" class="form-control" name="contact_person_name" value="{{ old('contact_person_name') }}" placeholder="Enter First name" required>
                              </div>
                               <div class="col-xl-4 col-12 leftt link1 adres_fld_1 adres_fld_2">
                                <label class="Mylabel" for="contact_person_last_name">Last Name</label>
                                 <input id="contact_person_last_name" type="text" class="form-control" name="contact_person_last_name" value="{{ old('contact_person_last_name') }}" placeholder="Enter Last name" required>   
                              </div>
                              <div class="form-group">
                                 <label class="Mylabel adres_fld_1" for="phone">Phone Number</label>
                                 <input id="phone" type="tel" class="form-control" name="phone" 
                                    value="{{ old('phone') }}" 
                                    pattern="[0-9]+" 
                                    maxlength="20" 
                                    placeholder="Enter Phone number" 
                                    required 
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                              </div>
                              <div class="col-xl-4 col-12 leftt link1 adres_fld_1">
                                 <label class="Mylabel" for="Linkd">Country</label>
                                 <select class="form-control" name="country" id="country-select" required>
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                       <option value="{{ $country->id }}" data-name="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach
                                 </select>
                              </div>

                              <div class="col-xl-4 col-12 leftt link1 adres_fld_1 adres_fld_2">
                                 <label class="Mylabel" for="city">City</label>
                                 <select class="form-control" name="city" id="city-select" required>
                                    <option value="">Select City</option>
                                 </select>
                              </div>

                              <div class="form-group" id="identity-number-wrapper" style="display: none;">
                                 <label class="Mylabel adres_fld_1" for="identity_number">Turkish National ID Number</label>
                                 <input id="identity_number" type="text" class="form-control" name="identity_number" value="{{ old('identity_number') }}" placeholder="Enter Identity number here" required>
                              </div>

                              <div class="form-group">
                                 <label class="Mylabel" for="office_address">Office Address</label>
                                 <input id="office_address" name="office_address" class="form-control" placeholder="Start typing address..." required/>
                                 <input type="hidden" id="lat" name="lat">
                                 <input type="hidden" id="lng" name="lng">
                                 <div id="selected_address" class="text-muted mt-2" style="font-size: 14px;"></div>
                              </div>
                             

                              <!-- <button class="open-btn slc_loctn" onclick="openModal()">Select Location here</button> -->
                              <!-- Map popup -->
                              <div class="mapp">
                                 <div id="mapModal" class="modal" onclick="closeOnClickOutside(event)">
                                    <div class="modal-content" id="modalBox">
                                       <span class="close-btn" onclick="closeModal()">&times;</span>
                                       <div class="map-search">
                                          <input type="text" id="locationInput" placeholder="Search location...">
                                       </div>
                                       <iframe 
                                          id="mapFrame"
                                          src="https://www.google.com/maps?q=San+Francisco&output=embed"
                                          allowfullscreen
                                          loading="lazy">
                                       </iframe>
                                       <!-- Confirm Button -->
                                       <button class="confirm-btn popup_confm" onclick="confirmLocation()">Confirm Location</button>
                                    </div>
                                 </div>
                              </div>
                              <!-- Map popup -->
                              <div class="form-group">
                                 <div class="d-flex align-items-center gap-2 mt-5">
                                    <div class="previous fxt-btn-fill prevs_btn">
                                       <i class="fa fa-caret-left" aria-hidden="true"></i>
                                       Previous 
                                    </div>
                                    <div class="next fxt-btn-fill">
                                       Next 
                                       <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
<div class="fxt-form-step">
                              <h2 class="fxt-page-title">Contact Information</h2>
                              <div class="form-group">
                                 <label class="Mylabel" for="contact_person_name">Contact Person Name</label>
                                 <input id="contact_person_name" type="text" class="form-control" name="contact_person_name" value="{{ old('contact_person_name') }}" placeholder="Enter name here" required>
                              </div>
                              <div class="form-group">
                                 <label class="Mylabel adres_fld_1" for="phone">Phone Number</label>
                                 <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Enter number here" required>
                              </div>
                               <!-- <div class="col-xl-4 col-12 leftt link1 adres_fld_1 adres_fld_2">
                                    <label class="Mylabel" for="emailh">Email Address</label>
                                    <input id="emailh" type="email" class="form-control" name="emailh" placeholder="Enter Email here"> 
                              </div>  -->
                              <div class="col-xl-4 col-12 leftt link1 adres_fld_1">
                                 <label class="Mylabel" for="Linkd">Country</label>
                                 <select class="form-control" name="country" id="country-select" required>
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                       <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="col-xl-4 col-12 leftt link1 adres_fld_1 adres_fld_2">
                                 <label class="Mylabel" for="Linkd">City</label>
                                 <select class="form-control" name="city" id="city-select" required>
                                    <option value="">Select City</option>
                                 </select>    
                              </div>

                              <div class="form-group">
                                 <label class="Mylabel" for="office_address" rows="9" cols="50">Office Address</label>
                                 <textarea id="office_address" type="text" class="form-control" name="office_address" placeholder="Enter adress here" required>{{ old('office_address') }}</textarea>
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
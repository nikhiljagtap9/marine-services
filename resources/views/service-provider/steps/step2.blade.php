<div class="fxt-form-step">
                              <h2 class="fxt-page-title">Contact Information</h2>
                              <div class="form-group">
                                 <label class="Mylabel" for="fname">Contact Person Name</label>
                                 <input id="fname" type="text" class="form-control" name="fname" placeholder="Enter name here">
                              </div>
                              <div class="col-xl-4 col-12 leftt link1 adres_fld_1">
                                 <label class="Mylabel adres_fld_1" for="phonen">Phone Number</label>
                                 <input id="phonen" type="text" class="form-control" name="phonen" placeholder="Enter number here">
                              </div>
                              <div class="col-xl-4 col-12 leftt link1 adres_fld_1 adres_fld_2">
                                 <label class="Mylabel" for="emailh">Email Address</label>
                                 <input id="emailh" type="email" class="form-control" name="emailh" placeholder="Enter Email here">
                              </div>
                              <div class="col-xl-4 col-12 leftt link1 adres_fld_1">
                                 <label class="Mylabel" for="Linkd">Country</label>
                                 <select class="form-control">
                                    <option>Country 1</option>
                                    <option>Country 2</option>
                                    <option>Country 3</option>
                                 </select>
                              </div>
                              <div class="col-xl-4 col-12 leftt link1 adres_fld_1 adres_fld_2">
                                 <label class="Mylabel" for="Linkd">City</label>
                                 <select class="form-control">
                                    <option>City 1</option>
                                    <option>City 2</option>
                                    <option>City 3</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label class="Mylabel" for="Office_adres" rows="9" cols="50">Office Address</label>
                                 <textarea id="Office_adres" type="text" class="form-control" name="Office_adres" placeholder="Enter adress here"></textarea>
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
                                       <!-- ✅ Confirm Button -->
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
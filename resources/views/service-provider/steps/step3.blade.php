 <div class="fxt-form-step">

                              <div class="form-group">
                                 <label class="Mylabel" for="ports_services">Ports Where Services Are Provided</label>
                                 <select id="ports_services" name="port_id" required>
                                    <option value="">Select Ports</option>
                                 </select>
                              </div>

                              <div class="form-group">
                                 <label class="Mylabel" for="servicess">Types of Services Provided</label>
                                 <select id="service-type" name="service_type" required>
                                    <option value="">Select Services</option>
                                    @foreach($categories as $category )
                                       <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                 </select>
                              </div>


                              <div class="form-group">
                                 <label class="Mylabel" for="sub_service_type">Types of Sub-Services Provided</label>
                                 <select id="sub-service-type" name="sub_service_type" required>
                                 </select>
                              </div>


                              
                              
                              <div class="clear"></div>
                              <div class="form-group" id="contactDiv">
                                 <label class="Mylabel" for="contact_number">Provide your contact number</label>
                                 <input id="contact_number" type="text" class="form-control" name="contact_number" placeholder="Enter number here">
                              </div>
                              <div class="clear"></div>
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
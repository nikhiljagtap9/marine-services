<div class="fxt-form-step">
                              <h2 class="fxt-page-title">Basic Company Information</h2>
                              <div class="form-group">
                                 <label class="Mylabel" for="fname">Company Name</label>
                                 <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" placeholder="Enter your Company Name here" required>
                              </div>
                              <div class="form-group">
                                 <label class="Mylabel" for="myfile">Company Logo</label>
                                 <!-- <label class="Mylabel" for="fname">Company logo</label> -->
                                 <input id="company_logo" type="file" class="form-control file_upload" name="company_logo" placeholder="Company Logo here" required>
                              </div>
                              <div class="form-group">
                                 <label class="Mylabel" for="w3review"> Company Description</label>
                                 <textarea id="company_description" type="text" class="form-control" name="company_description" placeholder="Company Description" required>{{ old('company_description') }}</textarea>
                              </div>
   
                              <div class="form-group">
                                 <div class="d-flex align-items-center gap-2 mt-5">
                                    <div class="next fxt-btn-fill">
                                       Next 
                                       <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
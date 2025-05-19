
                    <div class="fxt-form-step">
                              <div class="form-group">
                                 <h2 class="fxt-page-title">Login Information</h2>
                                 <div class="form-group">
                                    <label class="Mylabel" for="email">Email</label>
                                    <input id="email" type="text" class="form-control" name="email" placeholder="Enter Email" value="{{ old('email') }}" required>
                                 </div>
                                 <div class="form-group">
                                    <label class="Mylabel" for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Enter your Password" required>
                                 </div>
                                 <div class="form-group">
                                    <label class="Mylabel" for="password_confirmation">Confirm Password</label>
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm your Password" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="d-flex align-items-center gap-2 mt-5">
                                    <div class="previous fxt-btn-fill prevs_btn">
                                       <i class="fa fa-caret-left" aria-hidden="true"></i>
                                       Previous 
                                    </div>

                                    <button type="submit" class="fxt-btn-fill">
                                    SUBMIT 
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    </button>
                                 </div>
                              </div>
                           </div>
<div class="fxt-form-step">
   <h2 class="fxt-page-title">Basic Company Information</h2>
   <div class="form-group">
      <label class="Mylabel" for="fname">Company Name</label>
      <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" placeholder="Enter your Company Name here" required>
   </div>
   <div class="form-group">
      <label class="Mylabel" for="myfile">Company Logo</label>
      <!-- <label class="Mylabel" for="fname">Company logo</label> -->
      <input id="company_logo" type="file" class="form-control file_upload" name="company_logo" placeholder="Company Logo here" accept=".jpg,.jpeg,.png" required>
   </div>
   <div class="form-group">
      <label class="Mylabel" for="w3review"> Company Description</label>
      <textarea id="company_description" type="text" class="form-control" name="company_description" placeholder="Company Description" required>{{ old('company_description') }}</textarea>
   </div>
   <div class="clear"></div>
   <label class="checkbx_wrp">
      <input type="checkbox" required>
      <div class="chebkx_text">
         By continuing, I confirm I’ve read and agree to Rated Marine Services' 
         <a href="{{ route('t&c') }}" target="_blank">Terms &amp; Conditions </a>,
         <a href="{{ route('privacy') }}" target="_blank"> Privacy Policy </a>,
         <a href="{{ route('consent') }}" target="_blank">Consent Statement</a>,
         <a target="_blank" href="{{ route('distance_sales_agreement') }}">Distance Sales Agreement</a>
                                    and
         <a target="_blank" href="{{ route('data_processing') }}">Data Processing and Storage Policy</a>
      </div>
      <div class="clear"></div>
   </label>
    <div class="clear"></div>
   <div class="form-group">
      <div class="d-flex align-items-center gap-2 mt-5">
         <div class="next fxt-btn-fill">
            Next
            <i class="fa fa-caret-right" aria-hidden="true"></i>
         </div>
      </div>
   </div>
</div>
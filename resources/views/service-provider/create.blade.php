@extends('service-provider.main')

@section('content')
      <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->
      <div id="preloader" class="preloader">
         <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
         </div>
      </div>
      <section class="fxt-template-animation fxt-template-layout35">
         <div class="fxt-content-wrap">
            <div class="fxt-heading-content">
               <div class="fxt-inner-wrap">
                  <div class="fxt-transformX-R-50 fxt-transition-delay-10">
                     <a href="#" class="fxt-logo"><img src="assets/img/logo.jpg" alt="Logo"></a>
                  </div>
                  <div class="fxt-transformX-R-50 fxt-transition-delay-10">
                     <div class="fxt-middle-content">
                        <h1 class="fxt-main-title">Only 15 Paid Memberships Allowed per Port & Category</h1>
                        <p class="fxt-description tex_sub2">
                           Silver, Gold, or Platinum — doesn’t matter. <br>
                           Each port and each main category is limited to just 15 paid companies.<br>
                           Once the 15 slots are gone, they’re gone for that year !!!<br>
                           Even if you're ready to pay, you won’t be eligible.
                        </p>
                        <div class="clear"></div>
                        <div class="ind_sub_1">
                           ✅Full Profile &nbsp;|&nbsp; ⭐ Reviews &nbsp;|&nbsp; 📍 Map Visibility – Only for the First 15
                        </div>
                        <div class="indx_slide">
                           <div class="slider">
                              <button class="arrow left">&#10094;</button>
                              <div class="slides" id="slides">
                                 <div class="slide">
                                    <div class="laun_titl">
                                       ⏳ Launch Offer Until September 15, 2025
                                    </div>
                                    <div class="laun_titl_text">
                                       Join before September 15, 2025 to take advantage of our special launch pricing.
                                       You can even lock in this discounted rate for up to 2 more years by paying in advance.
                                       Smart move, right?
                                    </div>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="slide">
                                    <div class="laun_titl">
                                       🧊 What Happens If You Miss the Cut?
                                    </div>
                                    <div class="laun_titl_text">
                                       You can still register for a Free Membership —
                                       but your company will only appear as a name in the list.
                                       No profile. No visibility. No ratings. No leads.
                                       You’ll be invisible. <br>
                                       This platform rewards first movers, not latecomers.
                                    </div>
                                 </div>
                              </div>
                              <button class="arrow right">&#10095;</button>
                           </div>
                        </div>
                        <div class="clear"></div>
                        <div class="be_one_wrp">
                           <div class="be_one">
                              👉 Be one of the 15. Or be left behind.
                           </div>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="fxt-form-content">
               <div class="fxt-main-form">
                  <div class="fxt-inner-wrap fxt-opacity fxt-transition-delay-13">
                     <div>
                        <!-- Progressbar -->
                        <div class="mb-5 d-grid">
                           <div class="fxt-steps">
                              <span class="fxt-current-step"></span> of
                              <span class="fxt-total-step"></span> completed
                           </div>
                           <div class="progress">
                              <div class="progress-bar progress-bar-solid progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                              </div>
                           </div>
                        </div>
                        <!-- Form -->
                        <form action="#" method="GET">
                           <div class="fxt-form-step">
                              <h2 class="fxt-page-title">Basic Company Information</h2>
                              <div class="form-group">
                                 <label class="Mylabel" for="fname">Company Name</label>
                                 <input id="fname" type="text" class="form-control" name="fname" placeholder="Enter your Company Name here">
                              </div>
                              <div class="form-group">
                                 <label class="Mylabel" for="myfile">Company Logo</label>
                                 <!-- <label class="Mylabel" for="fname">Company logo</label> -->
                                 <input id="myfile" type="file" class="form-control file_upload" name="myfile" placeholder="Company Logo here">
                              </div>
                              <div class="form-group">
                                 <label class="Mylabel" for="w3review"> Company Description</label>
                                 <textarea id="w3review" type="text" class="form-control" name="w3review" placeholder="Company Description"></textarea>
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
                           <div class="fxt-form-step">

                              <div class="form-group">
                                 <label class="Mylabel" for="portsservices">Ports Where Services Are Provided</label>
                                 <input id="portsservices" type="text" class="form-control" name="portsservices" placeholder="Enter Ports here">
                              </div>

                              <div class="form-group">
                                 <label class="Mylabel" for="servicess">Types of Services Provided</label>
                                 <select id="servicess">
                                    <option value="agriculture">Agriculture</option>
                                    <option value="air-conditioning">Air Conditioning & Refrigeration</option>
                                    <option value="boilers-hvac">Boilers, Heating & HVAC Systems</option>
                                    <option value="brokerage">Brokerage</option>
                                    <option value="bunkering-oil">Bunkering & Oil Supplies</option>
                                    <option value="cargo-equipment">Cargo Handling Equipment</option>
                                    <option value="cargo-shippers">Cargo Shippers & Charterers</option>
                                    <option value="chartering">Chartering Services</option>
                                    <option value="charts-navigation">Charts & Navigation Equipment</option>
                                    <option value="chemicals">Chemicals & Chemical Services</option>
                                    <option value="classification">Classification Societies</option>
                                    <option value="cleaning">Cleaning Services</option>
                                    <option value="coast-guard">Coast Guard Services</option>
                                    <option value="consultancy">Consultancy Services</option>
                                    <option value="container-sales">Container Sales & Trading</option>
                                    <option value="crane-hire">Crane Hire / Rental</option>
                                    <option value="crane-repairs">Crane Repairs</option>
                                    <option value="crewing">Crewing Services</option>
                                    <option value="deck-hatch">Deck, Hatch & Mooring Equipment</option>
                                    <option value="diving">Diving & Underwater Services</option>
                                    <option value="dredging">Dredging Services</option>
                                    <option value="drydocks">Drydocks</option>
                                    <option value="education">Education & Training Services</option>
                                    <option value="electronics">Electronics & Telecommunications</option>
                                    <option value="energy">Energy Services</option>
                                    <option value="engineering">Engine Builders & Engineering</option>
                                    <option value="environmental">Environmental Services</option>
                                    <option value="fishing">Fishing & Fishery Services</option>
                                    <option value="flag-administration">Flag Administration</option>
                                    <option value="freight">Freight Forwarding & Logistics</option>
                                    <option value="fresh-water">Fresh Water Supply</option>
                                    <option value="furniture">Furniture (Internal Ship Furnishings)</option>
                                    <option value="gangway-repairs">Gangway Repairs</option>
                                    <option value="generators">Generators</option>
                                    <option value="grab-rental">Grab Rental</option>
                                    <option value="grab-repairs">Grab Repairs</option>
                                    <option value="hold-cleaning">Hold Cleaning / Shore Gang</option>
                                    <option value="hydrographic">Hydrographic Services</option>
                                    <option value="it-solutions">Information Technology Solutions</option>
                                    <option value="insurance">Insurance, Finance & Legal Services</option>
                                    <option value="ladders">Ladders, Gangways & Access Equipment</option>
                                    <option value="legal">Legal Services</option>
                                    <option value="lifting-gear">Lifting Gear & Safety Appliances</option>
                                    <option value="logistics">Logistics, Transport & Freight</option>
                                    <option value="main-engine-repairs">Main Engine / Diesel Generator Repairs</option>
                                    <option value="medical">Medical Services</option>
                                    <option value="navigation-equipment">Navigation Equipment Supply and Repairs</option>
                                    <option value="offshore">Offshore Services</option>
                                    <option value="p-i-clubs">P&I Clubs & Correspondents</option>
                                    <option value="pilots">Pilots & Pilotage Services</option>
                                    <option value="port-terminal">Port & Terminal Services</option>
                                    <option value="port-agents">Port Agents</option>
                                    <option value="port-authorities">Port Authorities</option>
                                    <option value="publications">Publications</option>
                                    <option value="pumps-valves">Pumps and Valves</option>
                                    <option value="repair-maintenance">Repair & Maintenance Services</option>
                                    <option value="search-rescue">Search & Rescue Services</option>
                                    <option value="security">Security & Surveillance Services</option>
                                    <option value="ship-breakers">Ship Breakers & Demolition</option>
                                    <option value="shipyards">Shipyards, Ship Builders</option>
                                    <option value="ship-chandlers">Ship Chandlers / Suppliers</option>
                                    <option value="ship-owners">Ship Owners, Managers & Operators</option>
                                    <option value="ship-tracking">Ship Tracking & Monitoring</option>
                                    <option value="shipping-lines">Shipping Lines & Agents</option>
                                    <option value="software-tech">Software & Technology Solutions</option>
                                    <option value="surveyors">Surveyors & Marine Consultants</option>
                                    <option value="taxi-transportation">Taxi & Transportation Services</option>
                                    <option value="tourism">Tourism & Hospitality Services</option>
                                    <option value="towage">Towage, Salvage & Emergency Services</option>
                                    <option value="underwater-services">Underwater Services (Inspection, Cleaning, Repairs)</option>
                                    <option value="warehousing">Warehousing & Storage Services</option>
                                    <option value="waste-disposal">Waste Disposal & Management</option>
                                    <option value="weather">Weather & Routing Services</option>
                                    <option value="yacht-builders">Yacht & Pleasure Craft Builders</option>
                                    <option value="yacht-chartering">Yacht Chartering Services</option>
                                    <option value="yacht-equipment">Yacht Equipment & Accessories</option>
                                 </select>
                              </div>


                              <div class="form-group">
                                 <label class="Mylabel" for="servicess">Types of Sub-Services Provided</label>
                                 <select id="servicess">
                                    <option value="agriculture">Sub-Services</option>
                                    <option value="air-conditioning">Sub-Services</option> 
                                 </select>
                              </div>


                              
                              
                              <div class="clear"></div>
                              <div class="form-group" id="contactDiv">
                                 <label class="Mylabel" for="contactNumber">Provide your contact number</label>
                                 <input id="contactNumber" type="text" class="form-control" name="contactNumber" placeholder="Enter number here">
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
                            
                           <div class="fxt-form-step">
                              <div class="">
                                 <h2 class="fxt-page-title">Login Information</h2>
                                 <div class="form-group">
                                    <label class="Mylabel" for="User_name">Username</label>
                                    <input id="User_name" type="text" class="form-control" name="User_name" placeholder="Enter Username">
                                 </div>
                                 <div class="form-group">
                                    <label class="Mylabel" for="pwd">Password</label>
                                    <input id="pwd" type="password" class="form-control" name="pwd" placeholder="Enter your Password ">
                                 </div>
                                 <div class="form-group">
                                    <label class="Mylabel" for="con_pwd">Confirm Password</label>
                                    <input id="con_pwd" type="password" class="form-control" name="con_pwd" placeholder="Confirm your Password">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="d-flex align-items-center gap-2 mt-5">
                                    <div class="previous fxt-btn-fill prevs_btn">
                                       <i class="fa fa-caret-left" aria-hidden="true"></i>
                                       Previous 
                                    </div>
                                    <a href="confirm.html" class="fxt-btn-fill">
                                    SUBMIT 
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- jquery-->
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
@endsection
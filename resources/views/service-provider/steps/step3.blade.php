 <div class="fxt-form-step">

                              <div class="form-group">
                                 <label class="Mylabel" for="ports_services">Ports Where Services Are Provided</label>
                                 <select id="ports_services" name="ports_services" required>
                                    <option value="">Select Ports</option>
                                 @foreach($ports as $port )
                                    <option value="{{$port->id}}">{{$port->name}}</option>
                                 @endforeach
                                 </select>
                              </div>

                              <div class="form-group">
                                 <label class="Mylabel" for="servicess">Types of Services Provided</label>
                                 <select id="service-type" name="service_type" required>
                                    <option value="">Select Services</option>
                                    @foreach($categories as $category )
                                       <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    <!-- <option value="agriculture">Agriculture</option>
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
                                    <option value="yacht-equipment">Yacht Equipment & Accessories</option> -->
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
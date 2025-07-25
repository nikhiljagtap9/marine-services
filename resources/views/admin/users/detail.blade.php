@extends('admin.main')

@section('content')

<style type="text/css">
   a.quot_activ {
   color: #083a76;
   background-color: rgb(8 58 118 / 9%);
   -webkit-box-shadow: none;
   box-shadow: none;
   border-color: #083a76;
   border-left: 4px solid #083a76 !important;
   }
</style>
    <div class="body-content">
        <div class="decoration blur-2"></div>
        <div class="decoration blur-3"></div>
        <div class="container-xxl">
            <div class="card mb-4">
    <div class="card-header"><strong>Contact Click Stats</strong></div>
    <div class="card-body">
        <div class="row">
            <!-- Contact -->
            <div class="col-sm-3">
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Contact</h6>
                    <div class="d-flex align-items-center justify-content-center rounded arrow-btn percentage-increase">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-world">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                            <path d="M3.6 9h16.8" />
                            <path d="M3.6 15h16.8" />
                            <path d="M11.5 3a17 17 0 0 0 0 18" />
                            <path d="M12.5 3a17 17 0 0 1 0 18" />
                        </svg>
                    </div>
                </div>
                <h1 class="price"><span class="counter">{{ $clickCounts['contact'] ?? 0 }}</span></h1>
            </div>

            <!-- WhatsApp -->
            <div class="col-sm-3">
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">WhatsApp</h6>
                    <div class="d-flex align-items-center justify-content-center rounded arrow-btn percentage-increase">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-ship">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M2 20a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1" />
                            <path d="M4 18l-1 -5h18l-2 4" />
                            <path d="M5 13v-6h8l4 6" />
                            <path d="M7 7v-4h-1" />
                        </svg>
                    </div>
                </div>
                <h1 class="price counter">{{ $clickCounts['whatsapp'] ?? 0 }}</h1>
            </div>

            <!-- Email -->
            <div class="col-sm-3">
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Email</h6>
                    <div class="d-flex align-items-center justify-content-center rounded arrow-btn percentage-increase">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-star">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                    </div>
                </div>
                <h1 class="price counter">{{ $clickCounts['email'] ?? 0 }}</h1>
            </div>

            <!-- Location -->
            <div class="col-sm-3">
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Location</h6>
                    <div class="d-flex align-items-center justify-content-center rounded arrow-btn percentage-increase">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-star">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                    </div>
                </div>
                <h1 class="price counter">{{ $clickCounts['location'] ?? 0 }}</h1>
            </div>
        </div>
    </div>
</div>


            <div class="card mb-4">
                <div class="card-header position-relative">
                    <h6 class="fs-17 fw-semi-bold mb-0">Subscription Details</h6>
                </div>
                
                <div class="card-body">
                    <div class="row g-4">
                        <!-- start form group -->
                        <div class="col-sm-3">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Plan Name</label>
                                <div> {{ $subscription->plan->name ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-3">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Start Date</label>
                                <div> {{ \Carbon\Carbon::parse($subscription->start_date)->format('d M Y') }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-3">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">End Date</label>
                                <div> {{ \Carbon\Carbon::parse($subscription->end_date)->format('d M Y') }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-3">
                        <label class="fw-medium mb-2">Status</label>
                            <div>
                                @php
                                    $status = $subscription->actual_status;
                                @endphp

                                @if ($status === 'active')
                                    <span class="badge bg-success">{{ ucfirst($status) }}</span>
                                @elseif ($status === 'expired')
                                    <span class="badge bg-danger">{{ ucfirst($status) }}</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($status) }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- end /. form group -->
                    </div> 
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header position-relative"> 
                    <h6 class="fs-17 fw-semi-bold mb-0">Service Provider Details</h6>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-sm-3">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Company Name</label>
                                <div> {{ $provider->company_name ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-3">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Conatct Person Name</label>
                                <div> {{ $provider->contact_person_name ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-3">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Phone</label>
                                <div> {{ $provider->phone ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div> 
                        <div class="col-sm-3">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Logo</label>
                                <div> 
                                    @if($provider->company_logo)
                                        <img src="{{ asset('storage/' . $provider->company_logo) }}" alt="Logo" width="50">
                                    @else
                                        N/A
                                    @endif
                                </div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-4">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Email</label>
                                <div> {{ $provider->user->email ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-4">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Country</label>
                                <div> {{ $provider->country ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-4">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">City</label>
                                <div> {{ $provider->city ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-6">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Office Address</label>
                                <div>   {{ $provider->office_address ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>

                        <div class="col-sm-6">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Company Description</label>
                                <div>   {{ $provider->company_description ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header position-relative">
                    <h6 class="fs-17 fw-semi-bold mb-0">Contact Detail</h6>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-sm-4">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Alternative Email</label>
                                <div> {{ $provider->contactDetail->alternative_email ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-4">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Office Telephone</label>
                                <div> {{ $provider->contactDetail->office_telephone ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-4">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Nobile Number</label>
                                <div> {{ $provider->contactDetail->mobile_number ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-4">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Whatsapp Number</label>
                                <div> {{ $provider->contactDetail->whatsapp_number ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-4">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Emergency Contact Number</label>
                                <div> {{ $provider->contactDetail->emergency_contact_number ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header position-relative">
                    <h6 class="fs-17 fw-semi-bold mb-0">Social Media</h6>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <!-- start form group -->
                        <div class="col-sm-4">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Linkedin</label>
                                <div> {{ $provider->socialMediaDetails->linkedin ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-4">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Instagram</label>
                                <div> {{ $provider->socialMediaDetails->instagram ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <div class="col-sm-4">
                            <!-- start form group -->
                            <div class="">
                                <label class="fw-medium mb-2">Twitter</label>
                                <div> {{ $provider->socialMediaDetails->twitter ?? 'N/A' }}</div>
                            </div>
                            <!-- end /. form group -->
                        </div>
                        <!-- end /. form group -->
                    </div> 
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header position-relative">
                    <h6 class="fs-17 fw-semi-bold mb-0">Port Service Details</h6>
                </div>
                <div class="card-body">
                   @foreach($provider->portServiceDetails as $detail) 
                        
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <!-- start form group -->
                                <div class="">
                                    <label class="fw-medium mb-2">Country</label>
                                    <div> {{ $detail->country->name ?? 'N/A' }}</div>
                                </div>
                                <!-- end /. form group -->
                            </div>
                            <div class="col-sm-6">
                                <!-- start form group -->
                                <div class="">
                                    <label class="fw-medium mb-2">Port</label>
                                    <div> {{ $detail->port->name ?? 'N/A' }}</div>
                                </div>
                                <!-- end /. form group -->
                            </div>
                            <div class="col-sm-6">
                                <!-- start form group -->
                                <div class="">
                                    <label class="fw-medium mb-2">Service Category</label>
                                    <div>   {{ $detail->category->name ?? 'N/A' }}</div>
                                </div>
                                <!-- end /. form group -->
                            </div>
                            <div class="col-sm-6">
                                <!-- start form group -->
                                <div class="">
                                    <label class="fw-medium mb-2">Additional Info</label>
                                    <div> {{ $detail->additional_info ?? 'N/A' }}</div>
                                </div>
                                <!-- end /. form group -->
                            </div>
                           
                            <div class="col-md-12">
                                <div class="fw-medium text-dark mb-3">Sub Service Category</div>
                                <div class="row gx-3 gy-2">
                                     @php
                                        $subServiceNames = \App\Models\SubCategory::whereIn('id', $detail->sub_services)->pluck('name')->toArray();
                                    @endphp
                                    <div> {{ implode(', ', $subServiceNames) }}</div>
                                    
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <hr>
                            </div>
                        </div>
                   @endforeach 
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header position-relative">
                    <h6 class="fs-17 fw-semi-bold mb-0">Company Detail</h6>
                </div>
                <div class="card-body">
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <!-- start form group -->
                                <div class="">
                                    <label class="fw-medium mb-2">Slogan</label>
                                    <div> {{ $provider->companyDetail->slogan ?? 'N/A' }}</div>
                                </div>
                                <!-- end /. form group -->
                            </div>
                            <div class="col-sm-6">
                                <!-- start form group -->
                                <div class="">
                                    <label class="fw-medium mb-2">About</label>
                                    <div> {{ $provider->companyDetail->about ?? 'N/A' }}</div>
                                </div>
                                <!-- end /. form group -->
                            </div>
                            <div class="col-sm-6">
                                <!-- start form group -->
                                <div class="">
                                    <label class="fw-medium mb-2">Brands</label>
                                    <div> {{ $provider->companyDetail->brands ?? 'N/A' }}</div>
                                </div>
                                <!-- end /. form group -->
                            </div>
                            <div class="col-sm-6">
                                <!-- start form group -->
                                <div class="">
                                    <label class="fw-medium mb-2">Reference Shipowners</label>
                                    <div>{{ $provider->companyDetail->reference_shipowners ?? 'N/A' }}</div>
                                </div>
                                <!-- end /. form group -->
                            </div>
             
                            <div class="col-md-12">
                                <div class="fw-medium text-dark mb-3">Certificates</div>
                                <div class="row gx-3 gy-2">
                                     @if(!empty($provider->companyDetail->certificates))
                                        @php
                                        $certs = json_decode($provider->companyDetail->certificates, true);
                                        @endphp
                                        <ul>
                                            @foreach($certs as $cert)
                                            <li>
                                                <a href="{{ asset('storage/' . $cert) }}" target="_blank">View Certificate</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    @endif                   
                                </div>
                            </div>       

                            <div class="col-md-12">
                                <div class="fw-medium text-dark mb-3">Photo</div>
                                <div class="row gx-3 gy-2">
                                    @if(!empty($provider->companyDetail->photos))
                                        @php
                                        $photos = json_decode($provider->companyDetail->photos, true);
                                        @endphp
                                        <div class="row">
                                            @foreach($photos as $photo)
                                            <div class="col-md-3">
                                                <img src="{{ asset('storage/' . $photo) }}" class="img-thumbnail mb-2" width="100" />
                                            </div>
                                            @endforeach
                                        </div>
                                    @endif              
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <hr>
                            </div>
                        </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection



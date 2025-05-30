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
      <div id="success-message" class="alert alert-success d-none"></div>
      <div class="card">
         <div class="card-header position-relative">
            <h6 class="fs-17 fw-semi-bold my-1">Service Providers for Plan: {{ $plan->name ?? 'N/A' }} </h6>
         </div>
         <div class="card-body">
               <h2>Service Provider Details----</h2>
    <p><strong>Company Name:</strong> {{ $provider->company_name ?? 'N/A' }}</p>
    <p><strong>Logo:</strong> 
        @if($provider->company_logo)
            <img src="{{ asset('storage/' . $provider->logo) }}" alt="Logo" width="100">
        @else
            N/A
        @endif
    </p>
    <p><strong>Company Description:</strong> {{ $provider->company_description ?? 'N/A' }}</p>
    <p><strong>Contact Person:</strong> {{ $provider->contact_person_name ?? 'N/A' }}</p>
    <p><strong>Phone:</strong> {{ $provider->phone ?? 'N/A' }}</p>
    <p><strong>Email:</strong> {{ $provider->user->email ?? 'N/A' }}</p>
    <p><strong>country:</strong> {{ $provider->country ?? 'N/A' }}</p>
    <p><strong>city:</strong> {{ $provider->city ?? 'N/A' }}</p>
    <p><strong>office_address:</strong> {{ $provider->office_address ?? 'N/A' }}</p>


    <h4>Contact Detail------</h4>
    <p><strong>alternative_email:</strong> {{ $provider->contactDetail->alternative_email ?? 'N/A' }}</p>
    <p><strong>office_telephone:</strong> {{ $provider->contactDetail->office_telephone ?? 'N/A' }}</p>
    <p><strong>mobile_number:</strong> {{ $provider->contactDetail->mobile_number ?? 'N/A' }}</p>
    <p><strong>whatsapp_number:</strong> {{ $provider->contactDetail->whatsapp_number ?? 'N/A' }}</p>
    <p><strong>emergency_contact_number:</strong> {{ $provider->contactDetail->emergency_contact_number ?? 'N/A' }}</p>


    <h4>Social Media-----</h4>
    <p><strong>linkedin:</strong> {{ $provider->socialMediaDetails->linkedin ?? 'N/A' }}</p>
    <p><strong>instagram:</strong> {{ $provider->socialMediaDetails->instagram ?? 'N/A' }}</p>
    <p><strong>twitter:</strong> {{ $provider->socialMediaDetails->twitter ?? 'N/A' }}</p>





<h4>Port Service Details</h4>
@foreach($provider->portServiceDetails as $detail)
    <div class="border p-2 mb-2">
        <p><strong>Country:</strong> {{ $detail->country->name ?? 'N/A' }}</p>
        <p><strong>Port:</strong> {{ $detail->port->name ?? 'N/A' }}</p>
        <p><strong>Category:</strong> {{ $detail->category->name ?? 'N/A' }}</p>
        
        @php
            $subServiceNames = \App\Models\SubCategory::whereIn('id', $detail->sub_services)->pluck('name')->toArray();
        @endphp
        <p><strong>Sub-Services:</strong> {{ implode(', ', $subServiceNames) }}</p>

        <p><strong>Additional Info:</strong> {{ $detail->additional_info ?? 'N/A' }}</p>
    </div>
@endforeach



     <h4>Company Detail----</h4>
      <p><strong>slogan:</strong> {{ $provider->companyDetail->slogan ?? 'N/A' }}</p>
       <p><strong>about:</strong> {{ $provider->companyDetail->about ?? 'N/A' }}</p>
        <p><strong>brands:</strong> {{ $provider->companyDetail->brands ?? 'N/A' }}</p>
        <p><strong>reference_shipowners:</strong> {{ $provider->companyDetail->reference_shipowners ?? 'N/A' }}</p>
        <p>Certificates:</p>
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

        <p>Photo:</p>
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
   </div>
</div>
@endsection



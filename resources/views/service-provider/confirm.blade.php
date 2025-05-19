@extends('service-provider.main')

@section('content')
  <div class="fxt-template-layout35">
        <div class="success-page-wrap">
            <div class="container text-center d-flex align-items-center justify-content-center h-100">
                <div class="success-page-content">
                    <div class="icon-success"><i class="fas fa-check"></i></div>
                    <h2 class="title-success">Application Submitted</h2>
                    <p class="description-success">Thanks for your Interest! <br>

                        Your business registration was successful. <br> Your details will be displayed on our platform soon.<br> Feel free to contact us for any assistance!
                    </p>
                    <a href="{{route('pricing')}}" class="fxt-btn-ghost">Subscribe Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection
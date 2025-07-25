@extends('service-provider.main')

@section('content')
<style>
    .fxt-template-layout35 .success-page-wrap .description-success {
    color: #ffffff;
    font-size: 25px;
    line-height: 35px;
}

.fxt-template-layout35 .success-page-wrap .description-success {
        color: #ffffff;
        font-size: 25px;
        line-height: 35px;
    }

    .success-buttons {
        margin-top: 30px;
    }

    .success-buttons a {
        margin: 0 10px;
        padding: 10px 25px;
        font-size: 16px;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn-home {
        background-color: #124f98;
        color: #fff;
    }

    .btn-dashboard {
        background-color: #007BFF;
        color: #fff;
    }

    .btn-home:hover,
    .btn-dashboard:hover {
        opacity: 0.9;
    }
</style>
  <div class="fxt-template-layout35">
        <div class="success-page-wrap">
            <div class="container text-center d-flex align-items-center justify-content-center h-100">
                <div class="success-page-content">
                    <div class="icon-success"><i class="fas fa-check"></i></div>
                    <h2 class="title-success">Congratulations!</h2>
                    <p class="description-success">Your Registration is Complete. <br>
                        You can log in and begin exploring all our services starting 1st July 2025.<br>

                        Your Silver plan is free until 1st October 2025 <br>
                        
                        Don’t forget to upgrade to one of our paid plans before your free plan expires.
                    </p>
                    <div class="success-buttons">
                        <a href="{{ url('/') }}" class="btn btn-home">Go to Home</a>
                        <a href="{{ route('service-provider.index') }}" class="btn btn-dashboard">Go to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

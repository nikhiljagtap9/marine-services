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
                    <h2 class="title-success">Payment Failed</h2>
                    <p class="description-success">Unfortunately, your payment could not be processed. Please try again or contact support.
                    </p>
                      <table class="table table-bordered">
                <tr>
                    <th>Status</th>
                    <td><span class="badge bg-danger">{{ $payment['status'] }}</span></td>
                </tr>
                <tr>
                    <th>Payment ID</th>
                    <td>{{ $payment['payment_id'] ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $payment['price'] ?? '-' }} {{ $payment['currency'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Paid Price</th>
                    <td>{{ $payment['paid_price'] ?? '-' }} {{ $payment['currency'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Card Type</th>
                    <td>{{ $payment['card_type'] ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Card Brand</th>
                    <td>{{ $payment['card_association'] ?? '-' }} {{ $payment['card_family'] ?? '' }}</td>
                </tr>
                <tr>
                    <th>Card BIN</th>
                    <td>{{ $payment['bin_number'] ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Last 4 Digits</th>
                    <td>{{ $payment['last_four_digits'] ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Auth Code</th>
                    <td>{{ $payment['auth_code'] ?? '-' }}</td>
                </tr>
            </table>
                    <div class="success-buttons">
                        <a href="{{ url('/') }}" class="btn btn-home">Go to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


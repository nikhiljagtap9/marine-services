@extends('admin.main')

@section('content')
<div class="body-content">
   <div class="container-xxl">
      <div class="card">
         <div class="card-header">
            <h6 class="fs-17 fw-semi-bold my-1">Subscription Payments</h6>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-borderless text-nowrap category-list">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Plan</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Payment ID</th>
                        <th>Date</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($payments as $index => $payment)
                     <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $payment->user->name ?? 'N/A' }}</td>
                        <td>{{ $payment->plan->name ?? 'N/A' }}</td>
                        <td>{{ $payment->paid_price }}</td>
                        <td>
                            <span class="badge bg-{{ $payment->status === 'SUCCESS' ? 'success' : 'danger' }}">
                                {{ $payment->status }}
                            </span>
                        </td>
                        <td>{{ $payment->payment_id }}</td>
                        <td>{{ $payment->created_at->format('d M Y, h:i A') }}</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

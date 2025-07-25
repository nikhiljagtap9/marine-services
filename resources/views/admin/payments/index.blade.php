@extends('admin.main')

@section('content')
<style>
.custom-modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.6);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.custom-modal {
    background-color: #fff;
    padding: 20px 30px;
    border-radius: 8px;
    width: 300px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    text-align: center;
}

.custom-modal h4 {
    margin-bottom: 10px;
}

.custom-modal .modal-actions {
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
}
</style>


<div class="body-content">
    <div class="container-xxl">
        <div class="card">
            <div class="card-header">
                <h6 class="fs-17 fw-semi-bold my-1">All Subscriptions</h6>
            </div>
            <div class="card-body">
               <div id="subscription-message" class="alert d-none"></div>
                <div class="table-responsive">
                    <table id="subscriptions-list" class="table table-borderless text-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Plan</th>
                                <th>Status</th>
                                <th>Payment Status</th>
                                <th>Mode</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Payment ID</th>
                                <th>Paid Amount</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subscriptions as $index => $subscription)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{  ucfirst($subscription->user->name) ?? 'N/A' }}</td>
                                    <td>{{  ucfirst($subscription->plan->name) ?? 'N/A' }}</td>
                                    <!-- <td>
                                        <span class="badge bg-{{ $subscription->status === 'active' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($subscription->status) }}
                                        </span>
                                    </td> -->
                        
                                   <td>
    @if ($subscription->status === 'pending')
        <span class="badge bg-warning text-dark">Pending</span>
        <button class="btn btn-sm btn-primary mt-1 activate-subscription" data-id="{{ $subscription->id }}">
            Activate
        </button>
    
    @elseif ($subscription->status === 'active')
        <span class="badge bg-success">Active</span>

    @elseif ($subscription->status === 'expired')
        <span class="badge bg-secondary">Expired</span>

    @elseif ($subscription->status === 'cancelled')
        <span class="badge bg-danger">Cancelled</span>

    @else
        <span class="badge bg-light text-dark">Unknown</span>
    @endif
</td>

                                    <td>
                                       <span class="badge bg-{{ ($subscription->payment->status ?? '') === 'SUCCESS' ? 'success' : 'danger' }}">
                                          {{ $subscription->payment->status ?? 'N/A' }}
                                       </span>
                                    </td>
                                    <td>{{ ucfirst(optional($subscription->payment)->mode ?? 'N/A') }}</td>
                                    <td>{{ $subscription->start_date }}</td>
                                    <td>{{ $subscription->end_date }}</td>
                                    <td>{{ $subscription->payment->payment_id ?? '-' }}</td>
                                    <td>{{ $subscription->payment->paid_price ?? '-' }}</td>
                                    <td>{{ $subscription->created_at->format('d M Y, h:i A') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Custom Confirm Modal -->
<div id="customConfirmModal" class="custom-modal-overlay" style="display: none;">
    <div class="custom-modal">
        <h4>Confirm Action</h4>
        <p>Are you sure you want to activate this subscription?</p>
        <div class="modal-actions">
            <button class="btn btn-sm btn-secondary" id="cancelBtn">Cancel</button>
            <button class="btn btn-sm btn-primary" id="confirmBtn">Yes</button>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        let subscriptionIdToActivate = null;
        let $buttonToUpdate = null;

        $('.activate-subscription').on('click', function () {
            subscriptionId = $(this).data('id');
            $buttonToUpdate = $(this);
            $('#customConfirmModal').fadeIn();
        });

        $('#cancelBtn').on('click', function () {
            $('#customConfirmModal').fadeOut();
            subscriptionId = null;
            $buttonToUpdate = null;
        });

        $('#confirmBtn').on('click', function () {
            if (!subscriptionId) return;

            const $messageBox = $('#subscription-message');

            $.ajax({
                url: '/admin/subscriptions/' + subscriptionId + '/activate',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        $buttonToUpdate.closest('td').html('<span class="badge bg-success">Active</span>');
                        $messageBox
                            .removeClass('d-none alert-danger')
                            .addClass('alert-success')
                            .text('Subscription activated successfully');
                    } else {
                         $messageBox
                            .removeClass('d-none alert-success')
                            .addClass('alert-danger')
                            .text(response.message || 'Activation failed.');
                    }
                },
                error: function () {
                    $messageBox
                        .removeClass('d-none alert-success')
                        .addClass('alert-danger')
                        .text('Something went wrong. Please try again.');
                },
                complete: function () {
                    $('#customConfirmModal').fadeOut();
                    subscriptionId = null;
                    $buttonToUpdate = null;

                    // Optional: hide after 5 seconds
                    setTimeout(() => {
                        $messageBox.addClass('d-none').removeClass('alert-success alert-danger').text('');
                    }, 5000);
                }
            });
        });
    });
</script>

<script>
     $('#subscriptions-list').DataTable({  
      dom: 'Bfrtip',
      buttons: [
         {
               extend: 'csvHtml5',
               text: 'Download CSV',
               title: 'All_Subscriptions',
               exportOptions: {
                  columns: [0, 1, 2, 4, 5, 6, 7, 8, 9, 10]
               }
         }
      ],
   });

</script>
@endsection


   




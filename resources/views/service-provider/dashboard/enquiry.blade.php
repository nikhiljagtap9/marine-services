@extends('service-provider.dashboard.main')

@section('content')
<style type="text/css">
    a.inq_activ {
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
        <div class="card">
            <div class="card-header position-relative">
                <h6 class="fs-17 fw-semi-bold my-1">Total Inquiry's</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless text-nowrap category-list">
                        <thead>
                            <tr>
                                <th>SR</th>
                                <th>Company Name</th>
                                <th>User Name</th>
                                <th>Company Email ID</th>
                                <th>Comment</th>
                                <th>Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($enquiries as $index=> $enquiry)
                            <tr>
                                <th>{{ $index + 1 }}</th>
                                <td>{{ $enquiry->company_name }}</td>
                                <td>{{ $enquiry->your_name }}</td>
                                <td>{{ $enquiry->email }}</td>
                                <td class="comtns_td">
                                    {{ $enquiry->comment }}
                                </td>
                                <td class="comtns_img">
                                    @if($enquiry->photo)
                                    <img src="{{ asset('storage/' . $enquiry->photo) }}">
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">No enquiries found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
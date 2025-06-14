@extends('user.dashboard.main')

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
      <div class="card">
         <div class="card-header position-relative">
            <h6 class="fs-17 fw-semi-bold my-1">Total Quote</h6>
         </div>
         <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless text-nowrap category-list">
                    <thead>
                        <tr>
                            <th>SR</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th class="text-end">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quotes as $index => $quote)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $quote->company_name }}</td>
                                <td>
                                    @php
                                        $catNames = [];
                                        if (is_array($quote->category_id)) {
                                            foreach ($quote->category_id as $catId) {
                                                if (isset($categories[$catId])) {
                                                    $catNames[] = $categories[$catId];
                                                }
                                            }
                                        }
                                    @endphp
                                    {{ implode(', ', $catNames) ?: 'N/A' }}
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('user-quote.detail', $quote->id) }}" target="_blank" class="btn btn-primary fw-medium btn-sm d-inline-flex align-items-center justify-content-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                        View
                                    </a>
                                </td>
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
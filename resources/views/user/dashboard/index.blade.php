@extends('user.dashboard.main')

@section('content')
<style type="text/css">
   a.index_activ {
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
      <div class="card mb-3 p-4 total-box">
         <div class="g-4 gx-xxl-5 row">
            <div class="col-sm-4 total-box-left">
               <div class="align-items-center d-flex justify-content-between mb-4">
                  <h6 class="mb-0">Total Favorites</h6>
                  <div class="align-items-center d-flex justify-content-center rounded arrow-btn percentage-increase">
                     <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                     </svg>
                  </div>
               </div>
               <h1 class="price"><span class="counter">120</span><span class="fs-13 ms-1 text-muted">(Business)</span></h1>
            </div>
            <div class="col-sm-4 total-box-left">
               <div class="align-items-center d-flex justify-content-between mb-4">
                  <h6 class="mb-0">Total Quotes Received</h6>
                  <div class="align-items-center d-flex justify-content-center rounded arrow-btn percentage-increase">
                     <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-text">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                        <path d="M9 12h6" />
                        <path d="M9 16h6" />
                     </svg>
                  </div>
               </div>
               <h1 class="price counter">{{$totalQuotes}}</h1>
            </div>
            <div class="col-sm-4 total-box__right">
               <div class="align-items-center d-flex justify-content-between mb-4">
                  <h6 class="mb-0">TOTAL REVIEWS SUBMITTED </h6>
                  <div class="align-items-center d-flex justify-content-center rounded arrow-btn percentage-increase">
                     <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-star">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                     </svg>
                  </div>
               </div>
               <h1 class="price counter">{{$totalReview}}</h1>
            </div>
         </div>
      </div>
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
                        <!-- <th>Logo</th> -->
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
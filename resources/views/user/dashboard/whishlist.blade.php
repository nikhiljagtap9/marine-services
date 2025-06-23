@extends('user.dashboard.main')

@section('content')
<style type="text/css">
a.wish_activ {
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
      <div class="align-items-end row g-4 mb-4" data-aos="fade-down">
         <div class="col">
            <!-- start section header -->
            <div class="section-header">
               <!-- start subtitle -->
               <div class="font-caveat fs-4 fw-bold fw-medium section-header__subtitle text-capitalize text-center text-primary text-xl-start">Favourite</div>
               <!-- end /. subtitle -->
               <!-- start title -->
               <h2 class="fw-semibold mb-0 section-header__title text-capitalize text-center text-xl-start h3">Favourite Listings</h2>
               <!-- end /. title -->
               <!-- start description -->
               <!-- end /. description -->
            </div>
            <!-- end /. section header -->
         </div>
      </div>
      <!-- start card list -->
      @foreach ($whishlist as $item)
    @php
        $subscription = $item->subscription;
        $userId = $subscription?->user_id;
        $provider = $providerDetails[$userId] ?? null;
        $reviews = $subscription?->serviceReviews ?? collect();
        $avgRating = $reviews->avg('rating');
        $companyName = ucWords($provider?->company_name);
        $phone = $provider?->phone ?? '';
        $categories = $provider?->portServiceDetails->pluck('category.name')->unique();
        $logo = Storage::url($provider->company_logo);
    @endphp

    <div class="border-0 card card-hover flex-fill overflow-hidden rounded-3 shadow-sm w-100 card-hover-bg mb-3">
        <a href="#" class="stretched-link"></a>
        <div class="card-body p-0">
            <div class="g-0 h-100 row">
                <div class="col-lg-3 col-md-5 col-sm-4 col-xxl-2 position-relative">
                    <div class="card-image-hover dark-overlay h-100 overflow-hidden position-relative">
                        <img src="{{ asset($logo) }}" alt="" class="h-100 w-100 object-fit-cover">
                    </div>
                </div>
                <div class="col-lg-9 col-md-7 col-sm-8 col-xxl-10 p-3 p-lg-4 p-md-3 p-sm-4">
                    <div class="d-flex flex-column h-100">
                        <div class="d-flex end-0 gap-2 me-3 mt-3 position-absolute top-0 z-1">
                            <a href="" class="align-items-center bg-light btn-icon d-flex justify-content-center rounded-circle text-primary" data-bs-toggle="tooltip" title="Remove">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </div>

                        <div class="d-flex align-items-center gap-1 text-primary card-start mb-2">
                            <i class="fa-solid fa-star"></i>
                            <span class="fw-medium text-primary">
                                <span class="fs-6 fw-semibold me-1">({{ number_format($avgRating, 1) ?? '0.0' }})</span>
                            </span>
                        </div>

                        <h4 class="fs-18 fw-semibold mb-0">
                            <span>{{ $companyName }}</span>
                            @if($provider?->companyDetail?->is_verified)
                                <i class="bi bi-patch-check-fill text-success"></i>
                            @endif
                        </h4>

                        <p class="mt-1 fs-14 text-muted">
                            @foreach($categories as $cat)
                                <span class="ctgry_m"><i class="fa fa-ship" aria-hidden="true"></i> {{ $cat }}</span>
                            @endforeach
                        </p>

                       <div class="d-flex flex-wrap gap-3 gap-lg-2 gap-xl-3 mt-auto z-1">
                            @if($phone)
                                <a href="tel:{{ $phone }}" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#9b9b9b" class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                    </svg>
                                    <span>{{ substr($phone, 0, -4) . '****' }}</span>
                                </a>
                            @endif

                            <a href="#" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9b9b9b" class="bi bi-compass" viewBox="0 0 16 16">
                                    <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                                    <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z" />
                                </svg>
                                <span>Directions</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
      
      <!-- end /. card list -->
      <nav class="justify-content-center mt-4 pagination align-items-center">
         <a class="prev page-numbers" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
               <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
            </svg>
            previous
         </a>
         <span class="page-numbers current">1</span>
         <a class="page-numbers" href="#">2</a>
         <a class="next page-numbers" href="#">
            next
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
               <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
            </svg>
         </a>
      </nav>
      <!-- <div class="mt-4 d-flex justify-content-center">
        {{ $whishlist->links('vendor.pagination.bootstrap-4') }}
</div> -->

   </div>
</div>
@endsection
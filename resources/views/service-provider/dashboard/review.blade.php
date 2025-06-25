@extends('service-provider.dashboard.main')

@section('content')
<style type="text/css">
a.revw_activ {
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
                                <h6 class="fs-17 fw-semi-bold my-1">Submited Reviews</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                   @forelse($reviews as $review)
                                    <div class="d-flex mb-4 border-bottom pb-4">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('storage/' . $provider->serviceProviderDetail->company_logo) }}" alt="..." height="70" width="70" class="object-fit-cover rounded-circle">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <div class="comment-header d-flex flex-wrap gap-2 mb-3">
                                                <div>
                                                    <h4 class="fs-18 mb-0">- {{ ucwords($review->vessel_company_name) }}</h4>
                                                    <div class="comment-datetime fs-12 text-muted">
                                                        {{ \Carbon\Carbon::parse($review->created_at)->format('d M Y \a\t h:i a') }}
                                                    </div>
                                                </div>
                                                <!-- start rating -->
                                                <div class="d-flex align-items-center gap-2 ms-auto">
                                                    <div class="d-flex align-items-center text-primary rating-stars">
                                                        @php
                                                            $fullStars = floor($review->rating);
                                                            $halfStar = $review->rating - $fullStars >= 0.5;
                                                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                                        @endphp

                                                        @for($i = 0; $i < $fullStars; $i++)
                                                            <i class="fa fa-star text-warning"></i>
                                                        @endfor
                                                        @if($halfStar)
                                                            <i class="fa fa-star-half-o text-warning"></i>
                                                        @endif
                                                        @for($i = 0; $i < $emptyStars; $i++)
                                                            <i class="fa fa-star-o text-warning"></i>
                                                        @endfor
                                                    </div>
                                                    <span class="fs-14 fw-semibold rating-points">{{ number_format($review->rating, 1) }}/5</span>
                                                </div>
                                                <!-- end /. rating -->
                                            </div>
                                            <div class="fs-15">
                                                {{ $review->comment ?? 'No comments provided.' }}
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        <div class="alert alert-info">
                                            No reviews yet!
                                        </div>
                                    @endforelse    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
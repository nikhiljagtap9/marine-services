@forelse($reviews as $review)
    <div class="d-flex mb-4 border-bottom pb-4">
        <div class="flex-shrink-0">
            <img src="{{ asset('assets/images/avatar/01.jpg') }}" alt="..." height="70" width="70" class="object-fit-cover rounded-circle">
        </div>
        <div class="flex-grow-1 ms-4">
            <div class="comment-header d-flex flex-wrap gap-2 mb-3">
                <div>
                    <h4 class="fs-18 mb-0">- {{ $review->vessel_company_name ?? 'Anonymous' }}</h4>
                    <div class="comment-datetime fs-12 text-muted">{{ \Carbon\Carbon::parse($review->created_at)->format('d M Y \a\t h:i a') }}</div>
                </div>
                <div class="d-flex align-items-center gap-2 ms-auto">
                    <div class="d-flex align-items-center text-primary rating-stars">
                        @php
                            $fullStars = floor($review->rating);
                            $halfStar = $review->rating - $fullStars >= 0.5;
                        @endphp
                        @for($j = 0; $j < 5; $j++)
                            @if($j < $fullStars)
                                <i class="fa-star-icon"></i>
                            @elseif($j == $fullStars && $halfStar)
                                <i class="fa-star-icon half"></i>
                            @else
                                <i class="fa-star-icon none"></i>
                            @endif
                        @endfor
                    </div>
                    <span class="fs-14 fw-semibold rating-points">{{ number_format($review->rating, 1) }}/5</span>
                </div>
            </div>
            <div class="fs-15">{{ $review->comment }}</div>
        </div>
    </div>
@empty
    <div class="text-muted">No reviews found.</div>
@endforelse

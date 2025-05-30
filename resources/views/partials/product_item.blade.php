@foreach($products as $provider)
    @php
        $photos = json_decode($provider->companyDetail->photos ?? '[]', true);
        $logo = $provider->company_logo ?? null;
        $slogan = $provider->companyDetail->slogan ?? '';
        $about = $provider->companyDetail->about ?? '';
        $masked;
        if ($provider && $provider->phone) {
            $masked = substr($provider->phone, 0, 6) . '• • • •';
        } 
    @endphp
    <div class="hotel-item product-item" data-lat="18.5404" data-lng="73.8527">
        <div class="card rounded-3 border-0 shadow-sm w-100 flex-fill overflow-hidden card-hover flex-fill w-100 card-hover-bg">
        <!-- Card Image Wrap with Slider -->
        <a href="{{route('detail')}}" target="_blank" class="card-img-wrap card-image-hover overflow-hidden dark-overlay">
            <!-- Bootstrap Carousel -->
            <div id="hotelCarousel{{ $provider->id }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @if (!empty($photos))
                    @foreach ($photos as $index => $photo)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $photo) }}" class="d-block w-100" alt="Photo {{ $index + 1 }}">
                        </div>
                    @endforeach
                    @else
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/images/place/01.jpg')}}" class="d-block w-100" alt="Default Image">
                    </div>
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#hotelCarousel01" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#hotelCarousel01" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="bg-blur card-badge d-inline-block position-absolute start-0 text-white z-2">
                <i class="fa-solid fa-star"></i> <!-- Best Company of the Month -->
                Top Rated 
            </div>
        </a>
        <div class="d-flex end-0 gap-2 me-3 mt-3 position-absolute top-0 z-1">
            <div class="align-items-center bg-blur btn-icon d-flex justify-content-center rounded-circle shadow-sm text-white" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Favorites">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"></path>
                </svg>
            </div>
        </div>
        <div class="d-flex flex-column h-100 position-relative p-3">
            <a href="{{route('detail')}}" target="_blank" class="view_list">View</a>
            <h4 class="fs-18 fw-semibold mb-0">
                <a href="{{route('detail')}}" target="_blank">{{ $provider->company_name }}</a>
            </h4>
            <div class="rating_sastar">
                <span class="str_count" >4.2</span>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-half-o" aria-hidden="true"></i>

                <div class="comnts_wrp">
                    <i class="fa fa-comment" aria-hidden="true"></i>
                    <div class="comts_text">120 Reviews</div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <img src="{{ !empty($logo) ? asset('storage/' . $logo) : asset('assets/images/dummy_logo.jpg') }}" class="logo_ship" alt="Company Logo">
            <div class="catgry_wrp">
                @foreach($provider->portServiceDetails as $portService)
                    @foreach($portService->subServiceModels() as $sub)
                    <div class="singl_cat">
                            <i class="fa fa-ship" aria-hidden="true"></i>
                            <div class="singl_name">{{ $sub->name }}</div>
                            <div class="clear"></div>
                    </div>
                    @endforeach
                @endforeach
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div class="d-flex flex-wrap gap-3 mt-2 z-1">
                <a href="tel:+" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#9b9b9b" class="bi bi-telephone" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg>
                    <span>{{ $masked }}</span>
                </a>
                <a href="#" class="d-flex gap-2 align-items-center fs-13 fw-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#9b9b9b" class="bi bi-compass" viewBox="0 0 16 16">
                    <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                    <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z" />
                    </svg>
                    <span>Directions</span>
                </a>
            </div>
        </div>
        <div class="reqs_qut">
            <label for="quoteOption">
                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                <div class="req_text">Request a Quote</div>
            </label>
            <input type="checkbox" name="quoteSelection" id="quoteOption" class="reqs_cls" value="quote">
        </div>
        <div class="clear"></div>
        </div>
    </div>
@endforeach
   
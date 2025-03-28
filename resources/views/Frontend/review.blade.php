@extends('Frontend.app')
@section('content')

<!--==============================
Breadcrumb Area  
==============================-->
<div class="breadcumb-wrapper" data-bg-src="{{ URL::to('frontend/assets/img/bg/breadcumb-bg.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Customer Reviews</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>Reviews</li>
            </ul>
        </div>
    </div>
</div>

<!--==============================
Review Submission Area  
==============================-->

<div class="mt-5" id="review-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="title-area text-center mb-3">
                    <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Share Your Experience</span>
                    <div class="text-center mb-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal">
                            Leave a Review
                        </button>
                    </div>                    
                        <p class="sec-text">We value your feedback! Please share your experience with our cleaning services.</p>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>


<div class="section-divider"></div>
<!-- Review Modal -->
<div class="modal fade mt-5" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Share Your Experience</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('customer.review.store')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        
                        <!-- Rating Section -->
                        <div class="col-12 text-center">
                            <label class="d-block mb-2">Your Rating</label>
                            <div class="rating-input d-inline-block">
                                <input type="radio" id="star5" name="rating" value="5" required class="d-none">
                                <label for="star5" class="fs-3 px-0 cursor-pointer"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star4" name="rating" value="4" class="d-none">
                                <label for="star4" class="fs-3 px-0 cursor-pointer"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star3" name="rating" value="3" class="d-none">
                                <label for="star3" class="fs-3 px-0 cursor-pointer"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star2" name="rating" value="2" class="d-none">
                                <label for="star2" class="fs-3 px-0 cursor-pointer"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star1" name="rating" value="1" class="d-none">
                                <label for="star1" class="fs-3 px-0 cursor-pointer"><i class="fas fa-star"></i></label>
                            </div>
                        </div>

                        <!-- Name & Email -->
                        <div class="col-md-6">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                        </div>

                        <!-- Review Title -->
                        <div class="col-12">
                            <label for="title">Review Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Review Title" required>
                        </div>

                        <!-- Review Content -->
                        <div class="col-12">
                            <label for="content">Your Review</label>
                            <textarea class="form-control" id="content" name="content" placeholder="Your Review" rows="5" required></textarea>
                        </div>

                        <!-- Modal Footer (Submit + Close Buttons) -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Submit Review <i class="fas fa-paper-plane ms-2"></i></button>
                        </div>

                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<!--==============================
Testimonials Area  
==============================-->
<section class="space-bottom" id="testimonials-sec">
    <div class="container">
        <div class="title-area text-center mb-5">
            <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Customer Feedback</span>
            <h2 class="sec-title">What Our Clients Say</h2>
        </div>
        <div class="row mb-3">
            <div class="col-md-auto">
                <form method="GET" action="{{ route('customer.review') }}" class="d-flex align-items-center">
                    <label for="sort" class="me-2">Sort By:</label>
                    <select name="sort" id="sort" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
                        <option value="newest" {{ request('sort', 'newest') == 'newest' ? 'selected' : '' }}>Newest First</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                    </select>
                </form>
            </div>
            <div class="col-md-auto">
                <form method="GET" action="{{ route('customer.review') }}" class="d-flex align-items-center">
                    <label for="rating" class="me-2">Filter by Rating:</label>
                    <select name="rating" id="rating" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
                        <option value="">All Ratings</option>
                        <option value="5" {{ request('rating') == 5 ? 'selected' : '' }}>5 Stars</option>
                        <option value="4" {{ request('rating') == 4 ? 'selected' : '' }}>4 Stars</option>
                        <option value="3" {{ request('rating') == 3 ? 'selected' : '' }}>3 Stars</option>
                        <option value="2" {{ request('rating') == 2 ? 'selected' : '' }}>2 Stars</option>
                        <option value="1" {{ request('rating') == 1 ? 'selected' : '' }}>1 Star</option>
                    </select>
                </form>
            </div>
        </div>
        
        

        
        <div class="row g-4">
            @foreach ($reviews as $review)
                <div class="col-12">
                    <div class="bg-white p-4 rounded-3 shadow-sm transition-all hover-shadow hover-transform-up">
                        <div class="d-flex align-items-start">
                            
                            {{-- Left Side: Customer Name & Date (Fixed Width) --}}
                            <div class="flex-shrink-0 text-start" style="width: 180px;">
                                <h4 class="h6 text-dark mb-1">{{ $review->customer->name }}</h4>
                                <span class="text-muted small">
                                    {{ $review->created_at ? $review->created_at->format('F j, Y') : 'N/A' }}
                                </span>
                                
                            </div>
        
                            {{-- Middle Side: Stars, Review & Description (Takes All Remaining Space) --}}
                            <div class="flex-grow-1 ps-3 me-5">
                                <div class="text-warning mb-2">
                                    @for ($i = 1; $i <= $review->rating; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                                <h3 class="h6 text-dark mb-2">{{ ucfirst($review->review ?? '') }}</h3>
                                <p class="text-secondary small mb-0">
                                    "The team at 3 Maids Cleaners transformed my kitchen into a spotless haven! Their online booking was a breeze, and the SMS reminders kept me on track. Highly recommend their professional service!"
                                </p>
                            </div>
        
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
           
    
    </div>
</section>

<!--==============================
CTA Area  
==============================-->
<section class="space my-5" data-bg-src="{{ URL::to('frontend/assets/img/bg/cta_bg_1Copy.jpg') }}">
    <div class="shape-mockup starani" data-top="5%" data-left="40%">
        <img src="{{ URL::to('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="shape">
    </div>
    <div class="shape-mockup starani" data-bottom="22%" data-left="12%">
        <img src="{{ URL::to('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="shape">
    </div>
    <div class="shape-mockup starani" data-top="45%" data-right="6%">
        <img src="{{ URL::to('frontend/assets/img/shape/vector_shape_4.svg') }}" alt="shape">
    </div>
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-7 col-md-9">
                <div class="title-area text-center mb-4">
                    <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Any Help?</span>
                    <h2 class="sec-title text-white">Need Professional Cleaning for Your Home?</h2>
                </div>
                <h3 class="call-1 mb-n2"><a href="tel:+16102458976"><i class="fa-solid fa-headset"></i> +1 (610) 245-8976</a></h3>
            </div>
        </div>
    </div>
</section>

@endsection

@section('styles')
<style>
    /* Minimal custom CSS needed for star rating functionality */
    /* .rating-input {
        direction: rtl;
        unicode-bidi: bidi-override;
    }
    
    .rating-input input:checked ~ label,
    .rating-input label:hover,
    .rating-input label:hover ~ label {
        color: #ffc107;
    }
    
    .hover-shadow {
        transition: box-shadow 0.3s ease;
    }
    
    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    
    .hover-transform-up {
        transition: transform 0.3s ease;
    }
    
    .hover-transform-up:hover {
        transform: translateY(-0.25rem);
    }
    
    .cursor-pointer {
        cursor: pointer;
    } */
    .rating-input {
        direction: rtl;
        unicode-bidi: bidi-override;
    }
    
    .rating-input input:checked ~ label,
    .rating-input label:hover,
    .rating-input label:hover ~ label {
        color: #ffc107;
    }
    
    .cursor-pointer {
        cursor: pointer;
    }
    
    /* Remove any default spacing between stars */
    .rating-input label {
        margin: 0;
    }
    input[type="radio"] ~ label::before {
        
    content: "\f111";
    display: none;
    /* position: absolute; */
    font-family: var(--icon-font);
    left: 0;
    top: -2px;
    width: 1px !important;
    height: 0px !important;
    padding-left: 0;
    font-size: 0.6em;
    line-height: 19px;
    text-align: center;
    border: 1px solid var(--theme-color);
    border-radius: 100%;
    font-weight: 700;
    background: var(--white-color);
    color: transparent;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
</style>
@endsection
@extends('Frontend.app')
@section('content')

<!--==============================
Breadcrumb Area  
==============================-->
<div class="breadcumb-wrapper" data-bg-src="{{ URL::to('frontend/assets/img/bg/breadcumb-bg.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</div>

<!--==============================
About Area  
==============================-->
<div class="z-index-common overflow-hidden space" id="about-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 mb-30 mb-xl-0">
                <div class="img-box1">
                    <div class="img1">
                        <img src="{{ URL::to('frontend/assets/img/normal/about_1_1_1.jpg') }}" alt="About">
                    </div>
                    <div class="right-half">
                        <div class="feature-circle">
                            <div class="progressbar">
                                <div class="circle" data-percent="100">
                                    <div class="circle-num"></div>
                                </div>
                                <h3 class="box-title">Customer Satisfaction</h3>
                            </div>
                        </div>
                        <div class="img2">
                            <img src="{{ URL::to('frontend/assets/img/normal/about_1_2_1.jpg') }}" alt="About">
                        </div>
                    </div>
                    <div class="box-shape spin">
                        <img src="{{ URL::to('frontend/assets/img/shape/vector_shape_2.png') }}" alt="img">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="title-area mb-32">
                    <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">About Us</span>
                    <h2 class="sec-title">Your Trusted Partner in <span class="text-theme">Cleaning</span></h2>
                    <p class="sec-text">
                        At <strong>3 Maids Cleaners</strong>, we’re more than just a cleaning service—we’re your <strong>partners in creating a healthier, more comfortable home</strong>.  
                    
                        With <strong>years of experience</strong>, we’ve honed our expertise in <strong>kitchen and bedroom cleaning</strong>, transforming these essential spaces into <strong>spotless havens</strong>. <br>
                        Our mission is to <strong>take the hassle out of maintaining a clean home</strong>, offering <strong>tailored services</strong> that fit your lifestyle.  
                    
                        Whether it’s <strong>scrubbing kitchen counters to a shine</strong> or <strong>refreshing your bedroom for a restful retreat</strong>, we use <strong>eco-friendly products</strong> to ensure <strong>safety for your family and pets</strong>.  
                    <ul>
                        <li>

                            <strong>What sets us apart?</strong><br>
                        </li>
                       <li>
                        <strong>Convenient online booking</strong><br>
                        </li> 
                        <li>

                            <strong>Secure payment options</strong><br>
                        </li>
                        <li>

                            <strong>Automatic follow-ups to keep your home consistently clean</strong><br>
                        </li>
                    <li>

                        <strong>Trust us to deliver exceptional results—every time!</strong>
                    </li>
                    </ul>
                    </p>
                     </div>
                {{-- <div class="btn-group">
                    <a href="{{ URL::to('/about') }}" class="th-btn">More Details<i class="fas fa-arrow-up-right ms-2"></i></a>
                    <div class="about-signature">
                        <div class="box-img">
                            <img src="{{ URL::to('frontend/assets/img/normal/about_author.jpg') }}" alt="Image">
                        </div>
                        <div class="signature">
                            <img src="{{ URL::to('frontend/assets/img/normal/about_signature.jpg') }}" alt="Image">
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

<!--==============================
Brand Area  
==============================-->
{{-- <div class="space-bottom">
    <div class="shape-mockup moving d-none d-xl-block" data-bottom="0%" data-right="0%">
        <img src="{{ URL::to('frontend/assets/img/shape/vector_shape_3 - Copy.png') }}" alt="shape">
    </div>
    <div class="container">
        <div class="swiper th-slider" id="brandSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"420":{"slidesPerView":"3"},"768":{"slidesPerView":"4"},"992":{"slidesPerView":"5"},"1200":{"slidesPerView":"6"},"1400":{"slidesPerView":"6"}}}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="brand-card">
                        <img src="{{ URL::to('frontend/assets/img/brand/brand_1_1.svg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card">
                        <img src="{{ URL::to('frontend/assets/img/brand/brand_1_2.svg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card">
                        <img src="{{ URL::to('frontend/assets/img/brand/brand_1_3.svg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card">
                        <img src="{{ URL::to('frontend/assets/img/brand/brand_1_4.svg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card">
                        <img src="{{ URL::to('frontend/assets/img/brand/brand_1_5.svg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card">
                        <img src="{{ URL::to('frontend/assets/img/brand/brand_1_6.svg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card">
                        <img src="{{ URL::to('frontend/assets/img/brand/brand_1_1.svg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card">
                        <img src="{{ URL::to('frontend/assets/img/brand/brand_1_2.svg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card">
                        <img src="{{ URL::to('frontend/assets/img/brand/brand_1_3.svg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card">
                        <img src="{{ URL::to('frontend/assets/img/brand/brand_1_4.svg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card">
                        <img src="{{ URL::to('frontend/assets/img/brand/brand_1_5.svg') }}" alt="Brand Logo">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card">
                        <img src="{{ URL::to('frontend/assets/img/brand/brand_1_6.svg') }}" alt="Brand Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!--==============================
CTA Area  
==============================-->
<section class="space" data-bg-src="{{ URL::to('frontend/assets/img/bg/cta_bg_1Copy.jpg') }}">
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
                <div class="title-area text-center mb-35">
                    <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Any Help?</span>
                    <h2 class="sec-title text-white">Need Professional Cleaning for Your Home?</h2>
                </div>
                <h3 class="call-1 mb-n2"><a href="tel:+16102458976" style="color: lightblue"><i class="fa-solid fa-headset"></i> +1 (610) 245-8976</a></h3>
            </div>
        </div>
    </div>
</section>

<!--==============================
Team Area  
==============================-->
{{-- <section class="bg-top-center space" id="team-sec">
    <div class="container z-index-common">
        <div class="row justify-content-lg-between justify-content-center align-items-end">
            <div class="col-lg">
                <div class="title-area text-center text-lg-start">
                    <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg') }}" alt="shape">Our Team</span>
                    <h2 class="sec-title">Meet Our Cleaning Experts</h2>
                </div>
            </div>
            <div class="col-lg-auto mt-n3 mt-lg-0">
                <div class="sec-btn">
                    <a href="{{ URL::to('/about') }}" class="th-btn">All Members<i class="fas fa-arrow-up-right ms-2"></i></a>
                </div>
            </div>
        </div>
        <div class="swiper th-slider has-shadow" id="teamSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="th-team team-card">
                        <div class="box-img">
                            <img src="{{ URL::to('frontend/assets/img/team/team_1_1.jpg') }}" alt="Team">
                        </div>
                        <div class="box-content">
                            <div class="media-body">
                                <h3 class="box-title"><a href="#">Nova Midnight</a></h3>
                                <span class="box-desig">Cleaning Specialist</span>
                            </div>
                            <div class="team-social">
                                <button class="icon-btn"><i class="far fa-plus"></i></button>
                                <div class="th-social">
                                    <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="th-team team-card">
                        <div class="box-img">
                            <img src="{{ URL::to('frontend/assets/img/team/team_1_2.jpg') }}" alt="Team">
                        </div>
                        <div class="box-content">
                            <div class="media-body">
                                <h3 class="box-title"><a href="#">Jospher Fros</a></h3>
                                <span class="box-desig">Cleaning Specialist</span>
                            </div>
                            <div class="team-social">
                                <button class="icon-btn"><i class="far fa-plus"></i></button>
                                <div class="th-social">
                                    <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="th-team team-card">
                        <div class="box-img">
                            <img src="{{ URL::to('frontend/assets/img/team/team_1_3.jpg') }}" alt="Team">
                        </div>
                        <div class="box-content">
                            <div class="media-body">
                                <h3 class="box-title"><a href="#">Isabella Ember</a></h3>
                                <span class="box-desig">Cleaning Specialist</span>
                            </div>
                            <div class="team-social">
                                <button class="icon-btn"><i class="far fa-plus"></i></button>
                                <div class="th-social">
                                    <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="th-team team-card">
                        <div class="box-img">
                            <img src="{{ URL::to('frontend/assets/img/team/team_1_4.jpg') }}" alt="Team">
                        </div>
                        <div class="box-content">
                            <div class="media-body">
                                <h3 class="box-title"><a href="#">Gabriel Turner</a></h3>
                                <span class="box-desig">Cleaning Specialist</span>
                            </div>
                            <div class="team-social">
                                <button class="icon-btn"><i class="far fa-plus"></i></button>
                                <div class="th-social">
                                    <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="th-team team-card">
                        <div class="box-img">
                            <img src="{{ URL::to('frontend/assets/img/team/team_1_5.jpg') }}" alt="Team">
                        </div>
                        <div class="box-content">
                            <div class="media-body">
                                <h3 class="box-title"><a href="#">Benjamin Davis</a></h3>
                                <span class="box-desig">Cleaning Specialist</span>
                            </div>
                            <div class="team-social">
                                <button class="icon-btn"><i class="far fa-plus"></i></button>
                                <div class="th-social">
                                    <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="th-team team-card">
                        <div class="box-img">
                            <img src="{{ URL::to('frontend/assets/img/team/team_1_6.jpg') }}" alt="Team">
                        </div>
                        <div class="box-content">
                            <div class="media-body">
                                <h3 class="box-title"><a href="#">Ava Dankin</a></h3>
                                <span class="box-desig">Cleaning Specialist</span>
                            </div>
                            <div class="team-social">
                                <button class="icon-btn"><i class="far fa-plus"></i></button>
                                <div class="th-social">
                                    <a target="_blank" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a target="_blank" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a target="_blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<!--==============================
Process Area  
==============================-->
<section class="space-bottom mt-5">
    <div class="shape-mockup spin d-none d-lg-block" data-top="11%" data-left="-200px">
        <img src="{{ URL::to('frontend/assets/img/shape/vector_shape_8.png') }}" alt="shape">
    </div>
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Work Process</span>
            <h2 class="sec-title">How We Work</h2>
        </div>
        <div class="process-card-wrap">
            <div class="process-card">
                <div class="box-img">
                    <img src="{{ URL::to('frontend/assets/img/normal/process-1.png') }}" alt="icon">
                </div>
                <h3 class="box-title">Book Online</h3>
                <p class="box-text">Use our easy online system to schedule your kitchen or bedroom cleaning.</p>
            </div>
            <div class="process-card">
                <div class="box-img">
                    <img src="{{ URL::to('frontend/assets/img/normal/process-2.png') }}" alt="icon">
                </div>
                <h3 class="box-title">Expert Cleaning</h3>
                <p class="box-text">Our trained team arrives to deliver top-quality cleaning tailored to your needs.</p>
            </div>
            <div class="process-card">
                <div class="box-img">
                    <img src="{{ URL::to('frontend/assets/img/normal/process-3.png') }}" alt="icon">
                </div>
                <h3 class="box-title">Enjoy Your Space</h3>
                <p class="box-text">Relax in a spotless, refreshed home with minimal effort on your part.</p>
            </div>
        </div>
    </div>
</section>
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
Testimonial Area  
==============================-->
<section class="space-bottom" id="testi-sec">
    <div class="container">
        <div class="testi-box-area">
            <div class="row g-0 flex-row-reverse">
                <div class="col-lg-5 order-2 order-lg-0">
                    <div class="testi-box-img">
                        <img src="{{ URL::to('frontend/assets/img/service/test.png')}}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="testi-box-slide">
                        <div class="title-area mb-40 text-center text-lg-start">
                            <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg')}}" alt="Icon">Testimonials</span>
                            <h2 class="sec-title">Client <span class="text-theme">Feedback</span></h2>
                        </div>
                        <div class="swiper th-slider" id="testiSlide2" data-slider-options='{"effect":"slide","thumbs":{"swiper":".testi-box-thumb"}}'>
                            <div class="swiper-wrapper">
                                @foreach($reviews as $review)
                            
                                <div class="swiper-slide">
                                    <div class="testi-box">
                                        <div class="box-review">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fa-sharp fa-{{ $i <= $review->rating ? 'solid' : 'regular' }} fa-star"></i>
                                            @endfor
                                        </div>
                                        <p class="box-text">"{{ $review->review_description ?? 'No review text available' }}"</p>
                                        <div class="box-profile">
                                            {{-- <div class="box-img">
                                                <img src="{{ $review->customer->profile_photo_path ? asset('storage/'.$review->customer->profile_photo_path) : URL::to('frontend/assets/img/testimonial/default-avatar.jpg') }}" alt="{{ $review->customer->name }}">
                                            </div> --}}
                                            <div class="media-body">
                                                <h3 class="box-title">{{ $review->customer->name }}</h3>
                                                <span class="box-desig">{{ $review->created_at ? $review->created_at->format('F Y') : 'Recent' }} Customer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                       
                        
                
                   
                    </div>
                    <div class="text-center mb-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal">
                            Leave a Review
                        </button>
                    </div>  
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
</section>

@endsection
@section('styles')
<style>

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
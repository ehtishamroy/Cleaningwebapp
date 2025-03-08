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
                        <img src="{{ URL::to('frontend/assets/img/normal/about_1_1.jpg') }}" alt="About">
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
                            <img src="{{ URL::to('frontend/assets/img/normal/about_1_2.jpg') }}" alt="About">
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
                    <p class="sec-text">At 3 Maids Cleaners, we’re more than just a cleaning service—we’re your partners in creating a healthier, more comfortable home. With years of experience, we’ve honed our expertise in kitchen and bedroom cleaning, transforming these essential spaces into spotless havens. Our mission is to take the hassle out of maintaining a clean home, offering tailored services that fit your lifestyle. Whether it’s scrubbing kitchen counters to a shine or refreshing your bedroom for a restful retreat, we use eco-friendly products to ensure safety for your family and pets. What sets us apart is our commitment to convenience: book your appointment online with ease, enjoy secure payment options, and let our automatic follow-up system keep your home consistently clean without lifting a finger. Trust us to deliver exceptional results every time.</p>
                </div>
                <div class="btn-group">
                    <a href="{{ URL::to('/about') }}" class="th-btn">More Details<i class="fas fa-arrow-up-right ms-2"></i></a>
                    <div class="about-signature">
                        <div class="box-img">
                            <img src="{{ URL::to('frontend/assets/img/normal/about_author.jpg') }}" alt="Image">
                        </div>
                        <div class="signature">
                            <img src="{{ URL::to('frontend/assets/img/normal/about_signature.jpg') }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--==============================
Brand Area  
==============================-->
<div class="space-bottom">
    <div class="shape-mockup moving d-none d-xl-block" data-bottom="0%" data-right="0%">
        <img src="{{ URL::to('frontend/assets/img/shape/tool_shape_5.png') }}" alt="shape">
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
</div>

<!--==============================
CTA Area  
==============================-->
<section class="space" data-bg-src="{{ URL::to('frontend/assets/img/bg/cta_bg_1.jpg') }}">
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
                <h3 class="call-1 mb-n2"><a href="tel:+16102458976"><i class="fa-solid fa-headset"></i> +1 (610) 245-8976</a></h3>
            </div>
        </div>
    </div>
</section>

<!--==============================
Team Area  
==============================-->
<section class="bg-top-center space" id="team-sec">
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
</section>

<!--==============================
Process Area  
==============================-->
<section class="space-bottom">
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
                    <img src="{{ URL::to('frontend/assets/img/normal/process_card_1.jpg') }}" alt="icon">
                </div>
                <h3 class="box-title">Book Online</h3>
                <p class="box-text">Use our easy online system to schedule your kitchen or bedroom cleaning.</p>
            </div>
            <div class="process-card">
                <div class="box-img">
                    <img src="{{ URL::to('frontend/assets/img/normal/process_card_2.jpg') }}" alt="icon">
                </div>
                <h3 class="box-title">Expert Cleaning</h3>
                <p class="box-text">Our trained team arrives to deliver top-quality cleaning tailored to your needs.</p>
            </div>
            <div class="process-card">
                <div class="box-img">
                    <img src="{{ URL::to('frontend/assets/img/normal/process_card_3.jpg') }}" alt="icon">
                </div>
                <h3 class="box-title">Enjoy Your Space</h3>
                <p class="box-text">Relax in a spotless, refreshed home with minimal effort on your part.</p>
            </div>
        </div>
    </div>
</section>

<!--==============================
Testimonial Area  
==============================-->
<section class="space-bottom" id="testi-sec">
    <div class="container">
        <div class="testi-box-area">
            <div class="row g-0 flex-row-reverse">
                <div class="col-lg-5 order-2 order-lg-0">
                    <div class="testi-box-img">
                        <img src="{{ URL::to('frontend/assets/img/testimonial/testi_2_1.jpg') }}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="testi-box-slide">
                        <div class="title-area mb-40 text-center text-lg-start">
                            <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg') }}" alt="Icon">Testimonials</span>
                            <h2 class="sec-title">Client <span class="text-theme">Feedback</span></h2>
                        </div>
                        <div class="swiper th-slider" id="testiSlide2" data-slider-options='{"effect":"slide","thumbs":{"swiper":".testi-box-thumb"}}'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testi-box">
                                        <div class="box-review">
                                            <i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i>
                                        </div>
                                        <p class="box-text">“The team at 3 Maids Cleaners transformed my kitchen into a spotless haven! Their online booking was a breeze, and the SMS reminders kept me on track. Highly recommend their professional service!”</p>
                                        <div class="box-profile">
                                            <div class="box-img">
                                                <img src="{{ URL::to('frontend/assets/img/testimonial/testi_1_1.jpg') }}" alt="image">
                                            </div>
                                            <div class="media-body">
                                                <h3 class="box-title">David Thompson</h3>
                                                <span class="box-desig">Homeowner</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testi-box">
                                        <div class="box-review">
                                            <i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-regular fa-star"></i>
                                        </div>
                                        <p class="box-text">“My bedroom has never felt so fresh! The automatic follow-up feature is a game-changer—I don’t even have to think about rebooking. 3 Maids Cleaners truly delivers!”</p>
                                        <div class="box-profile">
                                            <div class="box-img">
                                                <img src="{{ URL::to('frontend/assets/img/testimonial/testi_1_2.jpg') }}" alt="image">
                                            </div>
                                            <div class="media-body">
                                                <h3 class="box-title">Alexandra Miles</h3>
                                                <span class="box-desig">Busy Professional</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="icon-box">
                            <button data-slider-prev="#testiSlide2" class="slider-arrow default"><i class="far fa-arrow-left"></i></button>
                            <button data-slider-next="#testiSlide2" class="slider-arrow default"><i class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
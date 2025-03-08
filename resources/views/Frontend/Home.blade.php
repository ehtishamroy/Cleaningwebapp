@extends('Frontend.app')
@section('content')
    <div class="th-hero-wrapper hero-2" id="hero" data-bg-src="{{ URL::to('frontend/assets/img/hero/hero_bg_1_1.jpg')}}">
        <div class="hero-inner">
            <div class="container">
                <div class="hero-style2">
                    <h1 class="hero-title">
                        <span class="title1">3 Maids Cleaners</span>
                        <span class="title2">Your Trusted Cleaning Experts</span>
                    </h1>
                    <p class="sec-text text-white">Transform your home with our top-notch cleaning services! Enjoy spotless kitchens,<br> bedrooms, and more, with the convenience of online booking, secure payments, and automatic follow-ups.</p>
                    <a href="#" class="th-btn style3">Book Your Appointment Now<i class="fas fa-arrow-up-right ms-2"></i></a>
                </div>
            </div>
            <div class="hero-shape1">
                <img src="{{ URL::to('frontend/assets/img/hero/hero_shape_2_1.svg')}}" alt="shape">
            </div>
            <div class="hero-shape2">
                <img src="{{ URL::to('frontend/assets/img/hero/hero_shape_2_2.svg')}}" alt="shape">
            </div>
            <img src="{{ URL::to('frontend/assets/img/hero/bubble_3.png')}}" alt="bubble" class="bubble bubble_1">
            <img src="{{ URL::to('frontend/assets/img/hero/bubble_5.png')}}" alt="bubble" class="bubble bubble_2">
            <img src="{{ URL::to('frontend/assets/img/hero/bubble_4.png')}}" alt="bubble" class="bubble bubble_3">
            <img src="{{ URL::to('frontend/assets/img/hero/bubble_2.png')}}" alt="bubble" class="bubble bubble_4">
            <img src="{{ URL::to('frontend/assets/img/hero/bubble_5.png')}}" alt="bubble" class="bubble bubble_5">
        </div>
    </div>
    <!--======== / Hero Section ========-->
    <!--==============================
Service Area  
==============================-->
    <section class="space-top" id="service-sec">
        <div class="shape-mockup jump d-none d-xxl-block" data-top="15%" data-left="2%"><img src="{{ URL::to('frontend/assets/img/shape/vector_shape_1.png')}}" alt="shape"></div>
        <div class="shape-mockup jump-reverse" data-top="10%" data-right="0%"><img src="{{ URL::to('frontend/assets/img/shape/vector_shape_1.png')}}" alt="shape"></div>
        <div class="container">
            <div class="row justify-content-center align-items-end">
                <div class="col-lg-12">
                    <div class="title-area text-center">
                        <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg')}}" alt="shape">Our Services</span>
                        <h2 class="sec-title">Trusted Cleaning <span class="text-theme">Service</span> <br> On Your Door</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="service-card">
                        <div class="box-img">
                            <img src="{{ URL::to('frontend/assets/img/service/service_card_2.jpg')}}" alt="Image">
                        </div>
                        <div class="box-content">
                            <div class="box-icon">
                                <img src="{{ URL::to('frontend/assets/img/icon/service_card_2.svg')}}" alt="Icon">
                            </div>
                            <h3 class="box-title"><a href="#">Kitchen Cleaning</a></h3>
                            <p class="box-text">Your kitchen is the heart of your home, and we ensure it stays spotless and hygienic.</p>
                            <a href="#" class="th-btn btn-sm">Book Now<i class="fas fa-arrow-up-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-card">
                        <div class="box-img">
                            <img src="{{ URL::to('frontend/assets/img/service/service_card_1.jpg')}}" alt="Image">
                        </div>
                        <div class="box-content">
                            <div class="box-icon">
                                <img src="{{ URL::to('frontend/assets/img/icon/service_card_1.svg')}}" alt="Icon">
                            </div>
                            <h3 class="box-title"><a href="#">Bedroom Cleaning</a></h3>
                            <p class="box-text">Relax in a fresh, tidy bedroom with our thorough cleaning services.</p>
                            <a href="#" class="th-btn btn-sm">Book Now<i class="fas fa-arrow-up-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==============================
About Area  
==============================-->
    <div class="z-index-common space" id="about-sec">
        <div class="shape-mockup moving z-index-3" data-bottom="-40px" data-right="0"><img src="{{ URL::to('frontend/assets/img/shape/vector_shape_3.png')}}" alt="shape"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="img-box1">
                        <div class="img1">
                            <img src="{{ URL::to('frontend/assets/img/customimg/price_card_1.jpg')}}" alt="About">
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
                                <img src="{{ URL::to('frontend/assets/img/customimg/about_1_2.jpg')}}" alt="About">
                            </div>
                        </div>
                        <div class="box-shape spin">
                            <img src="{{ URL::to('frontend/assets/img/shape/vector_shape_2.png')}}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="title-area mb-32">
                        <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg')}}" alt="shape">About Us</span>
                        <h2 class="sec-title">Your Trusted Partner in <span class="text-theme">Cleaning</span></h2>
                        <p class="sec-text">At 3 Maids Cleaners, we bring expertise and dedication to every job, ensuring your home is impeccably clean and welcoming. Our team is committed to delivering top-quality service with the convenience of online booking, secure payments, and automatic follow-ups.</p>
                    </div>
                    <div class="about-feature-wrap">
                        <div class="about-feature">
                            <div class="box-icon">
                                <img src="{{ URL::to('frontend/assets/img/icon/about_feature_1.svg')}}" alt="icon">
                            </div>
                            <div class="media-body">
                                <h3 class="box-title">Convenient Booking</h3>
                                <p class="box-text">Schedule appointments online with instant SMS confirmations and reminders.</p>
                            </div>
                        </div>
                        <div class="about-feature">
                            <div class="box-icon">
                                <img src="{{ URL::to('frontend/assets/img/icon/about_feature_2.svg')}}" alt="icon">
                            </div>
                            <div class="media-body">
                                <h3 class="box-title">Hassle-Free Payments</h3>
                                <p class="box-text">Pay securely online and save your card for future auto-charges.</p>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group">
                        <a href="{{ url('/about') }}" class="th-btn">More Details<i class="fas fa-arrow-up-right ms-2"></i></a>
                   
                    </div>
                </div>
            </div>
        </div>
    </div><!--==============================
Video Area  
==============================-->
    <div class="video-sec1 space-top" data-bg-src="{{ URL::to('frontend/assets/img/bg/video_bg_1.jpg')}}">
        <div class="shape-mockup starani" data-top="10%" data-left="20%"><img src="{{ URL::to('frontend/assets/img/shape/vector_shape_4.svg')}}" alt="shape"></div>
        <div class="shape-mockup starani" data-bottom="22%" data-left="6%"><img src="{{ URL::to('frontend/assets/img/shape/vector_shape_4.svg')}}" alt="shape"></div>
        <div class="shape-mockup starani" data-top="15%" data-right="10%"><img src="{{ URL::to('frontend/assets/img/shape/vector_shape_4.svg')}}" alt="shape"></div>
        <div class="shape-mockup starani" data-bottom="12%" data-right="6%"><img src="{{ URL::to('frontend/assets/img/shape/vector_shape_4.svg')}}" alt="shape"></div>
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-11">
                    <div class="mb-5 pb-3">
                        <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>
                    </div>
                    <h2 class="sec-title text-white">Prioritizes Cleanliness and Offers Top-Notch Service</h2>
                </div>
            </div>
        </div>
    </div><!--==============================
Contact Area   
==============================-->
    <div class="">
        <div class="container">
            <div class="contact-sec1">
                <div class="shape-mockup spin d-none d-xl-block" data-bottom="-35%" data-left="30%"><img src="{{ URL::to('frontend/assets/img/shape/vector_shape_5.png')}}" alt="shape"></div>
                <div class="row gy-40">
                    <div class="col-xl-7">
                        <div class="pe-xl-4 text-xl-start text-center">
                            <div class="title-area mb-32">
                                <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg')}}" alt="shape">Get In touch</span>
                                <h2 class="sec-title text-white">Our Cleaning <span class="text-theme">Service</span> Sets the Standard</h2>
                                <p class="sec-text text-white">Elevate your space with our thorough cleaning service, ensuring impeccable cleanliness and a welcoming atmosphere. Enjoy the convenience of online booking, secure payments, and automatic follow-ups.</p>
                            </div>
                            <a href="#" class="th-btn style3">Get in Touch<i class="fas fa-arrow-up-right ms-2"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <form action="#" method="POST" class="contact-form1 ajax-contact">
                            <h3 class="form-title">Make Appointment</h3>
                            <div class="input-wrap">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                                        <i class="fal fa-user"></i>
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                                        <i class="fal fa-phone"></i>
                                    </div>
                                    <div class="form-group col-12">
                                        <select name="service" id="service" class="form-select">
                                            <option value="" disabled selected hidden>Choose Service</option>
                                            <option value="kitchen">Kitchen Cleaning</option>
                                            <option value="bedroom">Bedroom Cleaning</option>
                                        </select>
                                        <i class="fal fa-chevron-down"></i>
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="text" class="form-control" name="preferred_date" id="preferred_date" placeholder="Preferred Date (MM/DD/YYYY)">
                                        <i class="fal fa-calendar"></i>
                                    </div>
                                    <div class="form-group col-12">
                                        <input type="text" class="form-control" name="preferred_time" id="preferred_time" placeholder="Preferred Time (HH:MM AM/PM)">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="form-btn col-12">
                                        <button type="submit" class="th-btn btn-fw">Submit<i class="fas fa-arrow-up-right ms-2"></i></button>
                                    </div>
                                </div>
                                <p class="form-messages mb-0 mt-3"></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
Feature Area  
==============================-->
    <div class="overflow-hidden space" data-bg-src="{{ URL::to('frontend/assets/img/bg/why_bg_1.jpg')}}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 text-center text-xl-start">
                    <div class="title-area mb-32">
                        <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg')}}" alt="shape">Why Choose Us</span>
                        <h2 class="sec-title">Empowering Your <span class="text-theme">Home</span> with Our Expertise</h2>
                        <p class="sec-text">At 3 Maids Cleaners, we offer top-quality cleaning services with the convenience of online booking, secure payments, and automatic follow-ups. Our expertise ensures your home shines, providing you with a healthier and more welcoming environment.</p>
                    </div>
                    <div class="about-feature-area">
                        <div class="about-feature">
                            <div class="box-icon">
                                <img src="{{ URL::to('frontend/assets/img/icon/about_feature_3.svg')}}" alt="icon">
                            </div>
                            <div class="media-body">
                                <h3 class="box-title">Convenient Booking</h3>
                                <p class="box-text">Schedule appointments online and receive instant SMS confirmations and reminders.</p>
                            </div>
                        </div>
                        <div class="about-feature">
                            <div class="box-icon">
                                <img src="{{ URL::to('frontend/assets/img/icon/about_feature_4.svg')}}" alt="icon">
                            </div>
                            <div class="media-body">
                                <h3 class="box-title">Hassle-Free Payments</h3>
                                <p class="box-text">Pay securely online using credit/debit cards or PayPal, with the option to save your card for future auto-charges.</p>
                            </div>
                        </div>
                        <div class="about-feature">
                            <div class="box-icon">
                                <img src="{{ URL::to('frontend/assets/img/icon/about_feature_5.svg')}}" alt="icon">
                            </div>
                            <div class="media-body">
                                <h3 class="box-title">Automatic Follow-Ups</h3>
                                <p class="box-text">Set up recurring appointments and let us handle the rest – no need to rebook every time!</p>
                            </div>
                        </div>
                        <div class="about-feature">
                            <div class="box-icon">
                                <img src="{{ URL::to('frontend/assets/img/icon/about_feature_1.svg')}}" alt="icon">
                            </div>
                            <div class="media-body">
                                <h3 class="box-title">Customer Reviews</h3>
                                <p class="box-text">Read what others are saying about our services and share your own experience.</p>
                            </div>
                        </div>
                        <div class="about-feature">
                            <div class="box-icon">
                                <img src="{{ URL::to('frontend/assets/img/icon/about_feature_2.svg')}}" alt="icon">
                            </div>
                            <div class="media-body">
                                <h3 class="box-title">Top-Quality Service</h3>
                                <p class="box-text">Our team is dedicated to making your home shine, with detailed cleaning tailored to your needs.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="img-box2">
                        <div class="img1">
                            <img src="{{ URL::to('frontend/assets/img/normal/why_1_1.jpg')}}" alt="Why">
                        </div>
                        <div class="img2">
                            <img src="{{ URL::to('frontend/assets/img/normal/why_1_2.jpg')}}" alt="Why">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
Testimonial Area  
==============================-->
    <section class="space-top" id="testi-sec">
        <div class="container">
            <div class="testi-box-area">
                <div class="row g-0 flex-row-reverse">
                    <div class="col-lg-5 order-2 order-lg-0">
                        <div class="testi-box-img">
                            <img src="{{ URL::to('frontend/assets/img/testimonial/testi_2_1.jpg')}}" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="testi-box-slide">
                            <div class="title-area mb-40 text-center text-lg-start">
                                <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg')}}" alt="Icon">Customer Reviews</span>
                                <h2 class="sec-title">What Our <span class="text-theme">Customers</span> Are Saying</h2>
                            </div>
                            <div class="swiper th-slider" id="testiSlide2" data-slider-options='{"effect":"slide","thumbs":{"swiper":".testi-box-thumb"}}'>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="testi-box">
                                            <div class="box-review">
                                                <i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i>
                                            </div>
                                            <p class="box-text">“Absolutely amazing service! My kitchen has never looked so clean, and the online booking system made everything so easy. The SMS reminders were a lifesaver!”</p>
                                            <div class="box-profile">
                                                <div class="box-img">
                                                    <img src="{{ URL::to('frontend/assets/img/testimonial/testi_1_1.jpg')}}" alt="image">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="box-title">Jane Doe</h3>
                                                    <span class="box-desig">Happy Customer</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testi-box">
                                            <div class="box-review">
                                                <i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-regular fa-star"></i>
                                            </div>
                                            <p class="box-text">“The team did a fantastic job on my bedroom. I love that I can save my card and have follow-up appointments automatically booked and paid for. Highly recommend!”</p>
                                            <div class="box-profile">
                                                <div class="box-img">
                                                    <img src="{{ URL::to('frontend/assets/img/testimonial/testi_1_2.jpg')}}" alt="image">
                                                </div>
                                                <div class="media-body">
                                                    <h3 class="box-title">John Smith</h3>
                                                    <span class="box-desig">Happy Customer</span>
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
                            <div class="review-actions mt-4">
                                <a href="#" class="th-btn btn-sm">View All Reviews<i class="fas fa-arrow-up-right ms-2"></i></a>
                                <a href="#" class="th-btn btn-sm">Submit Your Review<i class="fas fa-arrow-up-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==============================
Gallery Area  
==============================-->
    <div class="gallery-sec1" data-bg-src="{{ URL::to('frontend/assets/img/bg/gallery_bg_1.jpg')}}">
        <div class="container space-top">
            <div class="title-area text-center">
                <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg')}}" alt="shape">Our Portfolio</span>
                <h2 class="sec-title text-white">Display of Recent Projects</h2>
            </div>
        </div>
        <div class="gallery-card-wrap space-bottom">
            <div class="gallery-card hover-item ">
                <div class="box-img">
                    <img src="{{ URL::to('frontend/assets/img/gallery/gallery_1_1.jpg')}}" alt="gallery image">
                </div>
                <div class="box-content">
                    <div class="media-body">
                        <h3 class="box-title"><a href="#">Kitchen Cleaning</a></h3>
                        <p class="box-text">A spotless kitchen transformation.</p>
                    </div>
                    <a href="{{ URL::to('frontend/assets/img/gallery/gallery_1_1.jpg')}}" class="icon-btn style2 popup-image"><i class="far fa-plus"></i></a>
                </div>
            </div>
            <div class="gallery-card hover-item ">
                <div class="box-img">
                    <img src="{{ URL::to('frontend/assets/img/gallery/gallery_1_2.jpg')}}" alt="gallery image">
                </div>
                <div class="box-content">
                    <div class="media-body">
                        <h3 class="box-title"><a href="#">Bedroom Cleaning</a></h3>
                        <p class="box-text">A fresh and tidy bedroom retreat.</p>
                    </div>
                    <a href="{{ URL::to('frontend/assets/img/gallery/gallery_1_2.jpg')}}" class="icon-btn style2 popup-image"><i class="far fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
Call-to-Action Area  
==============================-->
    <section class="space">
        <div class="container">
            <div class="title-area text-center">
                <h2 class="sec-title">Ready for a Spotless Home?</h2>
                <p class="sec-text">Booking your appointment is quick and easy. Fill out the form, receive instant SMS confirmations, and enjoy a cleaner home!</p>
                <a href="#" class="th-btn">Book Now<i class="fas fa-arrow-up-right ms-2"></i></a>
            </div>
        </div>
    </section>

    <!--==============================
FAQ Area  
==============================-->
    <div class="space-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-9">
                    <div class="title-area text-center">
                        <span class="sub-title"><img src="{{ URL::to('frontend/assets/img/theme-img/title_icon.svg')}}" alt="Icon">Frequently Asked Questions</span>
                        <h2 class="sec-title">Get Every Single Answer There If You Want</h2>
                    </div>
                </div>
            </div>

            <div class="row gy-4">
                <div class="col-xl-6">
                    <div class="accordion-1 accordion" id="faqAccordion">
                        <div class="accordion-card active">
                            <div class="accordion-header" id="collapse-item-1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">What types of cleaning services do you offer?</button>
                            </div>
                            <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">At 3 Maids Cleaners, we specialize in kitchen and bedroom cleaning. Our kitchen cleaning ensures a spotless and hygienic space, while our bedroom cleaning creates a fresh, tidy retreat tailored to your needs.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card">
                            <div class="accordion-header" id="collapse-item-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">How do I schedule a cleaning appointment?</button>
                            </div>
                            <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="collapse-item-2" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">Scheduling is simple! Use our online booking form to select your service (kitchen or bedroom cleaning), choose a date and time, and submit your details. You’ll receive instant SMS confirmation and reminders.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card">
                            <div class="accordion-header" id="collapse-item-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">What is included in a standard cleaning service?</button>
                            </div>
                            <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="collapse-item-3" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">Our standard kitchen cleaning includes wiping surfaces, cleaning appliances, and sanitizing sinks. Bedroom cleaning covers dusting, vacuuming, and tidying surfaces to ensure a fresh, welcoming space.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card">
                            <div class="accordion-header" id="collapse-item-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">How much does your cleaning service cost?</button>
                            </div>
                            <div id="collapse-4" class="accordion-collapse collapse" aria-labelledby="collapse-item-4" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">Costs vary based on the size of your space and service frequency. Contact us for a personalized quote. We offer competitive pricing with secure online payment options for your convenience.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card">
                            <div class="accordion-header" id="collapse-item-5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">Can I set up recurring cleaning appointments?</button>
                            </div>
                            <div id="collapse-5" class="accordion-collapse collapse" aria-labelledby="collapse-item-5" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">Yes! We offer automatic follow-ups for recurring appointments. Set your preferred schedule, and we’ll handle the rest—no need to rebook each time.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card">
                            <div class="accordion-header" id="collapse-item-6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6">Are your products safe for pets and kids?</button>
                            </div>
                            <div id="collapse-6" class="accordion-collapse collapse" aria-labelledby="collapse-item-6" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">Absolutely! We use eco-friendly, non-toxic cleaning products that are safe for pets, kids, and your family, ensuring a healthy home environment.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="accordion-1 accordion" id="faqAccordion2">
                        <div class="accordion-card">
                            <div class="accordion-header" id="collapse2-item-1">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-1" aria-expanded="false" aria-controls="collapse2-1">How long does a typical cleaning session take?</button>
                            </div>
                            <div id="collapse2-1" class="accordion-collapse collapse" aria-labelledby="collapse2-item-1" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">
                                    <p class="faq-text">A typical session takes 1-2 hours per area (kitchen or bedroom), depending on size and condition. We work efficiently to deliver top-quality results.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card">
                            <div class="accordion-header" id="collapse2-item-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-2" aria-expanded="false" aria-controls="collapse2-2">Any extra charge for same-day service?</button>
                            </div>
                            <div id="collapse2-2" class="accordion-collapse collapse" aria-labelledby="collapse2-item-2" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">
                                    <p class="faq-text">Same-day service may incur a small additional fee, depending on availability. Contact us to confirm and schedule your appointment.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card">
                            <div class="accordion-header" id="collapse2-item-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-3" aria-expanded="false" aria-controls="collapse2-3">Should I be home during the cleaning?</button>
                            </div>
                            <div id="collapse2-3" class="accordion-collapse collapse" aria-labelledby="collapse2-item-3" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">
                                    <p class="faq-text">It’s up to you! You can be present or provide access instructions. Our team is trustworthy and fully vetted for your peace of mind.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card">
                            <div class="accordion-header" id="collapse2-item-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-4" aria-expanded="false" aria-controls="collapse2-4">Are your staff trained and background-checked?</button>
                            </div>
                            <div id="collapse2-4" class="accordion-collapse collapse" aria-labelledby="collapse2-item-4" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">
                                    <p class="faq-text">Yes, all our staff are professionally trained and undergo thorough background checks to ensure reliability and quality service.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card active">
                            <div class="accordion-header" id="collapse2-item-5">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-5" aria-expanded="true" aria-controls="collapse2-5">Can I customize cleaning tasks?</button>
                            </div>
                            <div id="collapse2-5" class="accordion-collapse collapse show" aria-labelledby="collapse2-item-5" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">
                                    <p class="faq-text">Absolutely! We tailor our services to your preferences. Let us know your specific needs when booking, and we’ll customize accordingly.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card">
                            <div class="accordion-header" id="collapse2-item-6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2-6" aria-expanded="false" aria-controls="collapse2-6">How often should I schedule cleanings?</button>
                            </div>
                            <div id="collapse2-6" class="accordion-collapse collapse" aria-labelledby="collapse2-item-6" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">
                                    <p class="faq-text">We recommend weekly or bi-weekly cleanings for optimal upkeep. Set up automatic follow-ups to maintain a consistently clean home!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
What We Offer Area  
==============================-->

@endsection
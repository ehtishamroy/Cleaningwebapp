@extends('Frontend.app')
@section('content')


<!--==============================
Breadcrumb Area  
==============================-->
<div class="breadcumb-wrapper" data-bg-src="{{ URL::to('frontend/assets/img/bg/breadcumb-bg.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Contact Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</div>

<!--==============================
Contact Info Area  
==============================-->
<div class="space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-7">
                <div class="title-area text-center">
                    <h2 class="sec-title">Get in Touch with 3 Maids Cleaners</h2>
                    <p class="sec-text">We’re here to help you keep your home spotless with our expert kitchen and bedroom cleaning services. Reach out to us today for any questions or to book your appointment!</p>
                </div>
            </div>
        </div>
        <div class="row gy-4 justify-content-center">
          
            <div class="col-xxl-3 col-lg-4 col-md-6">
                <div class="contact-feature">
                    <div class="box-icon bg-theme2">
                        <i class="fa-light fa-phone"></i>
                    </div>
                    <div class="media-body">
                        <h3 class="box-title">Phone Number</h3>
                        <p class="box-text">
                            <a href="tel:+16028779077">+1 602-877-9077</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-lg-4 col-md-6">
                <div class="contact-feature p-3">
                    <div class="box-icon bg-theme2 px-3">
                        <i class="fa-light fa-envelope"></i>
                    </div>
                    <div class="media-body w-100">
                        <h3 class="box-title">Email Address</h3>
                        <p class="box-text text-break">
                            <a href="mailto:3mariasmaster@gmail.com">3mariasmaster@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
       
        </div>
    </div>
</div>

<!--==============================
Contact Area  
==============================-->
<div class="space-bottom">
    <div class="container">
        <form action="{{ URL::to('/contact-submit') }}" method="POST" class="team-contact-form input-white ajax-contact">
            @csrf
            <h4 class="form-title">Book Your Cleaning Appointment</h4>
            <div class="row">
                <div class="form-group col-sm-6">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                    <i class="far fa-user"></i>
                </div>
                <div class="form-group col-sm-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                    <i class="far fa-envelope"></i>
                </div>
                <div class="form-group col-sm-6">
                    <input type="tel" class="form-control" name="number" id="number" placeholder="Phone Number" required>
                    <i class="far fa-phone"></i>
                </div>
                <div class="form-group col-sm-6">
                    <select name="subject" id="subject" class="form-select" required>
                        <option value="" disabled selected hidden>Choose Service</option>
                        <option value="Kitchen Cleaning">Kitchen Cleaning</option>
                        <option value="Bedroom Cleaning">Bedroom Cleaning</option>
                    </select>
                    <i class="far fa-chevron-down"></i>
                </div>
                <div class="form-group col-12">
                    <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Your Message (e.g., preferred date/time)" required></textarea>
                    <i class="far fa-message"></i>
                </div>
                <div class="form-btn col-12 text-center">
                    <button type="submit" class="th-btn">Submit Request<i class="fas fa-arrow-up-right ms-2"></i></button>
                </div>
            </div>
            <p class="form-messages mb-0 mt-3"></p>
        </form>
    </div>
</div>

@endsection


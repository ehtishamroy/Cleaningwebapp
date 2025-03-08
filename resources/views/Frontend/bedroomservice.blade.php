@extends('Frontend.app')
@section('content')

<!--==============================
Breadcrumb Area  
==============================-->
<div class="breadcumb-wrapper" data-bg-src="{{ URL::to('frontend/assets/img/bg/breadcumb-bg.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Bedroom Cleaning Service</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>Bedroom Cleaning Service</li>
            </ul>
        </div>
    </div>
</div>

<!--==============================
Service Area
==============================-->
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-lg-8">
                <div class="page-single mb-30">
                    <div class="page-img">
                        <img src="{{ URL::to('frontend/assets/img/service/service_details.jpg') }}" alt="Bedroom Cleaning">
                    </div>
                    <div class="page-content">
                        <h2 class="page-title">Bedroom Cleaning Service</h2>
                        <p class="">At 3 Maids Cleaners, we understand that your bedroom is your personal sanctuary—a place to relax and recharge. Our bedroom cleaning service is designed to create a fresh, tidy, and welcoming space that promotes rest and tranquility. Using eco-friendly products and meticulous attention to detail, we ensure your bedroom is free from dust, clutter, and allergens.</p>
                        <p class="mb-40">Our expert team goes beyond surface cleaning, tackling every corner of your bedroom. From dusting furniture to vacuuming floors and tidying surfaces, we tailor our service to meet your specific needs. Whether you need a one-time deep clean or regular maintenance, we make booking easy with our online system, complete with SMS confirmations and secure payment options.</p>

                        <div class="service-feature-wrap">
                            <div class="service-feature">
                                <div class="box-icon">
                                    <img src="{{ URL::to('frontend/assets/img/icon/about_feature_2.svg') }}" alt="icon">
                                </div>
                                <h3 class="box-title">Trained Cleaning Specialists</h3>
                            </div>
                            <div class="service-feature">
                                <div class="box-icon">
                                    <img src="{{ URL::to('frontend/assets/img/icon/about_feature_1.svg') }}" alt="icon">
                                </div>
                                <h3 class="box-title">Eco-Friendly Products</h3>
                            </div>
                            <div class="service-feature">
                                <div class="box-icon">
                                    <img src="{{ URL::to('frontend/assets/img/icon/about_feature_4.svg') }}" alt="icon">
                                </div>
                                <h3 class="box-title">Flexible Scheduling</h3>
                            </div>
                        </div>

                        <h4 class="mt-45">Our Benefits</h4>
                        <p class="mb-4">With 3 Maids Cleaners, you’ll enjoy a bedroom that’s not only clean but also healthier and more comfortable. Our service eliminates dust and allergens, enhances air quality, and saves you time—all with the convenience of online booking and automatic follow-ups.</p>
                        <div class="row mt-35 gx-40 align-items-center">
                            <div class="col-md-6 mb-30">
                                <img class="rounded-10 w-100" src="{{ URL::to('frontend/assets/img/service/service_inner_1.jpg') }}" alt="Bedroom Cleaning">
                            </div>
                            <div class="col-md-6 mb-30">
                                <div class="checklist">
                                    <ul>
                                        <li><i class="fas fa-check-circle"></i> Dusting furniture and fixtures</li>
                                        <li><i class="fas fa-check-circle"></i> Vacuuming carpets and floors</li>
                                        <li><i class="fas fa-check-circle"></i> Tidying surfaces and organizing clutter</li>
                                        <li><i class="fas fa-check-circle"></i> Cleaning under beds (optional)</li>
                                        <li><i class="fas fa-check-circle"></i> Wiping mirrors and windows (optional)</li>
                                        <li><i class="fas fa-check-circle"></i> Changing bed linens (optional)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-10 mb-20">Comprehensive Bedroom Cleaning</h4>
                        <p class="mb-n2">Our bedroom cleaning service includes a standard package of dusting, vacuuming, and tidying surfaces to keep your space fresh and inviting. For a deeper clean, opt for add-ons like under-bed cleaning, window wiping, or linen changes. We use safe, non-toxic products to protect your health and the environment, ensuring your bedroom is a restful retreat. Book online today and experience the 3 Maids Cleaners difference—hassle-free scheduling, secure payments, and a spotless result every time.</p>

                        <div class="accordion mt-40" id="faqAccordion">
                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">What does your bedroom cleaning service include?</button>
                                </div>
                                <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Our standard bedroom cleaning includes dusting furniture and fixtures, vacuuming carpets and floors, and tidying surfaces. Optional add-ons include cleaning under beds, wiping mirrors and windows, and changing bed linens.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">How much does bedroom cleaning cost?</button>
                                </div>
                                <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="collapse-item-2" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Pricing depends on the size of your bedroom and any optional add-ons. A standard cleaning starts at a competitive rate, with additional services quoted upon request. Contact us or book online for a personalized estimate.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">How long does it take to clean a bedroom?</button>
                                </div>
                                <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="collapse-item-3" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">A standard bedroom cleaning takes 1-2 hours, depending on size and condition. Optional services like under-bed cleaning or linen changes may add extra time. We work efficiently to deliver top results.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">How do I schedule a bedroom cleaning?</button>
                                </div>
                                <div id="collapse-4" class="accordion-collapse collapse" aria-labelledby="collapse-item-4" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Simply use our online booking system to select "Bedroom Cleaning," choose your preferred date and time, and submit your details. You’ll receive instant SMS confirmation and reminders.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget widget_banner" data-bg-src="{{ URL::to('frontend/assets/img/bg/widget_banner.jpg') }}">
                        <div class="widget-banner">
                            <h4 class="box-title">Need Help?</h4>
                            <div class="call-feature">
                                <div class="box-icon">
                                    <i class="fal fa-phone"></i>
                                </div>
                                <div class="media-body">
                                    <p class="box-label">Support</p>
                                    <a href="tel:+16028779077" class="box-link">+1 (602) 877-9077</a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

@endsection
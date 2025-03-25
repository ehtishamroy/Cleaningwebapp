@extends('Frontend.app')
@section('content')

<!--==============================
Breadcrumb Area  
==============================-->
<div class="breadcumb-wrapper" data-bg-src="{{ URL::to('frontend/assets/img/bg/kitchen.png') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Kitchen Cleaning Service</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>Kitchen Cleaning Service</li>
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
                        <img src="{{ URL::to('frontend/assets/img/service/kitchen-main.jpg') }}" alt="Kitchen Cleaning">
                    </div>
                    <div class="page-content">
                        <h2 class="page-title">Kitchen Cleaning Service</h2>
                        <p class="">At 3 Maids Cleaners, we know the kitchen is the heart of your home—a space where meals are made and memories are shared. Our kitchen cleaning service ensures this vital area is spotless, hygienic, and ready for use. With eco-friendly products and a keen eye for detail, we eliminate grease, grime, and germs to keep your kitchen safe and sparkling.</p>
                        <p class="mb-40">Our expert team handles every aspect of kitchen cleaning, from wiping counters to scrubbing sinks and sweeping floors. We customize our service to fit your needs, whether it’s a quick refresh or a thorough deep clean. Booking is simple with our online system, complete with SMS confirmations and secure payment options for your convenience.</p>

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
                        <p class="mb-4">With 3 Maids Cleaners, your kitchen will be cleaner, safer, and more enjoyable. We remove grease and bacteria, improve hygiene, and save you time—all with the ease of online booking and automatic follow-ups to keep your kitchen pristine.</p>
                        <div class="row mt-35 gx-40 align-items-center">
                            <div class="col-md-6 mb-30">
                                <img class="rounded-10 w-100" src="{{ URL::to('frontend/assets/img/service/kitchen-service.png') }}" alt="Kitchen Cleaning">
                            </div>
                            <div class="col-md-6 mb-30">
                                <div class="checklist">
                                    <ul>
                                        <li><i class="fas fa-check-circle"></i> Wiping countertops and surfaces</li>
                                        <li><i class="fas fa-check-circle"></i> Cleaning sinks and faucets</li>
                                        <li><i class="fas fa-check-circle"></i> Sweeping and mopping floors</li>
                                        <li><i class="fas fa-check-circle"></i> Cleaning stovetop and range hood (optional)</li>
                                        <li><i class="fas fa-check-circle"></i> Oven cleaning (optional)</li>
                                        <li><i class="fas fa-check-circle"></i> Fridge interior cleaning (optional)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-10 mb-20">Comprehensive Kitchen Cleaning</h4>
                        <p class="mb-n2">Our kitchen cleaning service includes a standard package of wiping counters, cleaning sinks, and mopping floors to maintain a hygienic space. For a deeper clean, choose add-ons like stovetop cleaning, oven scrubbing, or fridge interior care. We use safe, non-toxic products to protect your family and the environment, ensuring your kitchen is both functional and inviting. Book online today and enjoy the 3 Maids Cleaners difference—effortless scheduling, secure payments, and a spotless kitchen every time.</p>

                        <div class="accordion mt-40" id="faqAccordion">
                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">What does your kitchen cleaning service include?</button>
                                </div>
                                <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Our standard kitchen cleaning includes wiping countertops and surfaces, cleaning sinks and faucets, and sweeping and mopping floors. Optional add-ons include stovetop and range hood cleaning, oven cleaning, and fridge interior cleaning.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">How much does kitchen cleaning cost?</button>
                                </div>
                                <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="collapse-item-2" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Pricing varies based on kitchen size and optional add-ons. A standard cleaning starts at an affordable rate, with additional services quoted upon request. Contact us or book online for a tailored estimate.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">How long does it take to clean a kitchen?</button>
                                </div>
                                <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="collapse-item-3" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">A standard kitchen cleaning takes 1-2 hours, depending on size and condition. Optional services like oven or fridge cleaning may add time. We work quickly to deliver exceptional results.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-card">
                                <div class="accordion-header" id="collapse-item-4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">How do I schedule a kitchen cleaning?</button>
                                </div>
                                <div id="collapse-4" class="accordion-collapse collapse" aria-labelledby="collapse-item-4" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">Use our online booking system to select "Kitchen Cleaning," pick your preferred date and time, and submit your details. You’ll get instant SMS confirmation and reminders.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget widget_banner" data-bg-src="{{ URL::to('frontend/assets/img/bg/support.png') }}">
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
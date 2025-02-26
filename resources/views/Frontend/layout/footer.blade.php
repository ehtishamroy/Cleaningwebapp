   <!--==============================
	Footer Area
==============================-->
<footer class="footer-wrapper footer-layout1" data-bg-src="{{ URL::to('frontend/assets/img/bg/footer_bg_1.jpg')}}">
    <div class="shape-mockup movingX d-none d-xl-block" data-bottom="80px" data-left="0%"><img src="{{ URL::to('frontend/assets/img/shape/footer_shape_1.png')}}" alt="shape"></div>
    <div class="shape-mockup moving d-none d-xl-block" data-bottom="80px" data-right="5%"><img src="{{ URL::to('frontend/assets/img/shape/footer_shape_2.png')}}" alt="shape"></div>
    <div class="container">
        <div class="footer-top-wrap">
            <div class="row gy-4 justify-content-between">
                <div class="col-auto">
                    <div class="footer-contact">
                        <div class="box-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="box-content">
                            <h3 class="box-title">Address</h3>
                            <p class="box-text">554 Gloriana road Santa Rosa 95304, United States</p>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="footer-contact">
                        <div class="box-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="box-content">
                            <h3 class="box-title">Address</h3>
                            <p class="box-text">
                                <a href="mailto:">klanohelp@gmail.com</a>
                                <a href="tel:+16102458976">+16102458976</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="footer-contact">
                        <div class="box-icon">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div class="box-content">
                            <h3 class="box-title">Address</h3>
                            <p class="box-text">Mon-Fri : 09.00 am-05.00 pm <br> Sunday Closed</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <div class="th-widget-about">
                            <div class="about-logo">
                                <a href="home-house-cleaner.html"><img src="{{ URL::to('frontend/assets/img/logo-footer.svg')}}" alt="Klano"></a>
                            </div>
                            <p class="about-text">We're your trusted a cleaning company, dedicated to any kind of a consistently delivering exceptional all category good cleaning service.</p>
                            <div class="th-social">
                                <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Quick Links</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="about.html">Terms of Use</a></li>
                                <li><a href="service.html">Our Services</a></li>
                                <li><a href="faq.html">Help & FAQs</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Our Services</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="service-details.html">Home Cleaning</a></li>
                                <li><a href="service-details.html">Office Cleaning</a></li>
                                <li><a href="service-details.html">Kitchen Cleaning</a></li>
                                <li><a href="service-details.html">Window Cleaning</a></li>
                                <li><a href="service-details.html">Bathroom Cleaning</a></li>
                                <li><a href="service-details.html">Wall Cleaning</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Subscribe Now </h3>
                        <div class="newsletter-widget">
                            <p class="footer-text">Subscribe Our Newsletter to get our latest update & news</p>
                            <form action="#" class="newsletter-form">
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Enter Email" required="">
                                </div>
                                <button type="submit" class="simple-icon"><i class="fa-solid fa-paper-plane"></i></button>
                            </form>
                            <div class="form-group">
                                <input type="checkbox" id="checkbox" name="checkbox">
                                <label for="checkbox">I agree with the terms & conditions</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container text-center">
            <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2024 <a href="home-house-cleaner.html">Klano</a>. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<!--********************************
    Code End Here 
******************************** -->

<!-- Scroll To Top -->
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
    </svg>
</div>

<!--==============================
All Js File
============================== -->
<!-- Jquery -->
<script src="{{ asset('frontend/assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
<!-- Swiper Js -->
<script src="{{ asset('frontend/assets/js/swiper-bundle.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Counter Up -->
<script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
<!-- Circle Progress -->
<script src="{{ asset('frontend/assets/js/circle-progress.js') }}"></script>
<!-- datetimepicker -->
<script src="{{ asset('frontend/assets/js/jquery.datetimepicker.min.js') }}"></script>
<!-- Range Slider -->
<script src="{{ asset('frontend/assets/js/jquery-ui.min.js') }}"></script>
<!-- Isotope Filter -->
<script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>

<!-- Main Js File -->
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
</body>

</html>
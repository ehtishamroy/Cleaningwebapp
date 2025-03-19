@extends('Frontend.app')
@section('content')

<!--==============================
Breadcrumb Area  
==============================-->
<div class="breadcumb-wrapper" data-bg-src="{{ URL::to('frontend/assets/img/bg/breadcumb-bg.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Book Your Cleaning</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>Book Now</li>
            </ul>
        </div>
    </div>
</div>

<!--==============================
Booking Form Area  
==============================-->
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="booking-form-wrapper">
                    @if (session('success'))
                        <div class="alert alert-success">
                           {{ session('success') }}
                            </div>
                        @endif

                    @if (session('error'))
                    <div class="alert alert-danger">
                     {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('booking.submit') }}" method="POST" class="booking-form">
                        @csrf

                        <!-- Services -->
                        <div class="form-group mb-30">
                            
                            <label for="service" class="form-label">Services</label>
                            <p class="form-text">Select the type of service you’re looking for below</p>
                            <select name="service" id="service" class="form-select" required>
                                <option value="" disabled selected hidden>Basic Cleaning</option>

                                @foreach ($services as $service )
                                <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach
                                {{-- <option value="Kitchen Cleaning">Kitchen Cleaning</option>
                                <option value="Bedroom Cleaning">Bedroom Cleaning</option> --}}
                            </select>
                        </div>
                        <div class="section-divider"></div>

                        <!-- Frequency -->
                        <div class="form-group mb-30">
                            <label class="form-label">Frequency</label>
                            <div class="btn-group d-flex flex-wrap gap-10 frequency-group" role="group" aria-label="Frequency options">
                            @php
                                $defaultFrequencyId = $frequencys->first()->id ?? null; 
                            @endphp
                                @foreach ($frequencys as $frequency )

                                <input type="radio" class="btn-check" name="frequency" id="{{$frequency->id}}" value="{{$frequency->id}}" {{ old('frequency', $defaultFrequencyId) == $frequency->id ? 'checked' : '' }}>
                                <label class="th-btn btn-sm style2 frequency-btn" for="{{$frequency->id}}">{{$frequency->name}}</label>
                                    
                                @endforeach
{{-- 
                                <input type="radio" class="btn-check" name="frequency" id="one-time" value="One-Time" checked>
                                <label class="th-btn btn-sm style2 frequency-btn" for="one-time">One-Time</label>

                                <input type="radio" class="btn-check" name="frequency" id="weekly" value="Weekly">
                                <label class="th-btn btn-sm style2 frequency-btn" for="weekly">Weekly</label>

                                <input type="radio" class="btn-check" name="frequency" id="every-week" value="Every Week">
                                <label class="th-btn btn-sm style2 frequency-btn" for="every-week">Every Week</label>

                                <input type="radio" class="btn-check" name="frequency" id="monthly" value="Monthly">
                                <label class="th-btn btn-sm style2 frequency-btn" for="monthly">Monthly</label> --}}
                            </div>
                        </div>
                      
                        

                        <div class="section-divider"></div>

                        <!-- How Big Is Your Home -->
                        <div class="form-group mb-30">
                            <label class="form-label">How Big Is Your Home?</label>
                            <div class="row gx-30">
                                <div class="col-md-4">
                                    <label for="bedrooms" class="form-label">Beds</label>
                                    <select name="bedrooms" id="bedrooms" class="form-select" required>
                                        @for ($i = 0; $i <= 10; $i++)
                                            <option value="{{ $i }}" {{ $i == 0 ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="bathrooms" class="form-label">Baths</label>
                                    <select name="bathrooms" id="bathrooms" class="form-select" required>
                                        @for ($i = 0; $i <= 10; $i++)
                                            <option value="{{ $i }}" {{ $i == 1 ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="square_feet" class="form-label">Sq Ft</label>
                                    <select name="square_feet" id="square_feet" class="form-select" required>
                                        <option value="1-999" selected>1 - 999 Sqft</option>
                                        <option value="1000-1999">1000 - 1999 Sqft</option>
                                        <option value="2000-2999">2000 - 2999 Sqft</option>
                                        <option value="3000-3999">3000 - 3999 Sqft</option>
                                        <option value="4000+">4000+ Sqft</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="section-divider"></div>

                        <!-- Select Extras -->
                        <div class="form-group mb-30">
                            <label class="form-label">Select Extras</label>
                            <div class="row gx-30">
                                <!-- Kitchen Extras -->
                                <div class="col-6 col-md-3 mb-20 kitchen-extras">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="extras[]" id="stovetop" value="Stovetop Cleaning">
                                        <label class="form-check-label" for="stovetop">Stovetop Cleaning</label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-20 kitchen-extras">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="extras[]" id="oven" value="Oven Cleaning">
                                        <label class="form-check-label" for="oven">Oven Cleaning</label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-20 kitchen-extras">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="extras[]" id="fridge" value="Fridge Cleaning">
                                        <label class="form-check-label" for="fridge">Fridge Cleaning</label>
                                    </div>
                                </div>
                                <!-- Bedroom Extras -->
                                <div class="col-6 col-md-3 mb-20 bedroom-extras">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="extras[]" id="under-bed" value="Under Bed Cleaning">
                                        <label class="form-check-label" for="under-bed">Under Bed Cleaning</label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-20 bedroom-extras">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="extras[]" id="windows" value="Windows Cleaning">
                                        <label class="form-check-label" for="windows">Windows Cleaning</label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-20 bedroom-extras">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="extras[]" id="linens" value="Change Linens">
                                        <label class="form-check-label" for="linens">Change Linens</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section-divider"></div>

                        <!-- What Day/Time Works Best -->
                        <div class="form-group mb-30">
                            <label class="form-label">What Day/Time Works Best?</label>
                            <div class="row gx-30">
                                <div class="col-md-6">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" name="date" id="date" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="time" class="form-label">Time</label>
                                    <select name="time" id="time" class="form-select" required>
                                        <option value="" disabled selected hidden>Select Time</option>
                                        <option value="08:00 AM">08:00 AM</option>
                                        <option value="09:00 AM">09:00 AM</option>
                                        <option value="10:00 AM">10:00 AM</option>
                                        <option value="11:00 AM">11:00 AM</option>
                                        <option value="12:00 PM">12:00 PM</option>
                                        <option value="01:00 PM">01:00 PM</option>
                                        <option value="02:00 PM">02:00 PM</option>
                                        <option value="03:00 PM">03:00 PM</option>
                                        <option value="04:00 PM">04:00 PM</option>
                                        <option value="05:00 PM">05:00 PM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="section-divider"></div>

                        <!-- Customer Details -->
                        <div class="form-group mb-30">
                            <label class="form-label">Customer Details</label>
                            <p class="form-text">If you have booked with us in the past and are logged into your account, your details may populate below. Please double-check the information.</p>
                            <div class="row gx-30">
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Ex. James" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Ex. Lee" required>
                                </div>
                            </div>
                            <div class="row gx-30 mt-20">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Ex. example@xyz.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="secondary_email" class="form-label">Secondary Email Address</label>
                                    <input type="email" name="secondary_email" id="secondary_email" class="form-control" placeholder="Ex. example@xyz.com">
                                </div>
                            </div>
                            <div class="row gx-30 mt-20">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone No</label>
                                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Ex. (123) 456-7890" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="secondary_phone" class="form-label">Secondary Phone No</label>
                                    <input type="tel" name="secondary_phone" id="secondary_phone" class="form-control" placeholder="Ex. (123) 456-7890">
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="hidden" name="sms_reminder" value="0">
                                        <input class="form-check-input" type="checkbox" name="sms_reminder" id="sms_reminder" value="1">
                                        <label class="form-check-label" for="sms_reminder">
                                            Send me reminders about my booking via text message
                                        </label>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row gx-30 mt-20">
                                <div class="col-md-8">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Type Address" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="apt_no" class="form-label">Apt. No</label>
                                    <input type="text" name="apt_no" id="apt_no" class="form-control" placeholder="#">
                                </div>
                            </div>
                        </div>
                        <div class="section-divider"></div>

                        <!-- Key Information & Job Notes -->
                        <div class="form-group mb-30">
                            <label class="form-label">Key Information & Job Notes</label>
                            <p class="form-text">You can use this description to notify us of any issues we should be aware of.</p>
                            <div class="row">
                                <div class="col-12 mb-20">
                                    <div class="form-check">
                                        <input type="hidden" name="someone_at_home" value="0"> 
                                        <input class="form-check-input" type="checkbox" name="someone_at_home" id="someone_at_home" value="1">
                                        <label class="form-check-label" for="someone_at_home">Someone Will Be At Home</label>
                                    </div>
                                </div>
                                
                                <div class="col-12 mb-20">
                                    <div class="form-check">
                                        <input type="hidden" name="key_hidden" value="0">
                                        <input class="form-check-input" type="checkbox" name="key_hidden" id="key_hidden" value="1">
                                        <label class="form-check-label" for="key_hidden">I Will Hide The Key</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="notes" class="form-label">Customer Notes For Provider Regarding Home Access</label>
                                    <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="Special Notes And Instructions"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="section-divider"></div>

                        <!-- Payment Information -->
                        <div class="form-group mb-30">
                            <label class="form-label">Payment Information</label>
                            <button type="button" class="link-btn mb-20">Add New Card</button>
                            <div class="row gx-30">
                                <div class="col-12">
                                    <label for="card_number" class="form-label">Card Number</label>
                                    <input type="text" name="card_number" id="card_number" class="form-control" placeholder="Card Number" required>
                                </div>
                            </div>
                            <div class="row gx-30 mt-20">
                                <div class="col-md-6">
                                    <label for="expiry_date" class="form-label">Expiry Date</label>
                                    <input type="text" name="expiry_date" id="expiry_date" class="form-control" placeholder="MM/YY" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="cvv" class="form-label">CVV</label>
                                    <input type="text" name="cvv" id="cvv" class="form-control" placeholder="CVV" required>
                                </div>
                            </div>
                            <p class="form-text mt-20">Your card is charged AFTER the appointment is completed.</p>
                        </div>
                        <div class="section-divider"></div>

                        <!-- Terms Agreement -->
                        <div class="form-group mb-30">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    I affirm that I have read and agree to the Terms of Service and Privacy Policy.
                                </label>
                            </div>
                            <p class="form-text mt-20">
                                By entering information, you affirm you have read and agree to the Terms of Service and Privacy Policy.
                                Bookings are also subject to our affiliates and their networks to deliver marketing and other material.
                                The information provided above will be stored securely by us.
                            </p>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center">
                            <button type="submit" class="th-btn">Save Booking</button>
                        </div>

                        <p class="form-messages mt-20 text-center"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
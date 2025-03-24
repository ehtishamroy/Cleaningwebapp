@extends('layouts.admin')
@section('styles')
    <style>
   .extra-image-container {
    position: relative;
    width: 100%;
    max-width: 120px;
    margin: 0 auto;
    cursor: pointer;
}

.extra-image {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 10px;
    transition: opacity 0.3s ease;
}

.overlay {
    position: absolute;
    width: 90px;
    height: 35px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(0, 0, 0, 0.7);
    color: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
    opacity: 0;
    transition: opacity 0.3s ease;
    border-radius: 20px;
    padding: 5px;
}

.qty-btn {
    background: transparent;
    border: none;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    width: 25px;
    text-align: center;
}

.overlay-quantity {
    font-size: 14px;
    font-weight: bold;
}

/* Show overlay on hover */
.extra-image-container:hover .overlay {
    opacity: 1;
}

    </style>
@endsection
@section('content')

<div class="card">
    <div class="card-header">
       Create Booking
    </div>
 
    <div class="card-body">
        <form method="POST" action="{{ route('admin.booking.store') }}">
            @csrf
          
            <!-- Customer Dropdown -->
            <div class="form-group">
                <label class="required" for="customer_id">Customer</label>
                <select class="form-control {{ $errors->has('customer_id') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" data-address="{{ $customer->address }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('customer_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_id') }}
                    </div>
                @endif
            </div>

            <!-- Service Dropdown -->
            <div class="form-group">
                <label class="required" for="service_id">Service</label>
                <select class="form-control {{ $errors->has('service_id') ? 'is-invalid' : '' }}" name="service_id" id="service_id" required>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" data-price="{{ $service->price }}"  {{ old('service_id') == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('service_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('service_id') }}
                    </div>
                @endif
            </div>
<!-- Select Extras -->
<div class="form-group mb-30">
    <label class="form-label">Select Extras</label>
    <div class="row gx-30">
        @foreach($extras as $extra)
            <div class="col-6 col-md-3 mt-10 extra-item">
                <div class="extra-image-container" data-extra-id="{{ $extra->id }}">
                    <img src="{{ asset('storage/extras/'.$extra->image) }}" alt="{{ $extra->name }}" class="extra-image" />
                    <div class="overlay" id="overlay-extra-{{ $extra->id }}">
                        <button type="button" class="qty-btn decrease" data-extra-id="{{ $extra->id }}">-</button>
                        <span class="overlay-quantity" id="overlay-qty-{{ $extra->id }}">1</span>
                        <button type="button" class="qty-btn increase" data-extra-id="{{ $extra->id }}">+</button>
                    </div>
                    <input type="checkbox" class="extra-checkbox" name="extras[]" 
                           id="extra-{{ $extra->id }}" value="{{ $extra->id }}" hidden>
                    <input type="hidden" name="extra_quantities[{{ $extra->id }}]" 
                           id="input-extra-qty-{{ $extra->id }}" value="0">
                </div>
                <p class="extra-name text-center mt-2">{{ $extra->name }} (${{ $extra->price }})</p>
            </div>
        @endforeach
    </div>
</div>


            <!-- Duration Dropdown -->
            <div class="form-group">
                <label class="required" for="duration_id">Duration</label>
                <select class="form-control {{ $errors->has('duration_id') ? 'is-invalid' : '' }}" name="duration_id" id="duration_id" required>
                    @foreach($durations as $duration)
                        <option value="{{ $duration->id }}" {{ old('duration_id') == $duration->id ? 'selected' : '' }}>
                            {{ $duration->name }} 
                        </option>
                    @endforeach
                </select>
                @if($errors->has('duration_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('duration_id') }}
                    </div>
                @endif
            </div>

            <!-- Booking Date Field -->
            <div class="form-group">
                <label class="required" for="booking_date">Booking Date</label>
                <input class="form-control {{ $errors->has('booking_date') ? 'is-invalid' : '' }}" type="date" name="booking_date" id="booking_date" value="{{ old('booking_date') }}" required>
                @if($errors->has('booking_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('booking_date') }}
                    </div>
                @endif
            </div>
{{-- Booking time --}}
            <div class="form-group">
                <label for="time" class="required" >Time</label>
                <select name="time" id="time" class="form-control" required>
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
{{-- Address --}}
<div class="form-group">
    <label class="required" for="address">Address</label>
    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address') }}" required readonly>
    @if($errors->has('address'))
        <div class="invalid-feedback">
            {{ $errors->first('address') }}
        </div>
    @endif
</div>

            <!-- Payment Field -->
            <div class="form-group">
                <label class="required" for="payment">Payment</label>
                <input class="form-control {{ $errors->has('payment') ? 'is-invalid' : '' }}" type="number" step="0.01" name="payment" id="payment" value="{{ old('payment') }}" required readonly>
                @if($errors->has('payment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment') }}
                    </div>
                @endif
            </div>
           <!-- Review Given (Dropdown) -->
<div class="form-group">
    <label class="required" for="review_given">Review Given</label>
    <select class="form-control {{ $errors->has('review_given') ? 'is-invalid' : '' }}" name="review_given" id="review_given" required>
        <option value="0" {{ old('review_given') == '0' ? 'selected' : '' }}>No</option>
        <option value="1" {{ old('review_given') == '1' ? 'selected' : '' }}>Yes</option>
    </select>
    @if($errors->has('review_given'))
        <div class="invalid-feedback">
            {{ $errors->first('review_given') }}
        </div>
    @endif
</div>

<!-- Follow Up (Dropdown) -->
<div class="form-group">
    <label class="required" for="is_follow_up">Follow Up</label>
    <select class="form-control {{ $errors->has('is_follow_up') ? 'is-invalid' : '' }}" name="is_follow_up" id="is_follow_up" required>
        <option value="0" {{ old('is_follow_up') == '0' ? 'selected' : '' }}>No</option>
        <option value="1" {{ old('is_follow_up') == '1' ? 'selected' : '' }}>Yes</option>
    </select>
    @if($errors->has('is_follow_up'))
        <div class="invalid-feedback">
            {{ $errors->first('is_follow_up') }}
        </div>
    @endif
</div>

<!-- Cancelled (Dropdown) -->
<div class="form-group">
    <label class="required" for="is_cancelled">Cancelled</label>
    <select class="form-control {{ $errors->has('is_cancelled') ? 'is-invalid' : '' }}" name="is_cancelled" id="is_cancelled" required>
        <option value="0" {{ old('is_cancelled') == '0' ? 'selected' : '' }}>No</option>
        <option value="1" {{ old('is_cancelled') == '1' ? 'selected' : '' }}>Yes</option>
    </select>
    @if($errors->has('is_cancelled'))
        <div class="invalid-feedback">
            {{ $errors->first('is_cancelled') }}
        </div>
    @endif
</div>

<!-- Is Waiting (Dropdown) -->
<div class="form-group">
    <label class="required" for="is_waiting">Is Waiting</label>
    <select class="form-control {{ $errors->has('is_waiting') ? 'is-invalid' : '' }}" name="is_waiting" id="is_waiting" required>
        <option value="0" {{ old('is_waiting') == '0' ? 'selected' : '' }}>No</option>
        <option value="1" {{ old('is_waiting') == '1' ? 'selected' : '' }}>Yes</option>
    </select>
    @if($errors->has('is_waiting'))
        <div class="invalid-feedback">
            {{ $errors->first('is_waiting') }}
        </div>
    @endif
</div>

<!-- Someone at Home (Dropdown) -->
<div class="form-group">
    <label class="required" for="someone_at_home">Someone at Home</label>
    <select class="form-control {{ $errors->has('someone_at_home') ? 'is-invalid' : '' }}" name="someone_at_home" id="someone_at_home" required>
        <option value="0" {{ old('someone_at_home') == '0' ? 'selected' : '' }}>No</option>
        <option value="1" {{ old('someone_at_home') == '1' ? 'selected' : '' }}>Yes</option>
    </select>
    @if($errors->has('someone_at_home'))
        <div class="invalid-feedback">
            {{ $errors->first('someone_at_home') }}
        </div>
    @endif
</div>

<!-- Bedrooms (Number Input) -->
<div class="form-group">
    <label class="required" for="bedrooms">Bedrooms</label>
    <input class="form-control {{ $errors->has('bedrooms') ? 'is-invalid' : '' }}" type="number" name="bedrooms" id="bedrooms" value="{{ old('bedrooms') }}" required>
    @if($errors->has('bedrooms'))
        <div class="invalid-feedback">
            {{ $errors->first('bedrooms') }}
        </div>
    @endif
</div>

<!-- Bathrooms (Number Input) -->
<div class="form-group">
    <label class="required" for="bathrooms">Bathrooms</label>
    <input class="form-control {{ $errors->has('bathrooms') ? 'is-invalid' : '' }}" type="number" name="bathrooms" id="bathrooms" value="{{ old('bathrooms') }}" required>
    @if($errors->has('bathrooms'))
        <div class="invalid-feedback">
            {{ $errors->first('bathrooms') }}
        </div>
    @endif
</div>

<!-- Instructions for Home Access (Textarea) -->
<div class="form-group">
    <label for="instructions_home_access">Instructions for Home Access</label>
    <textarea class="form-control {{ $errors->has('instructions_home_access') ? 'is-invalid' : '' }}" name="instructions_home_access" id="instructions_home_access">{{ old('instructions_home_access') }}</textarea>
    @if($errors->has('instructions_home_access'))
        <div class="invalid-feedback">
            {{ $errors->first('instructions_home_access') }}
        </div>
    @endif
</div>

<!-- Hide Keys (Dropdown) -->
<div class="form-group">
    <label class="required" for="hide_keys">Hide Keys</label>
    <select class="form-control {{ $errors->has('hide_keys') ? 'is-invalid' : '' }}" name="hide_keys" id="hide_keys" required>
        <option value="0" {{ old('hide_keys') == '0' ? 'selected' : '' }}>No</option>
        <option value="1" {{ old('hide_keys') == '1' ? 'selected' : '' }}>Yes</option>
    </select>
    @if($errors->has('hide_keys'))
        <div class="invalid-feedback">
            {{ $errors->first('hide_keys') }}
        </div>
    @endif
</div>

{{-- SMS Reminder --}}
<div class="form-group">
    <label class="required" for="sms_reminder">SMS Reminder</label>

    <select class="form-control {{ $errors->has('sms_reminder') ? 'is-invalid' : '' }}" name="sms_reminder" id="sms_reminder" required>
        <option value="0" {{ old('sms_reminder') == '0' ? 'selected' : '' }}>No</option>
        <option value="1" {{ old('sms_reminder') == '1' ? 'selected' : '' }}>Yes</option>
    </select>
    
    @if($errors->has('sms_reminder'))
        <div class="invalid-feedback">
            {{ $errors->first('sms_reminder') }}
        </div>
    @endif
</div>

            <!-- Submit Button -->
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let selectedExtras = {};
    
        document.querySelectorAll('.extra-image-container').forEach(container => {
            container.addEventListener('click', function () {
                const extraId = this.getAttribute('data-extra-id');
                const overlay = document.getElementById(`overlay-extra-${extraId}`);
                const qtyDisplay = document.getElementById(`overlay-qty-${extraId}`);
                const inputQty = document.getElementById(`input-extra-qty-${extraId}`);
                const checkbox = document.getElementById(`extra-${extraId}`);
    
                if (!selectedExtras[extraId]) {
                    // Select Extra
                    overlay.style.opacity = "1";
                    qtyDisplay.innerText = "1";
                    inputQty.value = 1;
                    checkbox.checked = true;
    
                    selectedExtras[extraId] = 1;
                } else {
                    // Deselect Extra
                    overlay.style.opacity = "0";
                    qtyDisplay.innerText = "0";
                    inputQty.value = 0;
                    checkbox.checked = false;
    
                    delete selectedExtras[extraId];
                }
            });
        });
    
        // Handle quantity updates
        document.querySelectorAll('.qty-btn').forEach(button => {
            button.addEventListener('click', function (event) {
                event.stopPropagation(); // Prevent parent click event
    
                const extraId = this.getAttribute('data-extra-id');
                const qtyDisplay = document.getElementById(`overlay-qty-${extraId}`);
                const inputQty = document.getElementById(`input-extra-qty-${extraId}`);
    
                if (!selectedExtras[extraId]) return;
    
                let quantity = parseInt(qtyDisplay.textContent) || 1;
    
                if (this.classList.contains('increase')) {
                    quantity++;
                } else if (this.classList.contains('decrease') && quantity > 1) {
                    quantity--;
                }
    
                selectedExtras[extraId] = quantity;
                qtyDisplay.innerText = quantity;
                inputQty.value = quantity;
            });
        });
    });
    </script>
    
<script>
// document.addEventListener('DOMContentLoaded', function () {
//     let selectedExtras = {};

//     document.querySelectorAll('.extra-image-container').forEach(container => {
//         container.addEventListener('click', function () {
//             const extraId = this.getAttribute('data-extra-id');
//             const overlay = document.getElementById(`overlay-extra-${extraId}`);
//             const qtyDisplay = document.getElementById(`overlay-qty-${extraId}`);
//             const inputQty = document.getElementById(`input-extra-qty-${extraId}`);
//             const checkbox = document.getElementById(`extra-${extraId}`);

//             if (!selectedExtras[extraId]) {
//                 // Select Extra
//                 overlay.style.opacity = "1";
//                 qtyDisplay.innerText = "1";
//                 inputQty.value = 1;
//                 checkbox.checked = true;

//                 selectedExtras[extraId] = 1;
//             } else {
//                 // Deselect Extra
//                 overlay.style.opacity = "0";
//                 qtyDisplay.innerText = "0";
//                 inputQty.value = 0;
//                 checkbox.checked = false;

//                 delete selectedExtras[extraId];
//             }
//         });
//     });

//     // Handle quantity updates
//     document.querySelectorAll('.qty-btn').forEach(button => {
//         button.addEventListener('click', function (event) {
//             event.stopPropagation(); // Prevent parent click event

//             const extraId = this.getAttribute('data-extra-id');
//             const qtyDisplay = document.getElementById(`overlay-qty-${extraId}`);
//             const inputQty = document.getElementById(`input-extra-qty-${extraId}`);

//             if (!selectedExtras[extraId]) return;

//             let quantity = parseInt(qtyDisplay.textContent) || 1;

//             if (this.classList.contains('increase')) {
//                 quantity++;
//             } else if (this.classList.contains('decrease') && quantity > 1) {
//                 quantity--;
//             }

//             selectedExtras[extraId] = quantity;
//             qtyDisplay.innerText = quantity;
//             inputQty.value = quantity;
//         });
//     });
// });

    document.addEventListener('DOMContentLoaded', function () {
        // Get the service dropdown and payment input fields
        const serviceSelect = document.getElementById('service_id');
        const paymentInput = document.getElementById('payment');

        // Function to update the payment field based on selected service
        function updatePayment() {
            const selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
            const servicePrice = selectedOption.getAttribute('data-price');
            paymentInput.value = servicePrice; // Set the payment field value to the service price
        }

        // Run the function when the page loads (in case a service was pre-selected)
        updatePayment();

        // Run the function when the service is changed
        serviceSelect.addEventListener('change', updatePayment);


        const customerSelect = document.getElementById('customer_id');
        const addressField = document.getElementById('address');

        // Update address field when customer is selected
        customerSelect.addEventListener('change', function() {
            const selectedOption = customerSelect.options[customerSelect.selectedIndex];
            const customerAddress = selectedOption.getAttribute('data-address');
            addressField.value = customerAddress; // Set the address in the input field
        });

        // Set the initial address when the page loads (if there's a selected customer)
        if (customerSelect.value) {
            const selectedOption = customerSelect.options[customerSelect.selectedIndex];
            const customerAddress = selectedOption.getAttribute('data-address');
            addressField.value = customerAddress;
        }
    });
</script>

@endsection
@extends('layouts.admin')
@section('content')

<div class="card-body">
    <form method="POST" action="{{ route('admin.booking.update', $booking->id) }}">
        @csrf
    

        <!-- Customer Dropdown -->
        <div class="form-group">
            <label class="required" for="customer_id">Customer</label>
            <select class="form-control {{ $errors->has('customer_id') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id', $booking->customer_id) == $customer->id ? 'selected' : '' }}>
                        {{ $customer->email }}
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
                    <option value="{{ $service->id }}" {{ old('service_id', $booking->service_id) == $service->id ? 'selected' : '' }}>
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

        <!-- Duration Dropdown -->
        <div class="form-group">
            <label class="required" for="duration_id">Duration</label>
            <select class="form-control {{ $errors->has('duration_id') ? 'is-invalid' : '' }}" name="duration_id" id="duration_id" required>
                @foreach($durations as $duration)
                    <option value="{{ $duration->id }}" {{ old('duration_id', $booking->duration_id) == $duration->id ? 'selected' : '' }}>
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
            <input class="form-control {{ $errors->has('booking_date') ? 'is-invalid' : '' }}" type="date" name="booking_date" id="booking_date" value="{{ old('booking_date', $booking->booking_date) }}" required>
            @if($errors->has('booking_date'))
                <div class="invalid-feedback">
                    {{ $errors->first('booking_date') }}
                </div>
            @endif
        </div>

        <!-- Address Field -->
        <div class="form-group">
            <label class="required" for="address">Address</label>
            <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $booking->address) }}" required>
            @if($errors->has('address'))
                <div class="invalid-feedback">
                    {{ $errors->first('address') }}
                </div>
            @endif
        </div>

        <!-- Payment Field -->
        <div class="form-group">
            <label class="required" for="payment">Payment</label>
            <input class="form-control {{ $errors->has('payment') ? 'is-invalid' : '' }}" type="number" step="0.01" name="payment" id="payment" value="{{ old('payment', $booking->payment) }}" required>
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
                <option value="0" {{ old('review_given', $booking->review_given) == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('review_given', $booking->review_given) == '1' ? 'selected' : '' }}>Yes</option>
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
                <option value="0" {{ old('is_follow_up', $booking->is_follow_up) == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('is_follow_up', $booking->is_follow_up) == '1' ? 'selected' : '' }}>Yes</option>
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
                <option value="0" {{ old('is_cancelled', $booking->is_cancelled) == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('is_cancelled', $booking->is_cancelled) == '1' ? 'selected' : '' }}>Yes</option>
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
                <option value="0" {{ old('is_waiting', $booking->is_waiting) == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('is_waiting', $booking->is_waiting) == '1' ? 'selected' : '' }}>Yes</option>
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
                <option value="0" {{ old('someone_at_home', $booking->someone_at_home) == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('someone_at_home', $booking->someone_at_home) == '1' ? 'selected' : '' }}>Yes</option>
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
            <input class="form-control {{ $errors->has('bedrooms') ? 'is-invalid' : '' }}" type="number" name="bedrooms" id="bedrooms" value="{{ old('bedrooms', $booking->bedrooms) }}" required>
            @if($errors->has('bedrooms'))
                <div class="invalid-feedback">
                    {{ $errors->first('bedrooms') }}
                </div>
            @endif
        </div>

        <!-- Bathrooms (Number Input) -->
        <div class="form-group">
            <label class="required" for="bathrooms">Bathrooms</label>
            <input class="form-control {{ $errors->has('bathrooms') ? 'is-invalid' : '' }}" type="number" name="bathrooms" id="bathrooms" value="{{ old('bathrooms', $booking->bathrooms) }}" required>
            @if($errors->has('bathrooms'))
                <div class="invalid-feedback">
                    {{ $errors->first('bathrooms') }}
                </div>
            @endif
        </div>

        <!-- Instructions for Home Access (Textarea) -->
        <div class="form-group">
            <label for="instructions_home_access">Instructions for Home Access</label>
            <textarea class="form-control {{ $errors->has('instructions_home_access') ? 'is-invalid' : '' }}" name="instructions_home_access" id="instructions_home_access">{{ old('instructions_home_access', $booking->instructions_home_access) }}</textarea>
            @if($errors->has('instructions_home_access'))
                <div class="invalid-feedback">
                    {{ $errors->first('instructions_home_access') }}
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

@endsection

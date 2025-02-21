@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Create Booking
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('booking.store') }}">
            @csrf
          
            <!-- Customer Dropdown -->
            <div class="form-group">
                <label class="required" for="customer_id">Customer</label>
                <select class="form-control {{ $errors->has('customer_id') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
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
                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
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



            <div class="form-group">
                <label class="required" for="address">Address</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address') }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
            </div>

            <!-- Payment Field -->
            <div class="form-group">
                <label class="required" for="payment">Payment</label>
                <input class="form-control {{ $errors->has('payment') ? 'is-invalid' : '' }}" type="number" step="0.01" name="payment" id="payment" value="{{ old('payment') }}" required>
                @if($errors->has('payment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="review_given">Review Given</label>
                <input class="mx-1 form-check-input {{ $errors->has('review_given') ? 'is-invalid' : '' }}" type="checkbox" name="review_given" id="review_given" value="1" {{ old('review_given') ? 'checked' : '' }}>
                @if($errors->has('review_given'))
                    <div class="invalid-feedback">
                        {{ $errors->first('review_given') }}
                    </div>
                @endif
            </div>
            <!-- Is Follow-Up (Checkbox) -->
            <div class="form-group">
                <label for="is_follow_up">Follow Up</label>
                <input class="mx-1 form-check-input {{ $errors->has('is_follow_up') ? 'is-invalid' : '' }}" type="checkbox" name="is_follow_up" id="is_follow_up" value="1" {{ old('is_follow_up') ? 'checked' : '' }}>
                @if($errors->has('is_follow_up'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_follow_up') }}
                    </div>
                @endif
            </div>

            <!-- Is Cancelled (Checkbox) -->
            <div class="form-group">
                <label for="is_cancelled">Cancelled</label>
                <input class="mx-1 form-check-input {{ $errors->has('is_cancelled') ? 'is-invalid' : '' }}" type="checkbox" name="is_cancelled" id="is_cancelled" value="1" {{ old('is_cancelled') ? 'checked' : '' }}>
                @if($errors->has('is_cancelled'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_cancelled') }}
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

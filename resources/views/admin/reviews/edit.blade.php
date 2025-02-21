@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Update Review
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('admin.review.update',$review->id)}}">
            @csrf
    
            <!-- Booking Dropdown -->
            <div class="form-group">
                <label class="required" for="booking_id">Booking</label>
                <select class="form-control {{ $errors->has('booking_id') ? 'is-invalid' : '' }}" name="booking_id" id="booking_id" required>
                    @foreach($bookings as $booking)
                        <option value="{{ $booking->id }}" {{ $review->booking_id == $booking->id ? 'selected' : '' }}>
                            {{ $booking->id }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('booking_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('booking_id') }}
                    </div>
                @endif
            </div>
    
            <!-- Customer Dropdown -->
            <div class="form-group">
                <label class="required" for="customer_id">Customer</label>
                <select class="form-control {{ $errors->has('customer_id') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $review->customer_id == $customer->id ? 'selected' : '' }}>
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
    
            <!-- Review Field -->
            <div class="form-group">
                <label for="review">Review</label>
                <textarea class="form-control {{ $errors->has('review') ? 'is-invalid' : '' }}" name="review" id="review" rows="3" required>{{ old('review',$review->review) }}</textarea>
                @if($errors->has('review'))
                    <div class="invalid-feedback">
                        {{ $errors->first('review') }}
                    </div>
                @endif
            </div>
    
            <!-- Rating Field -->
            <div class="form-group">
                <label for="rating">Rating</label>
                <input class="form-control {{ $errors->has('rating') ? 'is-invalid' : '' }}" type="number" name="rating" id="rating" value="{{ old('rating',$review->rating) }}" min="1" max="5" required>
                @if($errors->has('rating'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rating') }}
                    </div>
                @endif
            </div>
    
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <div class="form-check">
                    <input class="form-check-input {{ $errors->has('status') ? 'is-invalid' : '' }}" type="checkbox" name="status" id="status" value="1" {{ old('status', $review->status) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="status">
                        Active
                    </label>
                </div>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
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

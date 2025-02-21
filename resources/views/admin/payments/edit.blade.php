@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Update Payment
    </div>

    <div class="card-body">
        <form method="POST" action="{{route('payment.update',$payment->id)}}">
            @csrf
          
            <!-- Customer Dropdown -->
            <div class="form-group">
                <label class="required" for="booking_id">Bookings</label>
                <select class="form-control {{ $errors->has('booking_id') ? 'is-invalid' : '' }}" name="booking_id" id="booking_id" required>
                    @foreach($bookings as $booking)
                        <option value="{{ $booking->id }}" {{ $payment->booking_id == $booking->id ? 'selected' : '' }}>
                            {{$booking->id }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('booking_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('booking_id') }}
                    </div>
                @endif
            </div>


            <!-- Payment Field -->
            <div class="form-group">
                <label class="required" for="payment">Payment</label>
                <input class="form-control {{ $errors->has('payment') ? 'is-invalid' : '' }}" type="number" step="0.01" name="payment" id="payment" value="{{ old('payment',$payment->payment) }}" required>
                @if($errors->has('payment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment') }}
                    </div>
                @endif
            </div>
       
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status',$payment->status) }}" required>
                @if($errors->has('payment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment') }}
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

@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        Booking Details
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Booking Date
                        </th>
                        <td>
                            {{ $booking->booking_date }}
                        </td>
                    </tr>                    
                    <tr>
                        <th>
                            Booking Time
                        </th>
                        <td>
                            {{ $booking->time }}
                        </td>
                    </tr>
                    {{-- <tr>
                        <th>
                            Address
                        </th>
                        <td>
                            {{ $booking->address }}
                        </td>
                    </tr> --}}
                    <tr>
                        <th>
                            Payment
                        </th>
                        <td>
                            ${{ number_format($booking->payment, 2) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Payment Status
                        </th>
                        <td>
                            {{$payment->status}}
                        </td>
                    </tr>
               <tr>
                        <th>
                            Payment ID
                        </th>
                        <td>
                            {{$payment->stripe_pay_id}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Follow Up
                        </th>
                        <td>
                            @if($booking->is_follow_up)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Cancelled
                        </th>
                        <td>
                            @if($booking->is_cancelled)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Review Given
                        </th>
                        <td>
                            @if($booking->review_given)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>                   
                    <tr>
                        <th>
                            Waiting
                        </th>
                        <td>
                            @if($booking->is_waiting)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>   
                    <tr>
                        <th>
                            Someone at Home
                        </th>
                        <td>
                            @if($booking->someone_at_home)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bedrooms
                        </th>
                        <td>
                            {{ $booking->bedrooms}}
                        </td>
                    </tr>                     
                    <tr>
                        <th>
                            Bathrooms
                        </th>
                        <td>
                            {{ $booking->bathrooms}}
                        </td>
                    </tr>                      
                    <tr>
                        <th>
                            Instructions for Home Access

                        </th>
                        <td>
                            {{ $booking->instructions_home_access}}
                        </td>
                    </tr>   
                    <tr>
                        <th>
                            Hide keys
                        </th>
                        <td>
                            @if($booking->hide_keys)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>        
                    <tr>
                        <th>
                            SMS Reminder

                        </th>
                        <td>
                            @if($booking->sms_reminder)
                            Yes
                        @else
                            No
                        @endif
                        </td>
                    </tr>           
                     <tr>
                        <th>
                            Customer Name
                        </th>
                        <td>
                            {{ $booking->customer->name }}
                        </td>
                    </tr>                    <tr>
                        <th>
                            Customer Phone
                        </th>
                        <td>
                            {{ $booking->customer->phone }}
                        </td>
                    </tr>                   
                     <tr>
                        <th>
                            Customer Email
                        </th>
                        <td>
                            {{ $booking->customer->email }}
                        </td>
                    </tr>                    
                     <tr>
                        <th>
                            Customer Address
                        </th>
                        <td>
                            {{ $booking->customer->address }}
                        </td>
                    </tr>                   
                     <tr>
                        <th>
                            Customer Apartment Number
                        </th>
                        <td>
                            {{ $booking->customer->apt_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>Summary</th>
                        <td>
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    Booking Summary
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Service Name</th>
                                            <td>{{ $booking->service->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Service Price</th>
                                            <td>${{ number_format($booking->service->price, 2) }}</td>
                                        </tr>
                    
                                        @php $extrasTotal = 0; @endphp
                                        @if ($booking->extras->isNotEmpty())
                                            <tr>
                                                <th colspan="2" class="bg-light text-center">Extras</th>
                                            </tr>
                                            <tr>
                                                <th>Extra Name</th>
                                                <th>Price x Quantity = Total</th>
                                            </tr>
                                            @foreach ($booking->extras as $extra)
                                                @php
                                                    $extraTotal = $extra->count * $extra->price;
                                                    $extrasTotal += $extraTotal;
                                                @endphp
                                                <tr>
                                                    <td>{{ $extra->extra->name }}</td>
                                                    <td>${{ number_format($extra->price, 2) }} x {{ $extra->count }} = ${{ number_format($extraTotal, 2) }}</td>
                                                </tr>
                                            @endforeach
                                            <tr class="bg-light">
                                                <th>Extras Total</th>
                                                <td><strong>${{ number_format($extrasTotal, 2) }}</strong></td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="2" class="text-center">No extras selected.</td>
                                            </tr>
                                        @endif
                    
                                        <tr class="table-success">
                                            <th>Total Price</th>
                                            <td><strong>${{ number_format($booking->service->price + $extrasTotal, 2) }}</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                            Customer Phone
                        </th>
                        <td>
                            {{ $booking->customer->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Customer Address
                        </th>
                        <td>
                            {{ $booking->customer->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Frequency Name
                        </th>
                        <td>
                            {{ $booking->duration->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Frequency Status
                        </th>
                        <td>
                            @if($booking->duration->status)
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Service Name
                        </th>
                        <td>
                            {{ $booking->service->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Service Description
                        </th>
                        <td>
                            {{ $booking->service->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Service Price
                        </th>
                        <td>
                            ${{ number_format($booking->service->price, 2) }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bookings') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

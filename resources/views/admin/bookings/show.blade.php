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
                    </tr>                    <tr>
                        <th>
                            Customer Email
                        </th>
                        <td>
                            {{ $booking->customer->email }}
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
                            Duration Name
                        </th>
                        <td>
                            {{ $booking->duration->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Duration Status
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

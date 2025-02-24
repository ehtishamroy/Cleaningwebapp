@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        Review Details
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Review ID
                        </th>
                        <td>
                            {{ $review->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Booking ID
                        </th>
                        <td>
                            {{ $review->booking->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Booking Date
                        </th>
                        <td>
                            {{ $review->booking->booking_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Address
                        </th>
                        <td>
                            {{ $review->booking->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Payment
                        </th>
                        <td>
                            ${{ number_format($review->booking->payment, 2) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Follow Up
                        </th>
                        <td>
                            @if($review->booking->is_follow_up)
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
                            @if($review->booking->is_cancelled)
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
                            @if($review->booking->review_given)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Review Content
                        </th>
                        <td>
                            {{ $review->review ?? 'No review provided' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Rating
                        </th>
                        <td>
                            {{ $review->rating ?? 'No rating provided' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Review Status
                        </th>
                        <td>
                            @if($review->status)
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Customer Email
                        </th>
                        <td>
                            {{ $review->customer->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Customer Phone
                        </th>
                        <td>
                            {{ $review->customer->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Customer Address
                        </th>
                        <td>
                            {{ $review->customer->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Duration Name
                        </th>
                        <td>
                            {{ $review->booking->duration->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Duration Status
                        </th>
                        <td>
                            @if($review->booking->duration->status)
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
                            {{ $review->booking->service->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Service Description
                        </th>
                        <td>
                            {{ $review->booking->service->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Service Price
                        </th>
                        <td>
                            ${{ number_format($review->booking->service->price, 2) }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reviews') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

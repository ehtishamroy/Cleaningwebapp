@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        Payment Details
    </div>

    <div class="card-body">
        <div class="form-group">
           
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Payment ID
                        </th>
                        <td>
                            {{ $payment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Payment Amount
                        </th>
                        <td>
                            ${{ number_format($payment->payment, 2) }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Payment Status
                        </th>
                        <td>
                            {{ $payment->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Booking ID
                        </th>
                        <td>
                            {{ $payment->booking->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Booking Date
                        </th>
                        <td>
                            {{ $payment->booking->booking_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Review Given
                        </th>
                        <td>
                            @if($payment->booking->review_given)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Address
                        </th>
                        <td>
                            {{ $payment->booking->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Is Follow Up
                        </th>
                        <td>
                            @if($payment->booking->is_follow_up)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Is Cancelled
                        </th>
                        <td>
                            @if($payment->booking->is_cancelled)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payments') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

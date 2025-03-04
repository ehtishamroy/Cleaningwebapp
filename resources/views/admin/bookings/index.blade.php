@extends('layouts.admin')
@section('content')
<div class="content">
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
        <div class="row">
            <div class="col-lg-12">
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        @can('booking_create')
                       
                        <a class="btn btn-success" href="{{route('admin.booking.create')}}">
                            Add new Booking
                        </a>
                             
                        @endcan
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Bookings
                    </div>
        
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatable datatable-User">
                                <thead>
                                    <tr>
                                        <th>
                                        </th>
                                        <th>
                                            Customer Name
                                        </th>                                                                               
                                        <th>
                                            Customer Phone Number
                                        </th>                                       
                                        <th>
                                            Customer Email
                                        </th>
                                        <th>
                                            Booking Date
                                        </th>
                                        <th>
                                            Service Name
                                        </th>
                                        <th>
                                            Duration Name
                                        </th>
                                        <th>
                                            Review Given
                                        </th>
                                        <th>
                                            Address
                                        </th>
                                        <th>
                                            Payment
                                        </th>
                                        <th>
                                            Follow Up
                                        </th>
                                        <th>
                                            Cancelled
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                    <tr data-entry-id="{{ $booking->id }}">
                                        <td>
                                            {{-- {{ $booking->id }} --}}
                                        </td>
                                        <td>
                                            {{  $booking->customer->name}}
                                        </td>                                        
                                        <td>
                                            {{  $booking->customer->phone}}
                                        </td>                                        <td>
                                            {{  $booking->customer->email}}
                                        </td>
                                        <td>
                                            {{ $booking->booking_date }}
                                        </td>
                                        <td>
                                            {{$booking->service->name}} 
                                        </td>
                                        <td>
                                            {{$booking->duration->name }} 
                                        </td>
                                        <td>
                                            {{ $booking->review_given ? 'Yes' : 'No' }}
                                        </td>
                                        <td>
                                            {{ $booking->address }}
                                        </td>
                                        <td>
                                            ${{ number_format($booking->payment, 2) }}
                                        </td>
                                        <td>
                                            {{ $booking->is_follow_up ? 'Yes' : 'No' }}
                                        </td>
                                        <td>
                                            {{ $booking->is_cancelled ? 'Yes' : 'No' }}
                                        </td>
                                        <td>
                                            @can('booking_show')
                                                
                                            
                                            <a href="{{route('admin.booking.show',$booking->id)}}" class="view-icon text-info mx-1">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @endcan
                                            @can('booking_edit')
                                                
                                          
                                            <a href="{{route('admin.booking.edit',$booking->id)}}" class="edit-icon text-warning mx-1">
                                                <i class="fas fa-edit"></i> 
                                            </a>
                                            @endcan
                                            @can('booking_delete')
                                            
                                            <form action="{{route('admin.booking.delete',$booking->id)}}" method="POST" class="d-inline" id="bookingdeleteForm">
                                                @csrf
                                                <button type="submit" class="delete-icon text-danger mx-1" style="background: none; border: none;" onclick="return confirmDelete(event)">
                                                    <i class="fas fa-trash-alt"></i> 
                                                </button>
                                            </form>
                                                
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
</div>
@endsection
@section('scripts')
@parent
<script>
    @can('booking_delete')
        
   
     function confirmDelete(event) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete this booking?')) {
            document.getElementById('bookingdeleteForm').submit();
        }
    }
    @endcan
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
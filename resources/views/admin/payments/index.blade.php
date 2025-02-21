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
                    @can('payment_create')
                        
                    @endcan
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{route('payment.create')}}">
                            Add new Payment details
                        </a>
                    </div>
                    @endcan
                </div>
                <div class="card">
                    <div class="card-header">
                        Payments
                    </div>
        
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatable datatable-User">
                                <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Booking Id
                                        </th>
                                        <th>
                                            Payment
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                    <tr data-entry-id="{{ $payment->id }}">
                                        <td>
                                            {{ $payment->id }}
                                        </td>
                             
                                        <td>
                                            {{ $payment->booking_id }}
                                        </td>       
                                        <td>
                                            {{ $payment->payment }}
                                        </td>
                                        <td>
                                            {{ $payment->status }}
                                        </td>
                                       
                                        <td>
                                            @can('payment_edit')
                                                
                                            
                                            <a href="{{route('payment.edit',$payment->id)}}" class="edit-icon text-warning mx-1">
                                                <i class="fas fa-edit"></i> 
                                            </a>
                                            @endcan
                                            @can('payment_delete')
                                           
                                            <form action="{{route('payment.delete',$payment->id)}}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="delete-icon text-danger mx-1" style="background: none; border: none;">
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
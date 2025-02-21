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
                        @can('customer_create')
                            
                        
                        <a class="btn btn-success" href="{{route('customer.create')}}">
                            Add new Customer
                        </a>
                        @endcan
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Services
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
                                          Email
                                        </th>
                                        <th>
                                          Phone
                                        </th>
                                        <th>
                                          Address
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                    <tr data-entry-id="{{ $customer->id }}">
                                        <td>
                                            {{ $customer->id }}
                                        </td>
                                        <td>
                                            {{ $customer->email }}
                                        </td>
                                        <td>
                                            {{ $customer->phone }}
                                        </td>                                        
                                        <td>
                                            {{ $customer->address }}
                                        </td>
                                        <td>
                                            @can('customer_edit')
                                                
                                        
                                            <a href="{{route('customer.edit',$customer->id)}}" class="edit-icon text-warning mx-1">
                                                <i class="fas fa-edit"></i> 
                                            </a>
                                            @endcan
                                            @can('customer_delete')
                                                
                                            
                                            <form action="{{route('customer.delete',$customer->id)}}" method="POST" class="d-inline">
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
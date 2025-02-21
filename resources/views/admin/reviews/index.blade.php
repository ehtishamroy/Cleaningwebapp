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
                    @can('review_create')
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{route('admin.review.create')}}">
                            Add new Review
                        </a>
                    </div>
                    @endcan
                </div>
                <div class="card">
                    <div class="card-header">
                        Reviews
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
                                            Customer Id
                                        </th>
                                        <th>
                                           Review
                                        </th>                                       
                                         <th>
                                           Rating
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
                                    @foreach ($reviews as $review)
                                    <tr data-entry-id="{{ $review->id }}">
                                        <td>
                                            {{ $review->id }}
                                        </td>
                             
                                        <td>
                                            {{ $review->booking_id }}
                                        </td>                                         
                                         <td>
                                            {{ $review->customer_id }}
                                        </td>       
                                        <td>
                                            {{ $review->review}}
                                        </td>                                        
                                        <td>
                                            {{ $review->rating}}
                                        </td>                                        
                                        <td>
                                            {{ $review->status == 1 ? 'Active' : 'Inactive' }}
                                        </td>
                                       
                                       
                                        <td>
                                            @can('review_edit')
                                                
                                            <a href="{{route('admin.review.edit',$review->id)}}" class="edit-icon text-warning mx-1">
                                                <i class="fas fa-edit"></i> 
                                            </a>
                                            @endcan

                                            @can('review_delete')
                                            <form action="{{route('admin.review.delete',$review->id)}}" method="POST" class="d-inline" id="reviewdeleteForm">
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
    @can('review_delete')
         function confirmDelete(event) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete this booking?')) {
            document.getElementById('reviewdeleteForm').submit();
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
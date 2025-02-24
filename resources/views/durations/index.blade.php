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
                @can('duration_create')
                <div class="col-lg-12">
                    <a class="btn btn-success" href="{{route('admin.duration.create')}}">
                        Add new Duration
                    </a>
                </div>
                @endcan
            </div>
            <div class="card">
                <div class="card-header">
                  Durations
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                            <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                       Name
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
                                @foreach ($durations as $duration )
                                <tr data-entry-id="{{ $duration->id ?? '' }}">
                                    <td>
                                        {{$duration->id}}
                                    </td>
                                    <td>
                                        {{$duration->name}}
                                    </td>
                                    <td>
                                        {{$duration->status == 1 ? 'Active' : 'inActive'}}
                                    </td>
                                    <td>
                                        @can('duration_show')
                                            
                                       
                                        <a href="{{route('admin.duration.show',$duration->id)}}" class="view-icon text-info mx-1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @endcan
                                        @can('duration_edit')
                                            
                                        
                                        <a href="{{route('admin.duration.edit',$duration->id)}}" class="edit-icon text-warning mx-1">
                                            <i class="fas fa-edit"></i> 
                                        </a>
                                        @endcan
                                        @can('duration_delete')
                                            
                                        
                                        <form action="{{route('admin.duration.delete',$duration->id)}}" method="POST" class="d-inline"  id="durationdeleteForm">
                                            @csrf
                                            <button type="submit" class="delete-icon text-danger mx-1" style="background: none; border: none;"onclick="return confirmDelete(event)">
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
    @can('duration_delete')
    function confirmDelete(event) 
    {
        event.preventDefault();
        if (confirm('Are you sure you want to delete this booking?')) {
            document.getElementById('durationdeleteForm').submit();
        }
    }
    @endcan
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
// @can('user_delete')
//   let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
//   let deleteButton = {
//     text: deleteButtonTrans,
//     url: "{{ route('admin.users.massDestroy') }}",
//     className: 'btn-danger',
//     action: function (e, dt, node, config) {
//       var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
//           return $(entry).data('entry-id')
//       });

//       if (ids.length === 0) {
//         alert('{{ trans('global.datatables.zero_selected') }}')

//         return
//       }

//       if (confirm('{{ trans('global.areYouSure') }}')) {
//         $.ajax({
//           headers: {'x-csrf-token': _token},
//           method: 'POST',
//           url: config.url,
//           data: { ids: ids, _method: 'DELETE' }})
//           .done(function () { location.reload() })
//       }
//     }
//   }
//   dtButtons.push(deleteButton)
// @endcan

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
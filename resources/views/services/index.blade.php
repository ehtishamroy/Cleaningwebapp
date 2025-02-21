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
                    @can('service_create')
                        
                   

                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{route('admin.service.create')}}">
                            Add new Service
                        </a>
                    </div>
                </div>
                @endcan
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
                                           Name
                                        </th>
                                        <th>
                                           Description
                                        </th>
                                        <th>
                                           Price
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
                                    @foreach ($services as $service)
                                    <tr data-entry-id="{{ $service->id }}">
                                        <td>
                                            {{ $service->id }}
                                        </td>
                                        <td>
                                            {{ $service->name }}
                                        </td>
                                        <td>
                                            {{ $service->description }}
                                        </td>
                                        <td>
                                            ${{ number_format($service->price, 2) }}
                                        </td>
                                        <td>
                                            {{ $service->status == 1 ? 'Active' : 'Inactive' }}
                                        </td>
                                        <td>
                                            @can('service_edit')
                                            <a href="{{ route('admin.service.edit', $service->id) }}" class="edit-icon text-warning mx-1">
                                                <i class="fas fa-edit"></i> 
                                            </a>

                                            @endcan
                                            @can('service_delete')
                                            <form action="{{ route('admin.service.delete', $service->id) }}" method="POST" class="d-inline"  id="servicedeleteForm">
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
     @can('service_delete')
         function confirmDelete(event) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete this booking?')) {
            document.getElementById('servicedeleteForm').submit();
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
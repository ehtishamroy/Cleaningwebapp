@extends('layouts.admin')
@section('styles')
    <style>
            .toggle-switch {
                position: relative;
                display: inline-block;
                width: 40px;
                height: 24px;
                }

            .toggle-switch input {
                opacity: 0;
                width: 0;
                height: 0;
                }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                transition: 0.4s;
                border-radius: 50px;
                }

            .slider:before {
                position: absolute;
                content: "";
                height: 18px; 
                width: 18px;   
                border-radius: 50%;
                left: 3px; 
                bottom: 3px;
                background-color: white;
                transition: 0.4s;
                }
            input:checked + .slider {
                background-color: #4CAF50;
                }

            input:checked + .slider:before {
                transform: translateX(16px);
                }
    </style>
@endsection
@section('content')
<div class="content">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div id="alert" style="display: none; padding: 10px; margin: 10px 0; border-radius: 5px;">
        
        </div>
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
                                    {{-- <th>
                                        Id
                                    </th> --}}
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
                                    {{-- <td>
                                        {{$duration->id}}
                                    </td> --}}
                                    <td>
                                        {{$duration->name}}
                                    </td>
                                    <td>
                                        {{-- {{$duration->status == 1 ? 'Active' : 'inActive'}} --}}
                                        <label class="toggle-switch">
                                            <input type="checkbox" 
                                                   id="customToggle{{ $duration->id }}" 
                                                   class="customToggle" 
                                                   onchange="toggleStatus({{ $duration->id }}, this)" {{ $duration->status == 1 ? 'checked' : '' }}>
                                            <span class="slider"></span>
                                        </label>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
      
function toggleStatus(serviceId, toggle) {
    const newStatus = toggle.checked ? 1 : 0;  
    $.ajax({
        url: '/admin/duration/status/' + serviceId,  
        type: 'POST',
        data: {
            "_token": "{{ csrf_token() }}",  
            "status": newStatus, 
        },
        success: function(response) {
            $('#alert').html(response.message) .css('display', 'block')
                .css('background-color', '#d4edda') 
                .css('color', '#155724');
        },
        error: function(xhr, status, error) {
            $('#alert').html('An error occurred. Please try again.') .css('display', 'block')
                .css('background-color', '#f8d7da') 
                .css('color', '#721c24'); 
        }
    });
}
 </script>
@endsection
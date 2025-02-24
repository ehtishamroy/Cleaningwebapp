@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        Duration Details
    </div>

    <div class="card-body">
        <div class="form-group">
           
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Id
                        </th>
                        <td>
                            {{ $duration->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Name
                        </th>
                        <td>
                            {{ $duration->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Status
                        </th>
                        <td>
                            @if($duration->status)
                                Active
                            @else
                               Inactive
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.durations') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

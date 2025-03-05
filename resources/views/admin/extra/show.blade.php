@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        Extra Details
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $extra->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Image
                        </th>
                        <td>
                            @if($extra->image)
                                <img src="{{ asset('storage/extras/' . $extra->image) }}" alt="Image" width="150">
                            @else
                                No Image Available
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Can Incremented
                        </th>
                        <td>
                            {{ $extra->can_incremented ? 'Yes' : 'No' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Status
                        </th>
                        <td>
                            @if($extra->status)
                                Active
                            @else
                               Inactive
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Price
                        </th>
                        <td>
                            ${{ number_format($extra->price, 2) }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.extra') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

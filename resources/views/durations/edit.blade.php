@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Create Service
    </div>

    <div class="card-body">
        <form method="POST" action="{{route('duration.update',$duration->id)}}" >
            @csrf
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name',$duration->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>            
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <div class="form-check">
                    <input class="form-check-input {{ $errors->has('status') ? 'is-invalid' : '' }}" type="checkbox" name="status" id="status" value="1" 
                    {{ old('status', $duration->status) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="status">
                        Active
                    </label>
                </div>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
            </div>
            
            

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
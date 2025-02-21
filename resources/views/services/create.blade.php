@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Create Service
    </div>

    <div class="card-body">
        <form method="POST" action="{{route('service.store')}}">
            @csrf
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
    
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description', '') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>
    
            <div class="form-group">
                <label class="required" for="price">Price</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" step="0.01" name="price" id="price" value="{{ old('price', '') }}" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
            </div>
    
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <div class="form-check">
                    <input class="form-check-input {{ $errors->has('status') ? 'is-invalid' : '' }}" type="checkbox" name="status" id="status" value="1" {{ old('status') ? 'checked' : '' }}>
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
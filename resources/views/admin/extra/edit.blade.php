@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Edit Extra
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.extra.update', $extra->id) }}" enctype="multipart/form-data">
            @csrf

            <!-- Name Field -->
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $extra->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <!-- Image Field -->
            <div class="form-group">
                <label for="image">Image</label>
                <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file" name="image" id="image">
                @if($extra->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/extras/' . $extra->image) }}" width="50" height="50">
                    </div>
                @endif
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
            </div>

            <!-- Price Field -->
            <div class="form-group">
                <label class="required" for="price">Price</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" step="0.01" name="price" id="price" value="{{ old('price', $extra->price) }}" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
            </div>

            <!-- Can Incremented Dropdown -->
            <div class="form-group">
                <label class="required" for="can_incremented">Can Incremented</label>
                <select class="form-control {{ $errors->has('can_incremented') ? 'is-invalid' : '' }}" name="can_incremented" id="can_incremented" required>
                    <option value="1" {{ old('can_incremented', $extra->can_incremented) == '1' ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('can_incremented', $extra->can_incremented) == '0' ? 'selected' : '' }}>No</option>
                </select>
                @if($errors->has('can_incremented'))
                    <div class="invalid-feedback">
                        {{ $errors->first('can_incremented') }}
                    </div>
                @endif
            </div>

            <!-- Status Dropdown -->
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value="1" {{ old('status', $extra->status) == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $extra->status) == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

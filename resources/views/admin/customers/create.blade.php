@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Create Service
    </div>

    <div class="card-body">
        <form method="POST" action="{{route('admin.customer.store')}}">
            @csrf
          
            <!-- Name Field -->
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="name" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>            
            <!-- Email Field -->
            <div class="form-group">
                <label class="required" for="email">Email</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', '') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
    
            <!-- Phone Field -->
            <div class="form-group">
                <label class="required" for="phone">Phone</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
            </div>
    
            <!-- Address Field -->
            <div class="form-group">
                <label class="required" for="address">Address</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
            </div>            
            <div class="form-group">
                <label class="required" for="apt_no">Apartment No</label>
                <input class="form-control {{ $errors->has('apt_no') ? 'is-invalid' : '' }}" type="number" name="apt_no" id="apt_no" value="{{ old('apt_no', '') }}" required>
                @if($errors->has('apt_no'))
                    <div class="invalid-feedback">
                        {{ $errors->first('apt_no') }}
                    </div>
                @endif
            </div>
    
            <!-- Submit Button -->
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

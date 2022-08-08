@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

<div class="card-body">
    <form method="POST" id="regForm" action="{{ route('user.store') }}">
        @csrf
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        
            
                


<div class="row mb-3">
    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

    <div class="col-md-6">
        <input id="confirmPassword" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>

<div class="row mb-3">
    <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

    <div class="col-md-6">
        <input id="status" type="radio" value="0" name="status">Active
        <input id="status" type="radio" value="1" name="status">inactive


        @error('status')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="col-md-6">
        <input  id="usertype" type="radio" value="0" name="usertype" hidden>
        <input id="usertype" type="radio" value="1" name="usertype"  hidden>
        <input id="usertype" type="radio" value="2" name="usertype" checked hidden>
</div>



<div class="row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
    </div>
</div>
</form>
</div>
<script>
        $(document).ready(function() {
            $("#regForm").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 20,
                    },
                    
                    email: {
                        required: true,
                        email: true,
                    },
                    
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength:10,
                    },
                    confirmPassword: {
                        required: true,
                        equalTo: "#password"
                    },
                    status: {
                        required: true,
                    },
                   
                },
                messages: {
                    name: {
                        required: "First name is required",
                        maxlength: "First name cannot be more than 20 characters"
                    },
                    email: {
                        required: "Email is required",
                        email: "Email must be a valid email address",
                        maxlength: "Email cannot be more than 50 characters",
                    },
                
                    password: {
                        required: "Password is required",
                        minlength: "Password must be at least 5 characters"
                    },
                    confirmPassword: {
                        required:  "Confirm password is required",
                        equalTo: "Password and confirm password should same"
                    },
                    status: {
                        required:  "Please select the gender",
                    },
                    
                     
                }
            });
        });
    </script>
@endsection
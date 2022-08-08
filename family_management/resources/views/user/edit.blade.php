@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>


<h2 style="text-align: center;"><b>Edit Profile </b> </h2><br>

<div class="card-body">
    <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

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
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('image') }}</label>

            <div class="col-md-6">
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('gender') }}</label>

            <div class="col-md-6">
                <input id="gender" type="radio" name="gender" value="male" {{ $user->gender=="male"?"checked":""}}>Male
                <input id="gender" type="radio" name="gender" value="female" {{ $user->gender=="female" ?"checked":"" }}>Female


                @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>

            <div class="col-md-6">
                <select name="age" class="form-control">
                    <option value="">Select</option>
                    <option value="18-30" {{ $user->age=="18-30"? "selected" : "" }}>18-30</option>
                    <option value="31-40" {{ $user->age=="31-40"? "selected" : "" }}>31-40</option>
                    <option value="above 40" {{ $user->age=="above 40"? "selected" : "" }}>Above 40</option>
                </select>

                @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="services" class="col-md-4 col-form-label text-md-end">{{ __('Services') }}</label>

            <div class="col-md-6">
                @foreach($works as $work)
                <input type="checkbox" id="services" name="services[]" value="{{$work->id}}">{{$work->work_name}}<br />

                @endforeach
                @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('update') }}
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

                image: {
                    required: true,

                },
                age: {
                    required: true,
                    equalTo: "#password"
                },
                services: {
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

                gender: {
                    required: "gender is required",
                },
                age: {
                    required: "Age is required",
                },
                services: {
                    required: "Please select the services",
                },


            }
        });
    });
</script>
@endsection
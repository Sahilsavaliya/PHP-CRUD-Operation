@extends('crud.layout')

@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="text-align: center;"><b> Add Admin </b> </h2><br>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('crud.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<form action="{{ route('crud.store') }}" method="POST" id="regForm">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong> Name:</strong>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->has('email') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Hobbies:</strong><br>
                    <input type="checkbox" id="hobbies" name="hobbies[]" value="Cricket">Cricket<br />
                    <input type="checkbox" id="hobbies" name="hobbies[]" value="Singing">Singing<br />
                    <input type="checkbox" id="hobbies" name="hobbies[]" value="Swimming">Swimming<br />
                    <input type="checkbox" id="hobbies" name="hobbies[]" value="Shopping">Shopping<br />

                    @if ($errors->has('hobbies'))
                    <span class="text-danger">{{ $errors->first('hobbies') }}</span>
                    @endif
                    <small id="CheckboxValidation" class="text-danger"></small><br>
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gender:</strong> &nbsp;
                    <input type="radio" id="gender" name="gender" value="male">Male
                    <input type="radio" id="gender" name="gender" value="female">Female

                    @if ($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="Enter Password">
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->last('password') }}</span>
                    @endif
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

</form>
</div>
@endsection
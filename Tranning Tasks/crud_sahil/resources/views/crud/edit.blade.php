@extends('crud.layout')
   
@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <h2 style="text-align: center;"><b>Edit Admin  </b> </h2><br>
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
  
    <form action="{{ route('crud.update',$crud->id) }}" method="POST">
    @csrf
    @method('PUT')
<div class="container">
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Name:</strong>
                <input type="text" name="name" class="form-control"value="{{ $crud->name }}" placeholder="Enter Name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" value="{{ $crud->email }}" placeholder="Enter Email">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->last('email') }}</span>
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Hobbies:</strong><br>
            <input type="checkbox" id="hobbies" name="hobbies[]" value="Cricket" {{ in_array('Cricket', $crud->hobbies) ? 'checked' : '' }}>Cricket<br />
            <input type="checkbox" id="hobbies" name="hobbies[]" value="Singing" {{ in_array('Singing', $crud->hobbies) ? 'checked' : '' }}>Singing<br />
            <input type="checkbox" id="hobbies" name="hobbies[]" value="Swimming" {{ in_array('Swimming', $crud->hobbies) ? 'checked' : '' }}>Swimming<br />
            <input type="checkbox" id="hobbies" name="hobbies[]" value="Shopping" {{ in_array('Shopping', $crud->hobbies) ? 'checked' : '' }}>Shopping<br />

            @if ($errors->has('hobbies'))
                    <span class="text-danger">{{ $errors->first('hobbies') }}</span>
                @endif
            <small id="CheckboxValidation" class="text-danger"></small><br>
            </div>
        </div>

       

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gender:</strong> &nbsp;
                <input type="radio"  name="gender" value="male"{{ $crud->gender=="male"?"checked":"" }} >Male
                <input type="radio"  name="gender" value="female"{{ $crud->gender=="female" ?"checked":"" }}>Female

                @if ($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
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
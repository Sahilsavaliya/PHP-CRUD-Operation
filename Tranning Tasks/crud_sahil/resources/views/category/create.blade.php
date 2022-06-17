@extends('crud.layout')
  
@section('content')
<div class="container" style="margin-top: 50px;">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <h2 style="text-align: center;"><b>Add Category</b> </h2><br>

        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('category.index') }}"> Back</a>
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
   
<form action="{{ route('category.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong>Category Name:</strong>
                <input type="text" name="cname" class="form-control" placeholder="Enter Name">
                @if ($errors->has('cname'))
                    <span class="text-danger">{{ $errors->first('cname') }}</span>
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Active:</strong>&nbsp;
                <input type="radio" name="active" value="yes" >Yes
                <input type="radio" name="active" value="no" >No

                @if ($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
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
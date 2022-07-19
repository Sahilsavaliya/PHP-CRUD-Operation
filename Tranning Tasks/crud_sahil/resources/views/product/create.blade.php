@extends('crud.layout')

@section('content')
<div class="container" style="margin-top: 50px;">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
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

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong>Category Name:</strong>
                <input type="text" name="pname" class="form-control" placeholder="Enter Name" value="{{old('pname')}}">
                @if ($errors->has('pname'))
                <span class="text-danger">{{ $errors->first('pname') }}</span>
                @endif
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <br>
                    <strong>category_id</strong>
                    <select name="category_id" class="form-control" value="{{old('category_id')}}" >
                        <option value="">Select</option>
                    @foreach($a as $key => $value)
                    <option value=" {{$value->id}}"> {{ $value->cname }}</option>
                    @endforeach
                    </select>

                    @if ($errors->has('category_id'))
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong>Images</strong>
                <input type="file" name="image" class="form-control" value="{{old('image')}}"> 
                @if ($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>
        </div>
        </div>

                <input type="hidden" name="createdby_user" class="form-control"  value="{{ Auth::user()->email }}">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Active:</strong>
                    <input type="radio" name="active_status" value="yes">Yes
                    <input type="radio" name="active" value="no">No

                    @if ($errors->has('active_status'))
                    <span class="text-danger">{{ $errors->first('active_status') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

</form>
<div>
@endsection
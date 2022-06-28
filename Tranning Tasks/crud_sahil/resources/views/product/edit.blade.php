@extends('crud.layout')

@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
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

    <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <br>
                    <strong>Product Name:</strong>
                    <input type="text" name="pname" class="form-control" value="{{ $product->pname }}"
                        placeholder="Enter Name">
                    @if ($errors->has('pname'))
                    <span class="text-danger">{{ $errors->first('pname') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select class="form-control" name="category_id">
                        <option value="">Select</option>
                        @foreach($a as $key => $value)
                        <option value="{{$value->cname}}" {{ $product->category_id=="$value->cname"? "selected" : "" }}>
                            {{$value->cname}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <br>
                    <strong>Images</strong>
                    <input type="file" name="image" class="form-control">
                    @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>
            </div>
           
            <img src=" {{asset('public/images/' . $product->image)}}" width="80" height="80">
           
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Active:</strong>
                    <input type="radio" name="active_status" value="yes"
                        {{ $product->active_status=="Yes"?"checked":"" }}>Yes
                    <input type="radio" name="active_status" value="no"
                        {{ $product->active_status=="No" ?"checked":"" }}>No

                    @if ($errors->has('active_status'))
                    <span class="text-danger">{{ $errors->first('active_status') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <input type="hidden" name="createdby_user" class="form-control" value="{{ Auth::user()->email }}">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>


    </form>
</div>
@endsection
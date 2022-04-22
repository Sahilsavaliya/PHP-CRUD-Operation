@extends('posts.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
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
  
    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>FirstName:</strong>
                    <input type="text" name="fname" value="{{ $post->fname }}" class="form-control" placeholder="Title">
                    @if ($errors->has('fname'))
                            <span class="text-danger">{{ $errors->first('fname') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>LastName:</strong>
                    <input type="text" name="lname" value="{{ $post->lname }}" class="form-control" placeholder="Title">
                    @if ($errors->has('lname'))
                            <span class="text-danger">{{ $errors->first('lname') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $post->email }}" class="form-control" placeholder="Email">
                    @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gender:</strong>
                    <input type="radio" name="gender" value="male"{{ $post->gender=="male"?"checked":"" }}> Male
                    <input type="radio" name="gender" value="female"{{ $post->gender=="female" ?"checked":"" }}> Female

                    @if ($errors->has('gender'))
                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                        <strong> Designation</strong>
                        
                            <select id="designation" name="designation" class="form-control">
                                <option value="">Choose Designation</option>
                                <option value="Jr.Software Devloper" {{$post->designation =="Jr.Software Devloper"?"selected=selected":""}}>Jr.Software Devloper</option>
                                <option value="Sr.Software Devloper" {{$post->designation =="Sr.Software Devloper"?"selected=selected":"" }}>Sr.Software Devloper</option>
                                <option value="Project Manager" {{$post->designation =="Project Manager"?"selected=selected":"" }}>Project Manager</option>
                                <option value="Business Analyst" {{$post->designation =="Business Analyst"?"selected=selected":""}}> Business Analyst</option>
                            </select>
                        </div>
                       
                    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Detail">{{ $post->description }}</textarea>
                    @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection
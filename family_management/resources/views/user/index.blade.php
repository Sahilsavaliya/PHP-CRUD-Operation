@extends('layouts.app')
@section('content')


<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">


                <h2><b style="text-align: center;"> user view </b> </h2><br>

            </div>



            <a class="btn btn-success" href="{{ route('user.export') }}"> Export</a>


        </div>
    </div>
    <br>

    <div id="msg">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
    </div>
    <br>

    <br><br>

    <form method="GET" action="{{ route('user.index') }}" style="margin: left;">
        <div class="row">
            <label for="filter" class="col-md-4 col-form-label text-md-end" ">{{ __('Filter') }}</label>
            <select name=" filter" class="col-md-4 col-form-label">
                <option value="">Select</option>

                @foreach($works as $work)
                <option value=" {{$work->id}}"> {{ $work->work_name }}</option>
                @endforeach
                </select>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('submit') }}
                    </button>
                </div>
                @error('filter')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
        </div>
    </form>

</form>
<br><br>

<table class="table table-bordered">

    <tr>

        <th>@sortablelink('id')</th>
        <th>@sortablelink('name')</th>
        <th>@sortablelink('email')</th>
        <th>@sortablelink('image')</th>
        <th>@sortablelink('gender')</th>
        <th>@sortablelink('age')</th>
        <th>@sortablelink('status')</th>
        <th>@sortablelink('services')</th>
      @if( Auth::user()->usertype == 0)
        <th width="200px">Action</th>
        @endif
      

    </tr>
    <tbody id="tbody">
        @foreach ($user as $users)
        <td>{{++$i}}</td>
        <td>{{!empty($users->name)?$users->name:''}}</td>
        <td>{{!empty($users->email)?$users->email:''}}</td>
        <td><img src=" {{asset('public/images/users/' . $users->image)}}" width="80" height="80"></td>
        <td>{{!empty($users->gender)?$users->gender:''}}</td>
        <td>{{!empty($users->age)?$users->age:''}}</td>
        <td>@if($users->status ==0) Active
            @else($users->status ==1)Deactivate
            @endif
        </td>

        <td>
            @foreach($users->dailyworks as $dailywork)
            {{!empty($dailywork->work_name)?$dailywork->work_name:''}},
            @endforeach
        </td>
       

        <td>
            @if( Auth::user()->id == $users->id)
            <form action="{{ route('user.edit',!empty($users->id)?$users->id:'') }}" method="get">

                <button type="submit" class="btn btn-primary">Edit</button>

            </form>
            @endif
            @if(Auth::user()->usertype == 0)
                   
                    <form action="{{ route('admin.active', $users->id) }}" method="get">

                        <button type="submit" class="btn btn-primary">Active</button>

                        <form action="{{ route('admin.inactive', $users->id) }}" method="get">

                        <button type="submit" class="btn btn-primary">Inactive</button>
                        
                        @endif



        </td>

        </tr>

        @endforeach

</table>
</div>
<div>

    {!! $user->appends(\Request::except('page'))->render() !!}

    @endsection
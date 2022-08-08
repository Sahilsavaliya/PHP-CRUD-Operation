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
                <h2 style="text-align: center;"><b> Admin List </b> </h2><br>
            </div>
        </div>
    </div>
    <a class="btn btn-success" href="{{ route('user.create') }}"> Crete New User</a>
    <div id="msg">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
    </div>
    <br>

    <br><br>
    <table class="table table-bordered">
        <tr>
            <th>@sortablelink('id')</th>
            <th>@sortablelink('name')</th>
            <th>@sortablelink('email')</th>
            <th>@sortablelink('image')</th>
            <th>@sortablelink('gender')</th>
            <th>@sortablelink('age')</th>
            <th>@sortablelink('services')</th>
            <th width="200px">Action</th>

        </tr>
        <tbody id="tbody">
            @foreach ($user as $user1)
            <td>{{++$i}}</td>
            <td>{{$user1->name}}</td>
            <td>{{$user1->email}}</td>
            <td><img src=" {{asset('public/images/users/' . $user1->image)}}" width="80" height="80"></td>
            <td>{{$user1->gender}}</td>
            <td>{{$user1->age}}</td>
            <td>
            @foreach($user1->dailyworks as $dailywork)
            {{$dailywork->work_name}},
            @endforeach
            </td>
            <td>
                <form action="{{ route('user.aprove', $user1->id) }}" method="get">

                    <button type="submit" class="btn btn-warning">Aprove</button>

                    
                       
            </td>
            </tr>
            @endforeach
    </table>
</div>
<div>
  
    @endsection
@extends('layouts.app')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                
           
                <h2 style="text-align: center;"><b> Admin List </b> </h2><br>
                
            </div>
           
            <div class="pull-right">
            @if(Auth::user()->roles_id == 1||Auth::user()->roles_id == 3||Auth::user()->roles_id == 4)
                <a class="btn btn-success" href="{{ route('user.create') }}"> Create New User</a>
                <a class="btn btn-success" href="{{ route('excel') }}"> Export Excel File</a>
                @endif
                @if(Auth::user()->roles_id == 2||Auth::user()->roles_id == 5||Auth::user()->roles_id == 6)
                <a class="btn btn-success" href="{{ route('role.index') }}"> Roles</a>
                @endif
                @if(Auth::user()->roles_id == 1)
                <a class="btn btn-success" href="{{ route('module.index') }}"> Module</a>
                @endif
            </div>
        </div>



        <div id="msg">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
        </div>

        <br><br>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role_name</th>
                @if(Auth::user()->roles_id == 3||Auth::user()->roles_id == 4){
                <th width="200px">Action</th>
                }
                @endif              
            </tr>
            <tbody id="tbody">
                @foreach ($user as  $user1)
                <tr>
                    <td>{{ $user1->id }}</td>
                    <td>{{ $user1->name }}</td>
                    <td>{{ $user1->email }}</td>
                   
                    <td>{{!empty($user1->roles)?$user1->roles->roles_name:''}}</td>
                   
                    <td>    
                        <form action="{{ route('user.destroy',$user1->id) }}" method="POST">
                        @if(Auth::user()->roles_id == 3){
                            <a class="btn btn-primary" href="{{ route('user.edit',$user1->id) }}">Edit</a>
                        }@endif
                            @csrf
                            @method('DELETE')
                            @if(Auth::user()->roles_id == 4){
                            <button type="submit" class="btn btn-danger delete">Delete</button>
                        }@endif
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>

    
  

@extends('layouts.app')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2 style="text-align: center;"><b> Roles List </b> </h2><br>
            </div>
           
            <div class="pull-right">
            @if(Auth::user()->roles_id == 2)
                <a class="btn btn-success" href="{{ route('role.create') }}"> Create New Role</a>
            @endif
                <a class="btn btn-success" href="{{ route('user.index') }}"> Home </a>

               

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
                <th>Role_Name</th>
                <th>Module_id</th>
                @if(Auth::user()->roles_id == 5||Auth::user()->roles_id == 6){
                <th >Action</th>
                }@endif
            </tr>
            <tbody id="tbody">
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->roles_name }}</td>
                    <td>{{!empty($role->modules)?$role->modules->modules_name:''}}</td>
                    
                    <td>    
                        <form action="{{ route('role.destroy',$role->id) }}" method="POST">
                        @if(Auth::user()->roles_id == 5){
                            <a class="btn btn-primary" href="{{ route('role.edit',$role->id) }}">Edit</a>
                        }@endif
                            @csrf
                            @method('DELETE')
                            @if(Auth::user()->roles_id == 6){
                            <button type="submit" class="btn btn-danger delete">Delete</button>
                            }@endif
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>


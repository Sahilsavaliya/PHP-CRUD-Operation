@extends('layouts.app')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2 style="text-align: center;"><b> Modules List </b> </h2><br>
            </div>
           
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('module.create') }}"> Create New module</a>
               
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
                <th>Name</th>
                
                <th width="200px">Action</th>
            </tr>
            <tbody id="tbody">
                @foreach ($modules as $key => $module)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $module->modules_name }}</td>
                    
                    <td>    
                        <form action="{{ route('module.destroy',$module->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('module.edit',$module->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>

    
    {!! $modules->links() !!}
    @endsection
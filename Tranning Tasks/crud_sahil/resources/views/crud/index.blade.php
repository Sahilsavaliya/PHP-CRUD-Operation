@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <h2 style="text-align: center;"><b> Admin List </b> </h2><br>
            </div>
            @if(auth()->user()->usertype ==' 1')
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('crud.create') }}"> Create New Admin</a>
                @endif
                <a class="btn btn-success" href="{{ route('product.index') }}"> Home </a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <br>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Hobbies</th>
            <th>Gender</th>
            @if(auth()->user()->usertype ==' 1')
            <th width="200px">Action</th>
            @endif
        </tr>
        <tbody id="tbody">
            @foreach ($data as $key => $value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>
                    @foreach($value->hobbies as $values)
                    {{$values}}
                    @endforeach
                </td>
                <td>{{ $value->gender }}</td>
                <td>
                    @if(auth()->user()->usertype ==' 1')
                    <form action="{{ route('crud.destroy',$value->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('crud.edit',$value->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endif
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
</div>
{!! $data->links() !!}
@endsection
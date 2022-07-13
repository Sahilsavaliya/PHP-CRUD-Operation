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
            @if(auth()->user()->usertype ==' 1')
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('crud.create') }}"> Create New Admin</a>
                @endif
                <a class="btn btn-success" href="{{ route('product.index') }}"> Home </a>

                <div class="float-end">
                    @if(request()->has('trashed'))
                    <a href="{{ route('crud.index') }}" class="btn btn-warning">View All products</a>
                    <a href="{{ route('crud.restoreAll') }}" class="btn btn-info">Restore All</a>
                    @else
                    <a href="{{ route('crud.index', ['trashed' => 'crud']) }}" class="btn btn-warning">View Deleted product</a>
                    @endif
                </div>

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

                        @if(request()->has('trashed'))
                        <form action="{{ route('crud.forcedlt',$value->id) }}" method="GET">
                            <a href="{{ route('crud.restore', $value->id) }}" class="btn btn-success">Restore</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete">Delete</button>
                        </form>
                        @else
                        <form action="{{ route('crud.destroy',$value->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('crud.edit',$value->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete">Delete</button>
                            @endif
                    @endif
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.delete').click(function(e) {
                if (!confirm('Are you sure you want to delete this admin?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
    {!! $data->links() !!}
    @endsection
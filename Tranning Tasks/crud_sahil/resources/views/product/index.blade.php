@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="text-align: center;"><b>Product List</b></h2><br>
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
                <a class="btn btn-success" href="{{ route('category.index') }}"> Category</a>
                <a class="btn btn-success" href="{{ route('crud.index') }}"> Admin</a>
                <div class="pull-right">
                </div>

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
            <th>Product Name</th>
            <th>Category Id</th>
            <th>Image</th>
            <th>Create By User Id</th>
            <th>Active</th>
            <th width="200px">Action</th>

        </tr>
        <tbody id="tbody">
            @foreach ($data as $key => $values)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $values->pname }}</td>
                <td>{{ $values->category_id }}</td>
                <td><img src=" {{asset('public/images/' . $values->image)}}" width="80" height="80"></td>
                <td>{{ $values->createdby_user }}</td>
                <td>{{ $values->active_status }}</td>
                <td>
                    <form action="{{ route('product.destroy',$values->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('product.edit',$values->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>



            </tr>
            @endforeach
    </table>
    {!! $data->links() !!}
    
</div>


@endsection
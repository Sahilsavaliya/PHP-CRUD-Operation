@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-align: center;"><b>Category List</b></h2><br>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
            <a class="btn btn-success" href="{{ route('product.index') }}"> Home</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
</div>
@endif
<br>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Category Name</th>
        <th>Active</th>
        <th width="200px">Action</th>
    </tr>
    <tbody id="tbody">
    @foreach ($data as $key => $value)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $value->cname }}</td>
        <td>{{ $value->active }}</td>
    <td>
        <form action="{{ route('category.destroy',$value->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('category.edit',$value->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
    </tr>
    @endforeach
</table>
</div>
{!! $data->links() !!}
@endsection
@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="text-align: center;"><b>Category List</b></h2><br>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
                <a class="btn btn-success" href="{{ route('product.index') }}"> Home</a>
                <div class="float-end">
                    @if(request()->has('trashed'))
                    <a href="{{ route('category.index') }}" class="btn btn-warning">View All category</a>
                    <a href="{{ route('category.restoreAll') }}" class="btn btn-info">Restore All</a>
                    @else
                    <a href="{{ route('category.index', ['trashed' => 'category']) }}" class="btn btn-warning">View
                        Deleted
                        category</a>
                    @endif
                </div>
            </div>
        </div>



        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
    </div>
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
                <td>{{ $value->id }}</td>
                <td>{{ $value->cname }}</td>
                <td>{{ $value->active }}</td>
                <td>
                    @if(request()->has('trashed'))
                    <a href="{{ route('category.restore', $value->id) }}" class="btn btn-success">Restore</a>
                    @else
                    <form action="{{ route('category.destroy',$value->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('category.edit',$value->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
    </table>

</div>

<script type="text/javascript">
$(document).ready(function() {
    $('.delete').click(function(e) {
        if (!confirm('Are you sure you want to delete this category?')) {
            e.preventDefault();
        }
    });
});
</script>

@endsection
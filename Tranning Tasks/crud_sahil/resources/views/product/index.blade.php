@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                @if(request()->has('trashed'))
                <h2 style="text-align: center;"><b> Delete Product List
                        <hr>
                    </b></h2><br>
                @else
                <h2 style="text-align: center;"><b>Product List
                        <hr>
                    </b></h2><br>
                @endif
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}"> Create New Product</a>
                <a class="btn btn-success" href="{{ route('category.index') }}"> Category</a>
                <a class="btn btn-success" href="{{ route('crud.index') }}"> Admin</a>

                <div class="float-end">
                    @if(request()->has('trashed'))
                    <a href="{{ route('product.index') }}" class="btn btn-warning">View All products</a>
                    <a href="{{ route('product.restoreAll') }}" class="btn btn-info">Restore All</a>
                    @else
                    <a href="{{ route('product.index', ['trashed' => 'product']) }}" class="btn btn-warning">View Deleted product</a>
                    @endif
                </div>
                <div class="pull-right">

                </div>

            </div>
        </div>
    </div>

    <div id="msg">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>
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
                <td>{{ $values->id }}</td>
                <td>{{ $values->pname }}</td>
                <td>{{ $values->category_id }}</td>
                <td><img src=" {{asset('public/images/' . $values->image)}}" width="80" height="80"></td>
                <td>{{ $values->createdby_user }}</td>
                <td>{{ $values->active_status }}</td>
                <td>

                    @if(request()->has('trashed'))
                    <form action="{{ route('product.forcedlt',$values->id) }}" method="GET">
                        <a href="{{ route('product.restore', $values->id) }}" class="btn btn-success">Restore</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete">Delete</button>
                    </form>
                    @else

                    <form action="{{ route('product.destroy',$values->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('product.edit',$values->id) }}">Edit</a>
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
            if (!confirm('Are you sure you want to delete this product?')) {
                e.preventDefault();
            }
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


{!! $data->links() !!}}
@endsection
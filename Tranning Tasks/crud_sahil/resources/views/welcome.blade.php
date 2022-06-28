@extends('layouts.app')
@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="text-align: center;"><b>Product List</b></h2><br>
            </div>

        </div>
    </div>
    <select name="category_id" id="category_id" class="form-control" style="width: 30%;">
        <option value="">All</option>
        @foreach($a as $key => $value)
        <option value=" {{ $value->cname }}"> {{ $value->cname }}</option>
        @endforeach
    </select>
    <br>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Category Id</th>
            <th>Image</th>
            <th>Create By User Id</th>
            <th>Active</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
$(document).ready(function() {
    $('#category_id').change(function() {
        var category = $(this).val();
        $.ajax({
            url: "{{route('filterProduct')}}",
            type: "GET",
            data: {
                'category': category
            },
            success: function(data) {
                var products = data;
                var html = '';
                if (products.length > 0) {
                    for (let i = 0; i < products.length; i++) {
                        html += '<tr>\
                                        <td>' + i + '</td>\
                                        <td>' + products[i]['pname'] + '</td>\
                                        <td>' + products[i]['category_id'] + '</td>\
                                        <td> <img src="public/images/' + products[i]['image'] + '"width="80" height="80"> </td>\
                                        <td>' + products[i]['createdby_user'] + '</td>\
                                        <td>' + products[i]['active_status'] + '</td>\
                                        </tr>';
                    }
                } else {
                    html += '<tr>\
                                    <td>No Products Found</td>\
                                    </tr>';
                }
                $("#tbody").html(html);
            }
        });
    });
});
</script>
@endsection
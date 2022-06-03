
@extends('posts.layout')
 
@section('content')


    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Crud App</h2><br>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>FirstName</th>
            <!-- <th>LastName</th> -->
            <th>Email</th>
            <th>Gender</th>
            <th>Designation</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->fname }} {{ $value->lname }}</td>
            <!-- <td>{{ $value->lname }}</td> -->
            <td>{{ $value->email }}</td>
            <td>{{ $value->gender }}</td>
            <td>{{ $value->designation }}</td>
            <td>{{ \Str::limit($value->description, 100) }}</td>
            <td>
                <form action="{{ route('posts.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('posts.show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('posts.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>  
        @endforeach
    </table>  
    <form action="{{ route('logout') }}" method="post">
       @csrf
       <button class="btn btn-danger" action="{{ route('logout') }}" type="submit">Logout</button>
</form>     
    <!-- <p>Date: {{ convertYmdToMdy('2022-02-12') }}</p>
    <p>Date: {{ convertMdyToYmd('02-12-2022') }}</p> -->
    {!! $data->links() !!}      
@endsection
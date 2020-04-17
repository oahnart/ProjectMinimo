@extends('admin.Layouts.app')
@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Created_at</th>
                <th>
                    <a href="{{route('add_category')}}" class="btn btn-primary">Add</a>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($category as $categories)
                <tr>
                    <td>{{$categories->id}}</td>
                    <td>{{$categories->category_name}}</td>
                    <td>{{$categories->description}}</td>
                    <td>{{$categories->created_at}}</td>
                    <th>
                        <a href="{{route('edit_category',$categories->id)}}" class="btn btn-primary">Edit</a>
                        <a onclick="return confirm('are you sure')" href="{{route('delete_category',$categories->id)}}" class="btn btn-primary">Delete</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
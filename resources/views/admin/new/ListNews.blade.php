@extends('admin.Layouts.app')
@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Created_at</th>
                <th>
                    <a href="{{route('add_news')}}" class="btn btn-primary">Add</a>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($news as $new)
                <tr>
                    <td>{{$new->id}}</td>
                    <td>
                        @foreach($categories as $category)
                            @if($new->category_id == $category->id)
                                <label>{{$category->category_name}}</label>
                            @endif
                        @endforeach
                    </td>
                    <td>{{$new->name}}</td>
                    <td><img class="news_image_intro" src="{{url('/')}}/{{$new->news_image_intro}}" alt=""></td>
                    <td>{{$new->description}}</td>
                    <td>{{date('d-m-Y h:m', strtotime($new->created_at)) }}</td>
                    <th>
                        <a href="{{route('edit_news',$new->id)}}" class="btn btn-primary">Edit</a>
                        <a onclick="return confirm('are you sure')" href="{{route('delete_news',$new->id)}}" class="btn btn-primary">Delete</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@extends('admin.Layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <form action="{{route('post_edit_news',$news->id)}}" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <th>Category Name</th>
                    <th>
                        <select name="category_id" id="">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>
                        <input type="text" class="form-control" name="name" value="{{$news->name}}">
                    </th>
                </tr>
                <tr>
                    <th>Image</th>
                    <th>
                        <img class="news_image_intro" src="{{url('/')}}/{{$news->news_image_intro}}" alt="">
                        <input type="file" class="form-control" name="news_image_intro">
                    </th>
                </tr>
                <tr>
                    <th>Description</th>
                    <th>
                        <input type="text" class="form-control" name="description" value="{{$news->description}}">
                    </th>
                </tr>
                <tr>
                    <th>Created_at</th>
                    <th>
                        <input type="date" class="form-control" name="created_at" value="{{$news->created_at}}">
                    </th>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a  class="btn btn-primary" href="{{route('list_news')}}">Cancle</a>
                        </div>
                    </td>
                </tr>
            </table>
            {{csrf_field()}}
        </form>
    </div>
@endsection
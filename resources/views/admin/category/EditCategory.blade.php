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
        <form action="{{route('post_edit_category',$category->id)}}" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <th>Category Name</th>
                    <th>
                        <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}">
                    </th>
                </tr>
                <tr>
                    <th>Description</th>
                    <th>
                        <input type="text" class="form-control" name="description" value="{{$category->description}}">
                    </th>
                </tr>
                <tr>
                    <th>Created_at</th>
                    <th>
                        <input type="date" class="form-control" name="created_at" value="{{$category->created_at}}">
                    </th>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a  class="btn btn-primary" href="{{route('list_category')}}">Cancle</a>
                        </div>
                    </td>
                </tr>
            </table>
            {{csrf_field()}}
        </form>
    </div>
@endsection
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
        <form action="{{route('post_add_news')}}" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>
                        <input type="text" class="form-control" name="name">
                    </th>
                </tr>
                <tr>
                    <th>Image</th>
                    <th>
                        <input type="file" class="form-control" name="news_image_intro">
                    </th>
                </tr>
                <tr>
                    <th>Description</th>
                    <th>
                        <input type="text" class="form-control" name="description">
                    </th>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="submit" class="btn btn-primary">Cancle</button>
                        </div>
                    </td>
                </tr>
            </table>
            {{csrf_field()}}
        </form>
    </div>
@endsection
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
        <form action="{{route('post_add_category')}}" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <th>Category Name</th>
                    <th>
                        <input type="text" class="form-control" name="category_name">
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
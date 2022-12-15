@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Category Data
        </div>

        <div class="card-body">
            <div class="my-4">
                <a href="{{ route('admin.category.add') }}" class="btn btn-primary">Input New Category</a>
            </div>

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Name</th>
                        <th>Image</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($category as $cat)
                    <tr>
                        <td>{{ $cat->cat_id }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>
                            <img src="{{ asset('/categoryimage/'.$cat->image)}}" class="cate-image" alt="Image here">
                        </td>
                        <td>
                            <a href="/admin/category/edit/{{ $cat->cat_id }}" class="btn btn-warning">Edit</a>
                            <!-- <a href="/admin/category/delete/{{ $cat->cat_id }}" class="btn btn-danger">Delete</a> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Category Data - <strong>Add DATA</strong>
        </div>

        <div class="card-body">
            <a href="{{ route('admin.category')}}" class="btn btn-primary">Back</a>
            <br/>
            <br/>

            <form method="POST" action="/admin/category/save" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="name" class="form-control" >
                    @if($errors->has('name'))
                        <div class="text-danger">
                            {{ $errors->first('name')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file"  name="image" class="form-control">
                    @if($errors->has('image'))
                        <div class="text-danger">
                            {{ $errors->first('image')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

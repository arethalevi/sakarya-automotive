@extends('layouts.admin.admin')

@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Catalog Data - <strong>EDIT DATA</strong>
        </div>

        <div class="card-body">
            <a href="{{ route('admin.catalog')}}" class="btn btn-primary">Back</a>
            <br/>
            <br/>

                <form method="post" action="/admin/category/update/{{$cat_id}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control"  value="{{ $category->name }}">
                        @if($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Old Image</label>
                        <img height="100" width="100" src="/categoryimage/{{$category->image}}" alt="">
                    </div>

                    <div class="form-group">
                        <label>Change Image</label>
                        <input type="file"  name="image" class="form-control" value="{{ $category->image }}">
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

@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Catalog Data- <strong>Input DATA</strong>
        </div>


        <div class="card-body">
            <a href="{{ route('admin.catalog')}}" class="btn btn-primary">Back</a>
            <br/>
            <br/>

            <form method="POST" action="/admin/catalog/save" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="nama_barang" class="form-control">
                    @if($errors->has('nama_barang'))
                        <div class="text-danger">
                            {{ $errors->first('nama_barang')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="cat_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->cat_id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('cat_id'))
                        <div class="text-danger">
                            {{ $errors->first('cat_id')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="textarea"  name="deskripsi" class="form-control" >
                    @if($errors->has('deskripsi'))
                        <div class="text-danger">
                            {{ $errors->first('deskripsi')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" step="0.01" name="harga" class="form-control" >
                    @if($errors->has('harga'))
                        <div class="text-danger">
                            {{ $errors->first('harga')}}
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

<script type="text/javascript">
    $(document).ready(function () {
        $(".floatNumberField").change(function() {
            $(this).val(parseFloat($(this).val()).toFixed(2));
        });
    });
</script>

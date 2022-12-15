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

                <form method="post" action="/admin/catalog/update/{{$catalog_id}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="nama_barang" class="form-control"  value="{{ $catalog->nama_barang }}">
                        @if($errors->has('nama_barang'))
                            <div class="text-danger">
                                {{ $errors->first('nama_barang')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Category ID</label>
                        <input type="text" name="cat_id" class="form-control"  value="{{ $catalog->cat_id }}">
                        @if($errors->has('cat_id'))
                            <div class="text-danger">
                                {{ $errors->first('cat_id')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" name="tipe" class="form-control"value="{{ $catalog->tipe }}">
                        @if($errors->has('tipe'))
                            <div class="text-danger">
                                {{ $errors->first('tipe')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="textarea"  name="deskripsi" class="form-control" value="{{ $catalog->deskripsi }}">
                        @if($errors->has('deskripsi'))
                            <div class="text-danger">
                                {{ $errors->first('deskripsi')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text"  name="harga" class="form-control"  value="{{ $catalog->harga }}">
                        @if($errors->has('harga'))
                            <div class="text-danger">
                                {{ $errors->first('harga')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Old Image</label>
                        <img height="100" width="100" src="/productimage/{{$catalog->image}}" alt="">
                    </div>

                    <div class="form-group">
                        <label>Change Image</label>
                        <input type="file"  name="image" class="form-control" value="{{ $catalog->image }}">
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

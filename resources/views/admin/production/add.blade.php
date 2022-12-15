@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Production Data - <strong>Add DATA</strong>
        </div>

        <div class="card-body">
            <a href="{{ route('admin.production')}}" class="btn btn-primary">Back</a>
            <br/>
            <br/>

            <form method="POST" action="/admin/production/save">
                @csrf

                <div class="form-group">
                    <label>Catalog</label>
                    <select name="catalog_id" class="form-control">
                        @foreach ($catalog as $cat)
                            <option value="{{ $cat->catalog_id }}">{{ $cat->nama_barang }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('catalog_id'))
                        <div class="text-danger">
                            {{ $errors->first('catalog_id')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Production Date</label>
                    <input type="date" name="tgl_produksi" class="form-control w-25" >
                    @if($errors->has('tgl_produksi'))
                        <div class="text-danger">
                            {{ $errors->first('tgl_produksi')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Items Produced</label>
                    <input type="number"  name="jumlah_barang" class="form-control">
                    @if($errors->has('jumlah_barang'))
                        <div class="text-danger">
                            {{ $errors->first('jumlah_barang')}}
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

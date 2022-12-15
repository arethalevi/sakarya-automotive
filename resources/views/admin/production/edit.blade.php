@extends('layouts.admin.admin')

@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Production Data - <strong>EDIT DATA</strong>
        </div>

        <div class="card-body">
            <a href={{ route('admin.production')}} class="btn btn-primary">Back</a>
            <br/>
            <br/>

                <form method="post" action="/admin/production/update/{{$production_id}}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Catalog ID</label>
                        <input type="text" name="catalog_id" class="form-control" value="{{ $production->catalog_id }}">
                        @if($errors->has('catalog_id'))
                            <div class="text-danger">
                                {{ $errors->first('catalog_id')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Production Date</label>
                        <input type="date" name="tgl_produksi" class="form-control" value="{{ $production->tgl_produksi }}" >
                        @if($errors->has('tgl_produksi'))
                            <div class="text-danger">
                                {{ $errors->first('tgl_produksi')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Items Produced</label>
                        <input type="number"  name="jumlah_barang" class="form-control"  value="{{ $production->jumlah_barang }}">
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

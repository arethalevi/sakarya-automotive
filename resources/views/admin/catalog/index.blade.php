@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Catalog Data
        </div>

        <div class="card-body">
            @if(session()->has('status'))
            <div class="alert alert-success">

            <button type="button" class="close" data-bs-dismiss="alert">x</button>
            {{session()->get('status')}}

            </div>
            @endif
            <div class="my-4">
                <a href="{{ route('admin.catalog.add') }}" class="btn btn-primary">Input New Catalog</a>
            </div>

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Catalog ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($catalog as $c)
                    <tr>
                        <td>{{ $c->catalog_id }}</td>
                        <td>{{ $c->nama_barang }}</td>
                        <td>{{ $c->tipe }}</td>
                        <td>{{ $c->harga }}</td>
                        <td><img height="100" width="100" src="/productimage/{{$c->image}}" alt=""></td>
                        <td>
                            <a href="/admin/catalog/edit/{{ $c->catalog_id }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

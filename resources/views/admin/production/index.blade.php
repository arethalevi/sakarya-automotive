@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Production Data
        </div>

        <div class="card-body">
            @if(session()->has('status'))
            <div class="alert alert-success">

            <button type="button" class="close" data-bs-dismiss="alert">x</button>
            {{session()->get('status')}}

            </div>
            @endif
            <div class="my-4">
                <a href="{{ route('admin.production.add') }}" class="btn btn-primary">Input New Production</a>
            </div>

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Production ID</th>
                        <th>Catalog ID</th>
                        <th>Catalog Name</th>
                        <th>Production Date</th>
                        <th>Items Produced</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($production as $p)
                    <tr>
                        <td>{{ $p->production_id }}</td>
                        <td>{{ $p->catalog_id }}</td>
                        <td>{{ $catalog[$p->catalog_id-1]->nama_barang}}</td>
                        <td>{{ $p->tgl_produksi }}</td>
                        <td>{{ $p->jumlah_barang }}</td>
                        <td>
                            <a href="/admin/production/edit/{{ $p->production_id }}" class="btn btn-warning">Edit</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

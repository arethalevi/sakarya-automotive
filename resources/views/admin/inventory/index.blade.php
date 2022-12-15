@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Inventory Data
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Catalog ID</th>
                        <th>Catalog Name</th>
                        <th>Items in Stock</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($inventory as $i)
                    <tr>
                        <td>{{ $i->catalog_id }}</td>
                        <td>{{ $catalog[$i->catalog_id-1]->nama_barang}}</td>
                        <td>{{ $i->inStock }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

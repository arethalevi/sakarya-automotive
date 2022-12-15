@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Quality Control Data
        </div>

        <div class="card-body">
            @if(session()->has('status'))
            <div class="alert alert-success">

            <button type="button" class="close" data-bs-dismiss="alert">x</button>
            {{session()->get('status')}}

            </div>
            @endif

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Production ID</th>
                        <th>Catalog ID</th>
                        <th>Items Produced</th>
                        <th>QC Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($quality_control as $q)
                    <tr>
                        <td>{{ $q->production_id }}</td>
                        <td>{{ $q->catalog_id }}</td>
                        <td>{{ $q->jumlah_barang }}</td>
                        <td>{{ $q->qc_status }}</td>
                        <td>
                            <a href="/admin/quality-control/lolos/{{ $q->production_id }}" class="btn btn-warning">Pass</a>
                            <a href="/admin/quality-control/tidaklolos/{{ $q->production_id }}" class="btn btn-danger">Do not pass</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

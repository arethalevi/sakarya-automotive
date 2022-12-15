@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
             Order Data
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Payment Status</th>
                        <th>Shipping Date</th>
                        <th>Shipping Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($order as $s)
                    <tr>
                        <td>{{ $s->order_id }}</td>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->email }}</td>
                        <td>{{ $s->phone }}</td>
                        <td>{{ $s->address }}</td>
                        <td>{{ $s->payment_status }}</td>
                        <td>{{ $s->tgl_kirim }}</td>
                        <td>{{ $s->shipping_status }}</td>
                        <td>
                            <a href="/admin/order/edit/{{ $s->order_id }}" class="btn btn-warning">Shipping Form</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('layouts.user.user')

@section('title')
    My Orders
@endsection

@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Orders Data
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
                        <th>Order ID</th>
                        <th>Form Payment</th>
                        <th>Payment Status</th>
                        <th>Shipping Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $o)
                    <tr>
                        <td>{{ $o->order_id }}</td>
                        <td><a href='/payment/edit/{{$o->order_id}}' class="btn btn-warning">Add Payment</a></td>
                        <td>{{ $o->payment_status }}</td>
                        <td>{{ $o->shipping_status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
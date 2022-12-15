@extends('layouts.user.user')

@section('title')
    Checkout
@endsection

@section('content')

<div class="container mt-3">
    <form action="{{url('/place-order')}}" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="col-md-12">
                            <label for="">Name</label>
                            <input type="text" name='name' class="form-control" value="{{Auth::user()->name}}" placeholder="Enter Name">
                        </div>
                        <div class="col-md-12">
                            <label for="">Email</label>
                            <input type="text" name='email' class="form-control" value="{{Auth::user()->email}}" placeholder="Enter Email">
                        </div>
                        <div class="col-md-12">
                            <label>Phone Number</label>
                            <input type="text" name='phone' class="form-control" value="{{Auth::user()->phone}}" placeholder="Enter Phone Number">
                        </div>
                        <div class="col-md-12">
                            <label>Adress</label>
                            <input type="text" name='address' class="form-control" value="{{Auth::user()->address}}" placeholder="Enter Adress">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-stripped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td>{{$item->catalog->nama_barang}}</td>
                                    <td>{{$item->jumlah_barang}}</td>
                                    <td>{{$item->catalog->harga}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-primary float-end w-10">Place Order</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

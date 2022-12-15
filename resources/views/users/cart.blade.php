@extends('layouts.user.user')

@section('title')
    My Cart
@endsection

@section('content')

<div class="container my-5">
    <div class="card shadow product_data">
        @if ($cartItems->count()>0)
            <div class="card-body">
                @php $total = 0; @endphp
                @foreach ($cartItems as $cart)
                    <div class="row">
                        <div class="col-md-2 center">
                            <img src="{{asset('productimage/'.$cart->catalog->image)}}" alt="Product Image" class="w-50" align="middle">
                        </div>
                        <div class="col-md-3">
                            <h6>{{$cart->catalog->nama_barang}}</h6>
                        </div>
                        <div class="col-md-2">
                            <h6> $ {{$cart->catalog->harga}}</h6>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" value="{{ $cart->catalog_id}}" class="prod_id">
                            @if($cart->inventory->inStock > $cart->jumlah_barang)
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 130px">
                                    <input type="number" name="quantity" class="form-control text-center qty-input changeQuantity" value="{{ $cart->jumlah_barang}}" min="1"/>
                                </div>
                                @php $total += $cart->catalog->harga * $cart->jumlah_barang; @endphp
                            @else
                                <h6>Out of Stock</h6>
                            @endif
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger delete-cart-item">Remove</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-footer">
                <h6>Total Price : $ {{$total}}</h6>
                <a href="{{route('checkout')}}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
            </div>
            @else
                <div class="card-body text-center">
                    <h2>Your Cart is Empty</h2>
                    <a href="{{route('category')}}" class="btn btn-outline-primary float-end">Continue Shopping</a>
                </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('.delete-cart-item').click(function (e) {
            e.preventDefault();
            var catalog_id = $('.prod_id').val()
            var jumlah_barang = $('.qty-input').val()

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/delete-cart-item",
                data: "catalog_id="+catalog_id+"&jumlah_barang="+jumlah_barang,
                success: function (response) {
                    window.location.reload();
                    alert(response.status);
                }
            });
        });
        $('.changeQuantity').click(function (e) {
            e.preventDefault();
            var catalog_id = $('.prod_id').val()
            var jumlah_barang = $('.qty-input').val()

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/update-cart",
                data: "catalog_id="+catalog_id+"&jumlah_barang="+jumlah_barang,
                success: function (response) {
                    window.location.reload();
                    alert(response.status);
                }
            });
        });
    });
</script>
@endsection

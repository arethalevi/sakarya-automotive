@extends('layouts.user.user')

@section('title', $catalog->nama_barang)

@section('content')

<div class="py-3 mb-4 shadow-sm bg-light border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{route('category')}}">
                Category
            </a> /
            <a href="{{url('category/'.$category->name)}}">
                {{ $category->name}}
            </a> /
            <a href="{{url('category/'.$category->name.'/'.$catalog->nama_barang)}}">
                {{ $catalog->nama_barang}}
            </a>
        </h6>
    </div>
</div>

<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('productimage/'.$catalog->image)}}" alt="Product Image" class="w-100">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $catalog->nama_barang}}
                    </h2>
                    <hr>
                    <label class="me-3">Price : $ {{$catalog->harga}}</label>
                    <p class="mt-3">
                        {!! $catalog->deskripsi!!}
                    </p>
                    <hr>
                    @if($inventory->inStock>0)
                        <label class="badge bg-success">In Stock</label>
                    @else
                        <label class="badge bg-danger">Out of Stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <form id="myForm">
                                <input type="hidden" value="{{ $catalog->catalog_id}}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width:130px">
                                    <input type="number" name="quantity" class="form-control text-center qty-input" value="1" min="1"/>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-10">
                            <br/>
                            @if($inventory->inStock>0)
                                <button type="button" class="btn btn-primary me-3 addToCartBtn float-start"> Add to Cart <i class="fa fa-shopping-cart"></i> </button>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('.addToCartBtn').click(function (e) {
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
                url: "/add-to-cart",
                data: "catalog_id="+catalog_id+"&jumlah_barang="+jumlah_barang,
                success: function (response) {
                    alert(response.status);
                }
            });
        });
    });
</script>
@endsection

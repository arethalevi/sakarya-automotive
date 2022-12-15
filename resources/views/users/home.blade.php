@extends('layouts.user.user')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-bs-dismiss="alert">x</button>
        {{ session('status') }}
        
    </div>
@endif
@include('layouts.user.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Product</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($catalog as $c)
                        <div class="item">
                            {{-- <a href="{{url('category/'.strtolower($c->category->name).'/'.$c->slug)}}"></a> --}}
                            <div class="card d-flex">
                                <img src="{{asset('productimage/'.$c->image)}}" alt="Product Image" width="100%" height="175px">
                                <div class="card-body">
                                    <h5>{{ $c-> nama_barang}}</h5>
                                    <span>$ {{ $c -> harga}} </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>All Categories</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($category as $cat)
                        <div class="item">
                            <a href = "{{url('category/'.strtolower($cat->name))}} ">
                                <div class="card">
                                    <img src="{{asset('categoryimage/'.$cat->image)}}" alt="Category Image" width="100px" height="200px">
                                    <div class="card-body">
                                        <h5>{{ $cat-> name}}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('title')
    Welcome to Sakarya Shop
@endsection


@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
</script>
@endsection

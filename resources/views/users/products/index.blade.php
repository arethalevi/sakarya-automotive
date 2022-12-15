@extends('layouts.user.user')

@section('title')
    {{$category->name}}
@endsection

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
        </h6>
    </div>
</div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{$category->name}}</h2>
                    @foreach ($catalog as $c)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <a href="{{url('category/'.strtolower($category->name)).'/'.$c->slug}}">
                                <img src="{{asset('productimage/'.$c->image)}}" alt="Product Image" width="100%" height="175px">
                                <div class="card-body">
                                    <h5>{{ $c-> nama_barang}}</h5>
                                    <span>$ {{ $c -> harga}} </span>
                                </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

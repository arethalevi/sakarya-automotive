@extends('layouts.user.user')

@section('title')
    Category
@endsection

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>All Categories</h2>
            <div class="owl-carousel category-carousel owl-theme">
                @foreach ($category as $cat)
                <div class="item">
                    <a href = "{{url('category/'.strtolower($cat->name))}} ">
                        <div class="card custom-card">
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

@section('scripts')
<script>
    $('.category-carousel').owlCarousel({
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

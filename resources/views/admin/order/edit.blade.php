@extends('layouts.admin.admin')

@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Order Data - <strong>Shipping Form</strong>
        </div>

        <div class="card-body">
            <a href="{{ route('admin.order')}}" class="btn btn-primary">Back</a>
            <br/>
            <br/>

                <form method="post" action="/admin/order/update/{{$order_id}}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Shipping Date</label>
                        <input type="date" name="tgl_kirim" class="form-control">
                        @if($errors->has('tgl_kirim'))
                            <div class="text-danger">
                                {{ $errors->first('tgl_kirim')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Shipping Status</label>
                        <select name='shipping_status' class="form-control" value="{{ $order->shipping_status }}">
                            <option value="Preparing" @if($order ->shipping_status=="Preparing") selected @endif> Preparing</option>
                            <option value="Shipped" @if($order ->shipping_status=="Shipped") selected @endif> Shipped</option>

                        @if($errors->has('shipping_status'))
                            <div class="text-danger">
                                {{ $errors->first('shipping_status')}}
                            </div>
                        @endif
                    </div>

                    

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>

        </div>
    </div>
</div>
@endsection

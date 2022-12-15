@extends('layouts.user.user')

@section('title')
    Payment Form
@endsection

@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Submit Payment 
        </div>

        <div class="card-body">
            
                <form method="post" action="/payment/update/{{$order_id}}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Bank Name</label>
                        <input type="text" name="pay_bank" class="form-control">
                        @if($errors->has('pay_bank'))
                            <div class="text-danger">
                                {{ $errors->first('pay_bank')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Account Number</label>
                        <input type="text" name="pay_norek" class="form-control">
                        @if($errors->has('pay_norek'))
                            <div class="text-danger">
                                {{ $errors->first('pay_norek')}}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Payment Date</label>
                        <input type="date" name="tgl_bayar" class="form-control" >
                        @if($errors->has('tgl_bayar'))
                            <div class="text-danger">
                                {{ $errors->first('tgl_bayar')}}
                            </div>
                        @endif
                    </div>

                    <br>
                    <br>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>

        </div>
    </div>
</div>

@endsection

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function edit($order_id)
    {
        $payment = Payment::find($order_id);
        return view('users.payment', ['payment' => $payment, 'order_id' => $order_id]);
    }

    public function update($order_id, Request $request)
    {
        $this->validate($request,[
            'pay_bank' => 'required',
            'pay_norek' => 'required',
            'tgl_bayar' => 'required'
        ]);
        $id = (int)$order_id;
        $payment = Payment::find($id);
        $payment->pay_bank = $request->pay_bank;
        $payment->pay_norek = $request->pay_norek;
        $payment->tgl_bayar = $request->tgl_bayar;
        $payment->save();

        return redirect('/myorders')->with('status', 'Payment added');
    }
}

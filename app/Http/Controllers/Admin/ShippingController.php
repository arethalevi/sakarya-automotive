<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function order()
    {
        $order = Order::all();

        return view('admin.order.index', compact('order'));
    }

    public function edit($order_id)
    {
        $order = Order::find($order_id);
        return view('admin.order.edit', ['order' => $order, 'order_id' => $order_id]);
    }
    public function update($order_id, Request $request)
    {
        $this->validate($request,[
            'tgl_kirim' => 'required',
            'shipping_status' => 'required'
        ]);
        $id = (int)$order_id;
        $order = Order::find($id);
        $order->tgl_kirim = $request->tgl_kirim;
        $order->shipping_status = $request->shipping_status;
        $order->save();

        return redirect('/admin/order');
    }

}

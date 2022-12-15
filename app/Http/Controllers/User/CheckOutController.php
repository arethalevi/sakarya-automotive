<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Catalog;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartItems as $item)
        {
            if(!Catalog::where('catalog_id', $item->catalog_id)->exists())
            {
                if(Inventory::where('jumlah_barang','>=',$item->jumlah_barang)->exists()){
                    $removeItem = Cart::where('user_id', Auth::id())->where('catalog_id', $item->catalog_id)->first();
                    $removeItem->delete();
                }
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('users.checkout', compact('cartItems'));
    }

    public function placeorder(Request $request)
    {
        
        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->email = $request->email;
        $order->user_id = Auth::id();
        $order->save();

        $order->order_id;
        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems as $item)
        {
            OrderItem::create([
                'order_id' =>$order->order_id,
                'catalog_id'=>$item->catalog_id,
                'harga'=>$item->catalog->harga,
                'jumlah_barang'=>$item->jumlah_barang
            ]);
        }

        if(Auth::user()->address == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('name');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->email = $request->input('email');
            $user->update();

        }

        $cartitems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect('/myorders')->with('status', 'New Order succesfully made');
    }
}

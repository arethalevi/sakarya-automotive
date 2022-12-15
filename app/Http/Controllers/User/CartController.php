<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {

        $catalog_id = $request->input('catalog_id');
        $jumlah_barang = $request->input('jumlah_barang');

        if(Auth::check())
        {
            $prod_check = Catalog::where('catalog_id', $catalog_id)->first();

            if($prod_check)
            {
                if(Cart::where('catalog_id', $catalog_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json(['status'=>$prod_check->nama_barang." Already added to cart"]);
                }
                else {
                    $cartItem = new Cart();
                    $cartItem->catalog_id = $catalog_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->jumlah_barang = $jumlah_barang;
                    $cartItem->save();
                    return response()->json(['status'=>$prod_check->nama_barang." Added to cart"]);
                }
            }
        }
    }

    public function viewcart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('users.cart', compact('cartItems',));
    }

    public function updatecart(Request $request)
    {
        if(Auth::check())
        {
            $catalog_id = $request->input('catalog_id');
            $jumlah_barang = $request->input('jumlah_barang');
            if(Cart::where('catalog_id', $catalog_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('catalog_id', $catalog_id)->where('user_id', Auth::id())->first();
                $cartItem->jumlah_barang = $jumlah_barang;
                $cartItem->update();
                return response()->json(['status' => 'Quantity Updated']);
            }
            else{
                return response()->json(['status' => 'Login to Continue']);
            }
        }
    }

    public function deleteProduct(Request $request)
    {
        if(Auth::check())
        {
            $catalog_id = $request->input('catalog_id');
            $jumlah_barang = $request->input('jumlah_barang');
            if(Cart::where('catalog_id', $catalog_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('catalog_id', $catalog_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => 'Product Deleted Successfully']);
            }
            else{
                return response()->json(['status' => 'Login to Continue']);
            }
        }
    }
}

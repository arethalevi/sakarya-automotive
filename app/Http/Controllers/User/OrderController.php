<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Shipping;

class OrderController extends Controller
{
    public function order(){
        $orders = Order::where('user_id',Auth::id())->get();
        return view('users.myorders', compact('orders'));
    }
}

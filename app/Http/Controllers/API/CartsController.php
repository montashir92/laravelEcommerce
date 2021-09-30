<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartsController extends Controller
{
    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
        ]);
        
        if(Auth::check()){
            $cart = Cart::where('user_id', Auth::id())
                         ->where('product_id', $request->product_id)
                         ->where('order_id', NULL)
                         ->first();
        }else{
            $cart = Cart::where('ip_address', request()->ip())
                         ->where('product_id', $request->product_id)
                         ->where('order_id', NULL)
                         ->first();
        }
        if(!is_null($cart)){
            $cart->increment('product_quantity');
        }else{
            $cart = new Cart();
            if(Auth::check()){
                $cart->user_id = Auth::id();
            }
            $cart->ip_address = request()->ip();
            $cart->product_id = $request->product_id;
            $cart->save();
        }
        return json_encode(['status' => 'success', 'Message' => 'Items Added Cart', 'totalItems' => Cart::totalItems()]);
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;
    
    public $fillable = [
        'product_id',
        'user_id',
        'order_id',
        'ip_address',
        'product_quantity'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    
    public static function totalCarts()
    {
        if(Auth::check()){
            $carts = Cart::where('user_id', Auth::id())
                          ->orWhere('ip_address', request()->ip())
                          ->where('order_id', NULL)
                          ->get();
        }else{
            $carts = Cart::where('ip_address', request()->ip())->where('order_id', NULL)->get();
        }
        return $carts;
    }
    
    /*
     * Total Items in the cart
     * 
     * @return integer total item
     */
    public static function totalItems()
    {
        $carts = Cart::totalCarts();
        
        $total_item = 0;
        foreach ($carts as $cart) {
            $total_item += $cart->product_quantity;
        }
        return $total_item;
    }
}

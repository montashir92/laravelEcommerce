<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    public $fillable = [
        'user_id',
        'payment_id',
        'ip_address',
        'name',
        'email',
        'mobile',
        'shipping_address',
        'message',
        'is_paid',
        'is_complete',
        'is_seen_by_admin',
        'transaction_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }
    
    public function carts()
    {
        return $this->hasMany(Cart::class, 'order_id', 'id');
    }
}

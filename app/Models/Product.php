<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'description',
        'price',
        'product_key',
        'quantity',
        'available',
        'condition',
        'status',
        'offer_price',
        'created_by',
        'updated_by'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}

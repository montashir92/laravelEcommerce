<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    public $fillable = [
        'parent_id',
        'name',
        'image',
    ];
    
    public function parent()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    /*
     * ParentOrNotCategory
     * 
     * Check is the category is child category of that parent category
     * 
     * @param int $parent_id
     * @param int $child_id
     */
    
    public static function ParentOrNotCategory($parent_id, $child_id)
    {
        $categories = Category::where('id', $child_id)->where('parent_id', $parent_id);
        if(!is_null($categories)){
            return true;
        }else{
            return false;
        }
    }
}

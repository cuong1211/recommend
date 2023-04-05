<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'img',
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function in_products()
    {
        return $this->hasMany(in_product::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function user_product()
    {
        return $this->hasMany(User_Product::class);
    }
}

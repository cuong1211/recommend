<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class in_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'product_id',
        'company_id',
        'total',
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function company()
    {
        return $this->belongsTo(company::class, 'company_id');
    }
}

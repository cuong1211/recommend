<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function in_products()
    {
        return $this->hasMany(in_product::class);
    }
}

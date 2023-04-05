<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipt extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'note',
        'order_id',
        'quantity',
        'price',
        'address',
        'total',
    ];
    protected $dates = ['created_at', 'updated_at'];
}

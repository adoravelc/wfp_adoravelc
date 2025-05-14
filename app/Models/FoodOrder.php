<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
{
    use HasFactory;
    protected $table = 'food_orders';

    protected $fillable = [
        'order_id',
        'food_id',
        'quantity',
        'harga_jual',
    ];

    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table ='foods';
    public function category(){
        return $this->belongsTo('App\Models\Category'); //many to one dengan category
    }
    public function order()
    {
        return $this->belongsToMany(Order::class, 'food_orders')
                    ->withPivot('quantity', 'grand_total') //menambahkan kolom pivot jika perlu
                    ->withTimestamps();
    }
}
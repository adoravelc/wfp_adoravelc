<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'foods';
    protected $fillable = ['name', 'description', 'price', 'nutrition_facts', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class, 'food_orders')
            ->withPivot('quantity', 'grand_total')
            ->withTimestamps();
    }
}
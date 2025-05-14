<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'status',
        'date',
        'grand_total',
        'created_at',
        'updated_at',
    ];
    protected $table = 'orders';
    public function foods()
    {
        return $this->belongsToMany(Food::class, 'food_orders')
            ->withPivot('quantity', 'grand_total')
            ->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

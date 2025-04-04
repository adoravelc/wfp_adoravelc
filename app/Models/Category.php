<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function foods(){
        return $this->hasMany('App\Models\Food'); //one to many dengan food
    }

    public function __tostring(){
        return $this->name;
    }
}

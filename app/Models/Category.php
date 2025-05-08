<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = ['name'];
    public function foods(){
        return $this->hasMany('App\Models\Food'); //one to many dengan food
    }

    public function __tostring(){
        return $this->name;
    }

    public function store(Request $request){
        $data = new Category;
        $data->name = $request->get('name');
        $data->save();
    }
}

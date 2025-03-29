<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;


class KategoriController extends Controller
{
    public function index()
    {
        // $categories = DB::select("SELECT * FROM categories");
        
        // $categories = DB::table('categories')
        // ->where("name", "Dessert")
        // ->get();

        // $categories = Category::where("name", "Breakfast")->get();
        
        $categories = Category::all();
        
        return view('kategori.index', ['categories' => $categories]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;


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

    public function ambilProdukAjax($id)
    {
        // $products = DB::select("SELECT * FROM products WHERE category_id = ?", [$id]);
        // $products = DB::table('products')->where("category_id", $id)->get();
        // $products = Category::find($id)->products;

        // return response()->json($products);

        return response("Ini dari controller id " . $id);
    }

    //create new category
    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        $category = Category::create($validated);

        // $category = new Category();
        // $category->name = $validated['name'];
        // $category->save();

        return redirect('/daftar-kategori')->with('success', 'Category "' . $category->name . '" added successfully!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('kategori.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->name = $validated['name'];
        $category->save(); // updated_at akan otomatis diupdate

        return redirect('/daftar-kategori')->with('success', 'Kategori ' . $category->name . ' diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect('/daftar-kategori')->with('success', 'Deleted successfully!');
        } catch (\PDOException $e) {
            $message = "Make sure there is no related data before you delete it.";
            return redirect('/daftar-kategori')->with('success', $message);
        } catch (\Exception $e) {
            return redirect('/daftar-kategori')->with('error', 'Category not found or could not be deleted.');
        }
    }
}

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
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('daftar-kategori')->with('error', 'Kategori tidak ditemukan');
        }

        // Cek apakah kategori masih memiliki food
        if ($category->foods()->count() > 0) {
            return redirect()->route('daftar-kategori')->with('error', 'Kategori "' . $category->name . '" tidak dapat dihapus karena masih memiliki food');
        }

        $category->delete();

        return redirect()->route('daftar-kategori')->with('success', 'Kategori berhasil dihapus sementara');
    }

    public function trashed()
    {
        $trashedCategories = Category::onlyTrashed()->get();
        return view('kategori.trashed', ['categories' => $trashedCategories]);
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->find($id);

        if (!$category) {
            return redirect()->route('categories.trashed')->with('error', 'Kategori tidak ditemukan');
        }

        $category->restore();

        return redirect()->route('categories.trashed')->with('success', 'Kategori berhasil dipulihkan');
    }

    public function forceDelete($id)
    {
        $category = Category::onlyTrashed()->find($id);

        if (!$category) {
            return redirect()->route('kategori.trashed')->with('error', 'Kategori tidak ditemukan');
        }

        // Cek apakah kategori masih memiliki food (untuk force delete juga)
        if ($category->foods()->count() > 0) {
            return redirect()->route('kategori.trashed')->with('error', 'Kategori "' . $category->name . '" tidak dapat dihapus permanen karena masih memiliki produk');
        }

        $category->forceDelete();

        return redirect()->route('kategori.trashed')->with('success', 'Kategori berhasil dihapus permanen');
    }
}
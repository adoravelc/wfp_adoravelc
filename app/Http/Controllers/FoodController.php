<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::all();
        return view('food.index', ['foods' => $foods]);
    }

    /**
     * Show the form for creating a new resource.
     */
    //create new food
    public function create()
    {
        $categories = Category::all();
        return view('food.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:foods,name',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'nutrition_facts' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $food = Food::create($validated);

        return redirect('/daftar-makanan')->with('success', 'Food "' . $food->name . '" added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $food = Food::findOrFail($id);
        $categories = Category::all();
        return view('food.edit', ['food' => $food, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'nutrition_facts' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $food = Food::findOrFail($id);
        $food->update($validated);

        return redirect('/daftar-makanan')->with('success', 'Food item "' . $food->name . '" updated successfully!');
    }

    public function destroy($id)
    {
        $food = Food::find($id);

        if (!$food) {
            return redirect()->route('daftar-makanan')->with('error', 'Makanan tidak ditemukan');
        }

        if ($food->order()->count() > 0) {
            return redirect()->route('foods.trashed')->with('error', 'Makanan "' . $food->name . '" tidak dapat dihapus permanen karena sudah memiliki order');
        }

        $food->delete();

        return redirect()->route('daftar-makanan')->with('success', 'Makanan berhasil dihapus sementara');
    }

    public function trashed()
    {
        $trashedFoods = Food::onlyTrashed()->get();
        return view('food.trashed', ['foods' => $trashedFoods]);
    }

    public function restore($id)
    {
        $food = Food::onlyTrashed()->find($id);

        if (!$food) {
            return redirect()->route('foods.trashed')->with('error', 'Makanan tidak ditemukan');
        }

        $food->restore();

        return redirect()->route('foods.trashed')->with('success', 'Makanan berhasil dipulihkan');
    }

    public function forceDelete($id)
    {
        $food = Food::onlyTrashed()->find($id);

        if (!$food) {
            return redirect()->route('foods.trashed')->with('error', 'Makanan tidak ditemukan');
        }

        if ($food->order()->count() > 0) {
            return redirect()->route('foods.trashed')->with('error', 'Makanan "' . $food->name . '" tidak dapat dihapus permanen karena sudah memiliki order');
        }

        $food->forceDelete();

        return redirect()->route('foods.trashed')->with('success', 'Makanan berhasil dihapus permanen');
    }
}

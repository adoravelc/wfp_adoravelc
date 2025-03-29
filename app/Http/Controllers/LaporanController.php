<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;
use App\Models\Category;
use DB;

class LaporanController extends Controller
{
    public function laporan1()
    {
        $datas = Food::join('categories', 'foods.category_id', '=', 'categories.id')
            ->where('categories.name', 'Lunch')
            ->select('foods.name')
            ->get();
        return view('laporan.laporan1', ['datas' => $datas]);
    }

    //Tampilkan laporan semua nama makanan yang deskripsinya mengandung angka 1
    public function laporan2()
    {
        $datas = Food::where('description', 'like', '%1%')
            ->select('name', 'description', 'price', 'nutrition_facts')
            ->get();

        return view('laporan.laporan2', ['datas' => $datas]);
    }

    //Tampilkan laporan semua nama makanan yang harganya di Bawah 2000 (dikali 10 ae yo)
    public function laporan3()
    {
        $datas = Food::where('price', '<', 20000)
            ->select('name', 'description', 'price', 'nutrition_facts')
            ->get();
        return view('laporan.laporan3', ['datas' => $datas]);
    }

    //Tampilkan makanan dan kategorinya yang pernah laku lebih dari 2 porsi dalam satu order
    public function laporan4()
    {
        $datas = Food::join('food_orders', 'foods.id', '=', 'food_orders.food_id')
            ->join('orders', 'food_orders.order_id', '=', 'orders.id')
            ->join('categories', 'foods.category_id', '=', 'categories.id')
            ->select(
                'foods.name as food_name',
                'categories.name as category_name'
            )
            ->groupBy('foods.name', 'categories.name')
            ->havingRaw('SUM(food_orders.quantity) > 2')
            ->get();

        return view('laporan.laporan4', ['datas' => $datas]);
    }

    //Tampilkan total nominal order yang didapat oleh restoran pada bulan januari hingga maret 2025
    public function laporan5()
    {
        $totalNominal = Order::whereBetween('created_at', ['2025-01-01', '2025-03-31'])
            ->sum('grand_total');

        return view('laporan.laporan5', ['totalNominal' => $totalNominal]);
    }

    //Tampilkan id order, tanggal, dan grand totalnya, dimana grand totalnya lebih besar dari rata-rata grand total order yang ada
    public function laporan6()
    {
        $averageGrandTotal = Order::avg('grand_total');
        $datas = Order::select('id', 'created_at', 'grand_total')
            ->where('grand_total', '>', $averageGrandTotal)
            ->get();
        return view('laporan.laporan6', ['datas' => $datas, 'averageGrandTotal' => $averageGrandTotal]);
    }

    //Tampilkan kategori makanan yang paling laku (dalam hal kuantitas) pada 3 bulan terakhir
    public function laporan7()
    {
        $datas = Category::join('foods', 'categories.id', '=', 'foods.category_id')
            ->join('food_orders', 'foods.id', '=', 'food_orders.food_id')
            ->join('orders', 'food_orders.order_id', '=', 'orders.id')
            ->whereBetween('orders.created_at', [now()->subMonths(3), now()])
            ->select(
                'categories.name',
                DB::raw('SUM(food_orders.quantity) as total_quantity')
            )
            ->groupBy('categories.name')
            ->orderBy('total_quantity', 'desc')
            ->get();

        return view('laporan.laporan7', ['datas' => $datas]);
    }

    //Tampilkan nama kategori, tanggal dibuatnya, dan grand total penjualan untuk per kategori tersebut
    public function laporan8()
    {
        $datas = Category::join('foods', 'categories.id', '=', 'foods.category_id')
            ->join('food_orders', 'foods.id', '=', 'food_orders.food_id')
            ->join('orders', 'food_orders.order_id', '=', 'orders.id')
            ->select(
                'categories.name',
                DB::raw('SUM(orders.grand_total) as total_sales'),
                'categories.created_at as created_at'
            )
            ->groupBy('categories.name', 'categories.created_at')
            ->get();

        return view('laporan.laporan8', ['datas' => $datas]);
    }

    //Tampilkan 5 makanan termahal yang dimiliki oleh restoran
    public function laporan9()
    {
        $datas = Food::join('categories', 'foods.category_id', '=', 'categories.id')
            ->select('foods.name as food_name', 'categories.name as category_name', 'foods.price')
            ->orderBy('foods.price', 'desc')
            ->groupBy('foods.name', 'categories.name', 'foods.price')
            ->limit(5)
            ->get();

        return view('laporan.laporan9', ['datas' => $datas]);
    }

    //Tampilkan nama kategori dan nama makanan dari kategori tersebut yang paling bernilai 
    //(dilihat dari total nominal order yang pernah ada untuk makanan tersebut)
    // beserta total nominal tersebut.
    public function laporan10()
    {
        $datas = Category::join('foods', 'categories.id', '=', 'foods.category_id')
            ->join('food_orders', 'foods.id', '=', 'food_orders.food_id')
            ->join('orders', 'food_orders.order_id', '=', 'orders.id')
            ->select(
                'categories.name as category_name',
                'foods.name as food_name',
                DB::raw('SUM(orders.grand_total) as total_sales')
            )
            ->groupBy('categories.name', 'foods.name')
            ->orderBy('categories.name')
            ->get();

        $finalData = $datas->groupBy('category_name')->map(function ($group) {
            return $group->sortByDesc('total_sales')->first();
        });

        return view('laporan.laporan10', ['datas' => $finalData]);
    }


}
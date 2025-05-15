<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\FoodOrder;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $foods = Food::all();
        return view('order.create', compact('foods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'basket' => 'required|json',
        ]);

        $basket = json_decode($request->basket, true);

        if (count($basket) === 0) {
            return back()->withErrors('Please add at least one item.');
        }

        // Calculate grand total properly by considering quantity
        $grandTotal = 0;
        foreach ($basket as $item) {
            $grandTotal += $item['harga_jual'] * $item['quantity'];
        }

        // 1. Buat order baru
        $order = Order::create([
            'user_id' => auth()->id() ?? null, // jika pakai auth
            'status' => 0, // misal ada status
            'date' => now(),
            'grand_total' => $grandTotal,
            'created_at' => now(),
        ]);

        // 2. Masukkan item-item ke table food_orders
        foreach ($basket as $item) {
            \App\Models\FoodOrder::create([
                'order_id' => $order->id,
                'food_id' => $item['food_id'],
                'quantity' => $item['quantity'],
                'harga_jual' => $item['harga_jual'],
            ]);
        }

        return redirect('/daftar-order')->with('success', 'Order #' . $order->id . ' berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
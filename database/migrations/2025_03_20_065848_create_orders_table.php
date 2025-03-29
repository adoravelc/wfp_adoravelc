<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Food;
use DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = Food::all();
        //ambil id food
        $arrFoods = array();
        foreach ($foods as $food) {
            $arrFoods[$food->id] = $food->price;
        }

        $minFoodIndex = array_search(min($arrFoods), $arrFoods);
        $maxFoodIndex = array_search(max($arrFoods), $arrFoods);

        $arrOrders = array();
        $arrFoodOrders = array();
        for ($i = 1; $i <= 50; $i++) {
            //id, tgl, status, grand_total
            $randomYear = 2025;
            $randomMonth = rand(1, 12);
            $randomDay = rand(1, 28);

            $randomHour = str_pad(rand(0, 23), 2, '0', STR_PAD_LEFT);
            $randomMinute = str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);
            $randomSecond = str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);

            $randomDate = sprintf("%d-%02d-%02d %s:%s:%s", $randomYear, $randomMonth, $randomDay, $randomHour, $randomMinute, $randomSecond);

            $arrOrders[$i] = 
            [
                'id' => $i,
                'date' => $randomDate,
                'status' => rand(0,1),
                'grand_total' => 0,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ];
            $grandTotal = 0;
            for ($j = 1; $j <= rand(2,5); $j++) {
                //order_id, food_id, qty, harga_jual
                $foodId = rand($minFoodIndex, $maxFoodIndex);
                $qty = rand(1, 10);
                $arrFoodOrders[] = 
                [
                    'order_id' => $i,
                    'food_id' => $foodId, 
                    'quantity' => $qty,
                    'harga_jual' => $arrFoods[$foodId],
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ];
                $grandTotal += ($qty*$arrFoods[$foodId]);
            }
            $arrOrders[$i]['grand_total'] = $grandTotal / 1000;
        }

        DB::table('orders')->insert($arrOrders);
        DB::table('food_orders')->insert($arrFoodOrders);
    }
}

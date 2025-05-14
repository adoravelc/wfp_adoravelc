<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Food;
use App\Models\User;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "Running OrderSeeder...\n";

        $foods = Food::all();
        $users = User::pluck('id')->toArray();

        if ($foods->isEmpty() || empty($users)) {
            echo "Foods or users are empty. Seeder skipped.\n";
            return;
        }

        // Mapping: [food_id => price]
        $arrFoods = $foods->pluck('price', 'id')->toArray();
        $foodIds = array_keys($arrFoods);

        $arrOrders = [];
        $arrFoodOrders = [];

        for ($i = 1; $i <= 50; $i++) {
            $grandTotal = 0;

            $randomDate = sprintf(
                "2025-%02d-%02d %02d:%02d:%02d",
                rand(1, 12),
                rand(1, 28),
                rand(0, 23),
                rand(0, 59),
                rand(0, 59)
            );

            $orderId = $i;
            $userId = $users[array_rand($users)];

            // Insert order skeleton first
            $arrOrders[] = [
                'id' => $orderId,
                'user_id' => $userId,
                'date' => $randomDate,
                'status' => rand(0, 1),
                'grand_total' => 0, // will update later
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Generate 2–5 food items per order
            foreach (range(1, rand(2, 5)) as $_) {
                $foodId = $foodIds[array_rand($foodIds)];
                $qty = rand(1, 10);
                $hargaJual = $arrFoods[$foodId];

                $arrFoodOrders[] = [
                    'order_id' => $orderId,
                    'food_id' => $foodId,
                    'quantity' => $qty,
                    'harga_jual' => $hargaJual,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $grandTotal += ($qty * $hargaJual);
            }

            // Update grand total (in thousands if needed)
            $arrOrders[$i - 1]['grand_total'] = $grandTotal / 1000;
        }

        DB::table('orders')->insert($arrOrders);
        DB::table('food_orders')->insert($arrFoodOrders);
    }
}

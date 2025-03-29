<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('foods')->insert([
            [
                'name' => 'Spaghetti Bolognese',
                'description' => 'Makanan Italia terbaik yang affordable.',
                'price' => 40000,
                'nutrition_facts' => 'Kalori: 660 kkal
                                    Protein: 40 gram
                                    Lemak: 30 gram
                                    Karbohidrat: 90 gram
                                    Serat: 4 gram',
                'category_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nasi Goreng',
                'description' => 'Makanan Indonesia yang paling populer.',
                'price' => 30000,
                'nutrition_facts' => 'Kalori: 550 kkal
                                    Protein: 30 gram
                                    Lemak: 25 gram
                                    Karbohidrat: 80 gram
                                    Serat: 3 gram',
                'category_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Category 1: Appetizer
            [
                'name' => 'Bruschetta',
                'description' => 'Roti panggang dengan topping tomat dan basil segar.',
                'price' => 25000,
                'nutrition_facts' => 'Kalori: 220 kkal
                                    Protein: 5 gram
                                    Lemak: 10 gram
                                    Karbohidrat: 30 gram
                                    Serat: 2 gram',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Spring Rolls',
                'description' => 'Lumpia isi sayur segar dan daging ayam.',
                'price' => 15000,
                'nutrition_facts' => 'Kalori: 180 kkal
                                    Protein: 12 gram
                                    Lemak: 8 gram
                                    Karbohidrat: 20 gram
                                    Serat: 3 gram',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Deviled Eggs',
                'description' => 'Telur rebus dengan campuran mayones dan mustard.',
                'price' => 20000,
                'nutrition_facts' => 'Kalori: 130 kkal
                                    Protein: 10 gram
                                    Lemak: 9 gram
                                    Karbohidrat: 1 gram
                                    Serat: 0 gram',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Category 2: Main Course
            [
                'name' => 'Chicken Parmesan',
                'description' => 'Ayam goreng dengan saus marinara dan keju mozarella.',
                'price' => 70000,
                'nutrition_facts' => 'Kalori: 850 kkal
                                    Protein: 55 gram
                                    Lemak: 40 gram
                                    Karbohidrat: 60 gram
                                    Serat: 4 gram',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Beef Steak',
                'description' => 'Daging sapi panggang dengan saus mentega dan rempah.',
                'price' => 120000,
                'nutrition_facts' => 'Kalori: 950 kkal
                                    Protein: 70 gram
                                    Lemak: 60 gram
                                    Karbohidrat: 20 gram
                                    Serat: 3 gram',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mie Goreng',
                'description' => 'Mie goreng dengan sayur dan telur mata sapi.',
                'price' => 35000,
                'nutrition_facts' => 'Kalori: 700 kkal
                                    Protein: 25 gram
                                    Lemak: 20 gram
                                    Karbohidrat: 95 gram
                                    Serat: 5 gram',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Category 3: Dessert
            [
                'name' => 'Tiramisu',
                'description' => 'Kue lapis dengan krim mascarpone dan kopi.',
                'price' => 50000,
                'nutrition_facts' => 'Kalori: 400 kkal
                                    Protein: 5 gram
                                    Lemak: 20 gram
                                    Karbohidrat: 45 gram
                                    Serat: 1 gram',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cheesecake',
                'description' => 'Kue keju dengan lapisan bawah biskuit.',
                'price' => 60000,
                'nutrition_facts' => 'Kalori: 550 kkal
                                    Protein: 8 gram
                                    Lemak: 35 gram
                                    Karbohidrat: 50 gram
                                    Serat: 2 gram',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Panna Cotta',
                'description' => 'Dessert Italia dengan krim lembut dan buah berry.',
                'price' => 45000,
                'nutrition_facts' => 'Kalori: 350 kkal
                                    Protein: 7 gram
                                    Lemak: 20 gram
                                    Karbohidrat: 35 gram
                                    Serat: 3 gram',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Category 4: Beverage
            [
                'name' => 'Lemonade',
                'description' => 'Minuman segar dari lemon dan gula.',
                'price' => 15000,
                'nutrition_facts' => 'Kalori: 90 kkal
                                    Protein: 1 gram
                                    Lemak: 0 gram
                                    Karbohidrat: 25 gram
                                    Serat: 1 gram',
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Iced Tea',
                'description' => 'Teh manis dingin yang menyegarkan.',
                'price' => 12000,
                'nutrition_facts' => 'Kalori: 70 kkal
                                    Protein: 1 gram
                                    Lemak: 0 gram
                                    Karbohidrat: 18 gram
                                    Serat: 0 gram',
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cappuccino',
                'description' => 'Kopi espresso dengan busa susu.',
                'price' => 25000,
                'nutrition_facts' => 'Kalori: 150 kkal
                                    Protein: 5 gram
                                    Lemak: 8 gram
                                    Karbohidrat: 18 gram
                                    Serat: 0 gram',
                'category_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Category 5: Breakfast
            [
                'name' => 'Pancakes',
                'description' => 'Pancake lembut dengan sirup maple.',
                'price' => 30000,
                'nutrition_facts' => 'Kalori: 500 kkal
                                    Protein: 6 gram
                                    Lemak: 20 gram
                                    Karbohidrat: 70 gram
                                    Serat: 2 gram',
                'category_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Omelette',
                'description' => 'Telur dadar dengan sayuran dan keju.',
                'price' => 25000,
                'nutrition_facts' => 'Kalori: 300 kkal
                                    Protein: 15 gram
                                    Lemak: 20 gram
                                    Karbohidrat: 5 gram
                                    Serat: 2 gram',
                'category_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bagel with Cream Cheese',
                'description' => 'Bagel panggang dengan krim keju.',
                'price' => 18000,
                'nutrition_facts' => 'Kalori: 350 kkal
                                    Protein: 7 gram
                                    Lemak: 12 gram
                                    Karbohidrat: 45 gram
                                    Serat: 3 gram',
                'category_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Category 6: Lunch
            [
                'name' => 'Caesar Salad',
                'description' => 'Salad dengan selada romaine dan saus Caesar.',
                'price' => 30000,
                'nutrition_facts' => 'Kalori: 350 kkal
                                    Protein: 8 gram
                                    Lemak: 25 gram
                                    Karbohidrat: 15 gram
                                    Serat: 3 gram',
                'category_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Club Sandwich',
                'description' => 'Sandwich roti lapis dengan daging ayam dan sayur.',
                'price' => 40000,
                'nutrition_facts' => 'Kalori: 500 kkal
                                    Protein: 25 gram
                                    Lemak: 20 gram
                                    Karbohidrat: 50 gram
                                    Serat: 5 gram',
                'category_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

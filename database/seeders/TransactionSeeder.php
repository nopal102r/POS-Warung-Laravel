<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\Buyer;
use App\Models\Payment;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $products = Product::all();
        $buyers = Buyer::all();
        $payments = Payment::all();

        foreach (range(1, 50) as $index) {
            $product = $products->random();
            $quantity = $faker->numberBetween(1, 10);
            $totalPrice = $product->price * $quantity;

            Transaction::create([
                'product_id' => $product->id,
                'payment_id' => $payments->random()->id,
                'buyer_id' => $buyers->random()->id,
                'quantity' => $quantity,
                'total_price' => $totalPrice,
                'created_at' => $faker->dateTimeThisMonth,
                'updated_at' => now(),
            ]);
        }
    }
}

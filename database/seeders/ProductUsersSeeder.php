<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Get all product IDs
        $productIds = DB::table('products')->pluck('id');

        // Get all user IDs
        $userIds = DB::table('users')->pluck('id');

        for ($i = 0; $i < 5; $i++) {
            DB::table('product_users')->insert([
                'product_id' => $faker->randomElement($productIds->toArray()),
                'user_id' => $faker->randomElement($userIds->toArray()),
                'amount' => $faker->randomNumber(2),
                'datedelivery' => $faker->date(),
                'datenextdelivery' => $faker->date(),
            ]);
        }
    }
}

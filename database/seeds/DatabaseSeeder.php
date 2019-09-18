<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'product_category' => 56,
            'brand_id' => 3,
            'product_name' => Str::random(15),
            'image' => '1000.png',
            'product_detail' => Str::random(100),
            'price' => '15000000',
            'sale' =>0,
            'quantity' =>15,
            'saleprice' => '15000000',
            'status' =>1,
            'trash' =>0,
        ]);
    }
}

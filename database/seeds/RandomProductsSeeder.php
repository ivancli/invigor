<?php

use Illuminate\Database\Seeder;

class RandomProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
        factory(\App\Product::class)->create();
    }
}

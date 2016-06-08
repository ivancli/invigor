<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Australia/Sydney');
        DB::table('products')->insert([
            [
                "id" => 1,
                "name" => "Apple Watch Sport",
                "price" => 429,
                "picture" => base64_encode(file_get_contents(public_path('assets/sample_products/apple_watch_sport.jpg'))),
                "description" => "38mm Space Grey Aluminium Case with Black Sport Band. Strap size: Fits 130–200mm wrists.",
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
            [
                "id" => 2,
                "name" => "Samsung Galaxy Tab S2",
                "price" => 729,
                "picture" => base64_encode(file_get_contents(public_path('assets/sample_products/samsung_galaxy_tab.jpg'))),
                "description" => "8\" 4G 32GB Tablet",
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ],
        ]);
    }
}

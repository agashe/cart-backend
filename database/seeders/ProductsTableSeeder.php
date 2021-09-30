<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'country_id' => 1,
            'type' => 't-shirt',
            'price' => 30.99,
            'weight' => 0.2,
        ]);
        
        Product::create([
            'country_id' => 2,
            'type' => 'blouse',
            'price' => 10.99,
            'weight' => 0.3,
        ]);
                
        Product::create([
            'country_id' => 2,
            'type' => 'pants',
            'price' => 64.99,
            'weight' => 0.9,
        ]);
        
        Product::create([
            'country_id' => 3,
            'type' => 'sweatpants',
            'price' => 84.99,
            'weight' => 1.1,
        ]);
        
        Product::create([
            'country_id' => 1,
            'type' => 'jacket',
            'price' => 199.99,
            'weight' => 2.2,
        ]);
        
        Product::create([
            'country_id' => 3,
            'type' => 'shoes',
            'price' => 79.99,
            'weight' => 1.3,
        ]);
    }
}

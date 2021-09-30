<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ShippingRate;

class ShippingRatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingRate::create([
            'country_id' => 1,
            'amount' => 2.0,
        ]);
        
        ShippingRate::create([
            'country_id' => 2,
            'amount' => 3.0,
        ]);

        ShippingRate::create([
            'country_id' => 3,
            'amount' => 2.0,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => 'United States of America',
            'code' => 'US',
        ]);
        
        Country::create([
            'name' => 'United Kingdom',
            'code' => 'UK',
        ]);

        Country::create([
            'name' => 'China',
            'code' => 'CN',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\RefillPrice;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RefillPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefillPrice::create([
            'bottle' => 7,
            'prices' => '10000, 20000'
        ]);
        
        RefillPrice::create([
            'bottle' => 8,
            'prices' => '10000, 20000'
        ]);

        RefillPrice::create([
            'bottle' => 10,
            'prices' => '20000, 30000'
        ]);

        RefillPrice::create([
            'bottle' => 15,
            'prices' => '30000, 40000, 45000'
        ]);

        RefillPrice::create([
            'bottle' => 20,
            'prices' => '50000, 60000'
        ]);

        RefillPrice::create([
            'bottle' => 30,
            'prices' => '50000, 70000, 90000'
        ]);

        RefillPrice::create([
            'bottle' => 50,
            'prices' => '100000, 150000'
        ]);

        RefillPrice::create([
            'bottle' => 100,
            'prices' => '150000, 20000, 300000'
        ]);
    }
}

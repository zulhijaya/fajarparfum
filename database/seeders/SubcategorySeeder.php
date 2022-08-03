<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::create([
            'category_id' => 1,
            'name' => 'Parfum Refill'
        ]);

        Subcategory::create([
            'category_id' => 1,
            'name' => 'Parfum Laundry'
        ]);
        
        Subcategory::create([
            'category_id' => 1,
            'name' => 'Parfum Mobil'
        ]);
        
        Subcategory::create([
            'category_id' => 1,
            'name' => 'Parfum Jadi'
        ]);
        
        Subcategory::create([
            'category_id' => 2,
            'name' => 'Botol Refill'
        ]);

        Subcategory::create([
            'category_id' => 2,
            'name' => 'Botol Spray'
        ]);
    }
}

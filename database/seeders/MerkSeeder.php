<?php

namespace Database\Seeders;

use App\Models\Merk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Merk::create([
            'name' => 'Umum'
        ]);

        Merk::create([
            'name' => 'IPRA Fragrances'
        ]);

        Merk::create([
            'name' => 'Parfex'
        ]);

        Merk::create([
            'name' => 'Parfarome'
        ]);

        Merk::create([
            'name' => 'Macbrame'
        ]);

        Merk::create([
            'name' => 'Sabrina International Fragrance'
        ]);

        Merk::create([
            'name' => 'Essentiale'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Outlet;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Outlet::create([
            'name' => 'Fajar Parfum',
            'address' => 'Jl. Basuki Rahmat Kilo 8. Depan Mega Mall',
            'type' => 'toko utama',
            'status' => 'buka'
        ]);

        Outlet::create([
            'name' => 'Fajar Parfum 2',
            'address' => 'Jl. Basuki Rahmat Kilo 8. Dalam Mega Mall',
            'type' => 'cabang',
            'status' => 'buka'
        ]);

        Outlet::create([
            'name' => 'Fantasy Parfum',
            'address' => 'Jl. Basuki Rahmat Kilo 12. Sebelum Lampu Merah',
            'type' => 'cabang',
            'status' => 'buka'
        ]);
    }
}

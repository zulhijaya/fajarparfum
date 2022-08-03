<?php

namespace Database\Seeders;

use App\Models\Bottle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BottleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bottle::create([
            'size' => 7,
            'type' => 'polos'
        ]);
        
        Bottle::create([
            'size' => 8,
            'type' => 'polos'
        ]);
        
        Bottle::create([
            'size' => 10,
            'type' => 'polos'
        ]);
        
        Bottle::create([
            'size' => 15,
            'type' => 'polos'
        ]);
        
        Bottle::create([
            'size' => 20,
            'type' => 'polos'
        ]);
        
        Bottle::create([
            'size' => 20,
            'type' => 'berwarna'
        ]);
        
        Bottle::create([
            'size' => 30,
            'type' => 'polos'
        ]);
        
        Bottle::create([
            'size' => 30,
            'type' => 'berwarna'
        ]);
        
        Bottle::create([
            'size' => 50,
            'type' => 'polos'
        ]);
        
        Bottle::create([
            'size' => 50,
            'type' => 'berwarna'
        ]);
        
        Bottle::create([
            'size' => 100,
            'type' => 'polos'
        ]);
    }
}

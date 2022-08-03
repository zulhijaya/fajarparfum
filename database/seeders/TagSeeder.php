<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'Manis'
        ]);

        Tag::create([
            'name' => 'Cowok'
        ]);

        Tag::create([
            'name' => 'Cewek'
        ]);

        Tag::create([
            'name' => 'Fresh'
        ]);

        Tag::create([
            'name' => 'Lembut'
        ]);

        Tag::create([
            'name' => 'Kuat'
        ]);

        Tag::create([
            'name' => 'Cowo'
        ]);
    }
}

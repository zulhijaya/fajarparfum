<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Zulhi Jaya',
            'phone' => '082238415331',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);
        
        User::create([
            'name' => 'Tika',
            'phone' => '081234567890',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'employee',
            'working_hours' => 'part-time',
            'status' => 'bekerja',
            'remember_token' => Str::random(10),
        ]);
        
        User::create([
            'name' => 'Fitri',
            'phone' => '081234567891',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'employee',
            'working_hours' => 'full-time',
            'status' => 'bekerja',
            'remember_token' => Str::random(10),
        ]);
        
        User::create([
            'name' => 'Zul Fajar',
            'phone' => '084782374828',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'manager',
            'status' => 'bekerja',
            'remember_token' => Str::random(10),
        ]);
        
        User::create([
            'name' => 'Ali Imran',
            'phone' => '023476328742',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'manager',
            'status' => 'bekerja',
            'remember_token' => Str::random(10),
        ]);
    }
}

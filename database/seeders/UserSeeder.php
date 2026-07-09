<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan model User di-import
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@amikom.ac.id'],
            [
                'name'     => 'Administrator Amikom',
                'password' => Hash::make('password123'), // Menggunakan Hash bawaan Laravel sesuai model Anda
                'role'     => 'admin', // Mengisi kolom role sesuai struktur model Anda
            ]
        );
    }
}

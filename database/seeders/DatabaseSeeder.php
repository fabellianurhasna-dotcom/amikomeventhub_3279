<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Support\Facades\Hash; // Tambahkan import Hash untuk keamanan password

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin Utama untuk Login Pertemuan 8
        User::firstOrCreate(
            ['email' => 'admin@amikom.ac.id'],
            [
                'name' => 'Admin Amikom',
                'password' => Hash::make('password'), // Mengubah bcrypt menjadi Hash::make (lebih direkomendasikan di Laravel terbaru)
                'role' => 'admin',
            ]
        );

        // 2. Insert Kategori Event
        $category = Category::firstOrCreate(
            ['slug' => 'seminar-it'],
            ['name' => 'Seminar IT']
        );

        // 3. Insert Event 1
        Event::firstOrCreate(
            ['title' => 'Judul Event Inkubator'],
            [
                'category_id' => $category->id,
                'description' => 'Deskripsi untuk event inkubator.',
                'date' => '2026-04-30 09:00:00',
                'location' => 'Inkubator Amikom',
                'price' => 50000,
                'stock' => 100,
                'poster_path' => 'posters/event-2.png',
            ]
        );

        // 4. Insert Event 2
        Event::firstOrCreate(
            ['title' => 'AI & FUTURE TECH SUMMIT 2026'],
            [
                'category_id' => $category->id,
                'description' => 'Jelajahi tren terkini dalam kecerdasan buatan dan teknologi masa depan bersama para ahli di bidangnya.',
                'date' => '2026-05-01 13:00:00',
                'location' => 'Cinema Unit 6',
                'price' => 50000,
                'stock' => 100,
                'poster_path' => 'posters/event-3.png',
            ]
        );
    }
}

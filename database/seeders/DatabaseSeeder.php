<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\ArticleSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\EventSeeder;
use Database\Seeders\GallerySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin IbraLoka',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'User IbraLoka',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password123'),
            'role' => 'customer',
        ]);

        $this->call([
            ArticleSeeder::class,
            ProductSeeder::class,
            EventSeeder::class,
            GallerySeeder::class,
        ]);
    }
}

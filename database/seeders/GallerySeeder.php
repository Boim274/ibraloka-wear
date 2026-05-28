<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        Gallery::create([
            'title' => 'Lookbook 2025',
            'image' => 'galeri-1.jpg',
            'description' => 'Sesi foto lookbook koleksi terbaru IbraLoka Wear 2025 dengan model profesional di studio Jakarta.',
            'category' => 'lookbook',
            'is_featured' => true,
        ]);

        Gallery::create([
            'title' => 'Jakarta Fashion Week',
            'image' => 'galeri-2.jpg',
            'description' => 'Penampilan IbraLoka Wear di panggung Jakarta Fashion Week 2024 yang mendapat sambutan meriah dari pecinta fashion tanah air.',
            'category' => 'event',
            'is_featured' => true,
        ]);

        Gallery::create([
            'title' => 'Editorial Shoot',
            'image' => 'galeri-3.jpg',
            'description' => 'Editorial fashion photography bekerja sama dengan majalah mode terkemuka Indonesia untuk edisi spesial.',
            'category' => 'editorial',
            'is_featured' => false,
        ]);

        Gallery::create([
            'title' => 'Pop-Up Store Jakarta',
            'image' => 'galeri-4.jpg',
            'description' => 'Suasana pop-up store IbraLoka Wear di kawasan SCBD Jakarta yang ramai dikunjungi pelanggan setia.',
            'category' => 'event',
            'is_featured' => false,
        ]);

        Gallery::create([
            'title' => 'Behind the Scene',
            'image' => 'galeri-5.jpg',
            'description' => 'Proses kreatif di balik layar sesi foto kampanye terbaru IbraLoka Wear bersama tim kreatif dan model.',
            'category' => 'behind-scene',
            'is_featured' => false,
        ]);
    }
}

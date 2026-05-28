<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title' => 'IbraLoka Annual Showcase 2025',
                'description' => 'Peluncuran koleksi terbaru IbraLoka Wear untuk paruh kedua 2025. Menampilkan 30+ look baru yang terinspirasi dari kekayaan budaya Nusantara dengan sentuhan modern. Acara ini juga akan dimeriahkan oleh penampilan musik dari musisi lokal serta fashion talk dengan desainer ternama.',
                'image' => 'event-1.jpg',
                'event_date' => '2025-06-20',
                'location' => 'Grand Ballroom Raffles Jakarta',
                'is_published' => true,
            ],
            [
                'title' => 'Pop-Up Store Bandung',
                'description' => 'IbraLoka Wear hadir di Bandung dengan pop-up store eksklusif selama dua minggu. Tersedia koleksi spesial yang hanya bisa didapatkan di Bandung. Pengunjung juga berkesempatan untuk mengikuti workshop fashion styling gratis.',
                'image' => 'event-2.jpg',
                'event_date' => '2025-07-12',
                'location' => 'Braga Citywalk, Bandung',
                'is_published' => true,
            ],
            [
                'title' => 'Workshop Fashion Berkelanjutan',
                'description' => 'Workshop interaktif mengenai sustainable fashion bersama desainer dan pegiat lingkungan. Pelajari cara berkontribusi pada industri fashion yang lebih ramah lingkungan. Setiap peserta akan mendapatkan goodie bag eksklusif IbraLoka Wear.',
                'image' => 'event-3.jpg',
                'event_date' => '2025-08-05',
                'location' => 'IbraLoka Creative Hub, Jakarta',
                'is_published' => true,
            ],
            [
                'title' => 'IbraLoka x Kolaborasi Seni',
                'description' => 'Peluncuran koleksi kolaborasi terbatas dengan seniman kontemporer Indonesia. Sebuah perpaduan antara fashion dan seni rupa dalam bentuk karya yang wearable. Koleksi ini hanya tersedia di malam launching dan secara online selama 24 jam.',
                'image' => 'event-4.jpg',
                'event_date' => '2025-09-17',
                'location' => 'Galeri Nasional Jakarta',
                'is_published' => true,
            ],
        ];

        foreach ($events as $data) {
            Event::create(array_merge($data, ['slug' => Str::slug($data['title'])]));
        }
    }
}

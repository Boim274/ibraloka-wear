<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Mengapa Fashion Lokal Indonesia Semakin Diminati Generasi Z',
                'category' => 'fashion',
                'excerpt' => 'Pergeseran preferensi konsumen muda Indonesia terhadap produk lokal bukan sekadar tren — ini adalah gerakan budaya yang mengakar kuat dan bermakna.',
                'content' => 'Fashion lokal Indonesia saat ini sedang mengalami kebangkitan yang luar biasa. Generasi Z, yang kini menjadi kekuatan konsumen dominan, semakin bangga menggunakan produk lokal dan menjadikannya sebagai identitas diri. Fenomena ini tidak terjadi secara instan — ada banyak faktor yang mendorong perubahan mindset ini. Pertama, kualitas produk lokal yang semakin baik dan tidak kalah dengan brand internasional. Kedua, narasi storytelling yang kuat di balik setiap brand lokal — cerita tentang pengrajin, bahan baku lokal, dan warisan budaya yang kaya. Ketiga, kemudahan akses melalui platform digital dan media sosial. IbraLoka Wear hadir di tengah gelombang ini dengan misi mengangkat fashion lokal ke level luxury yang sebelumnya didominasi brand asing.',
                'image' => 'artikel-1.jpg',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Upaya IbraLoka Menuju Fashion yang Lebih Berkelanjutan',
                'category' => 'sustainability',
                'excerpt' => 'Langkah konkret IbraLoka Wear dalam mengurangi dampak lingkungan melalui penggunaan bahan ramah lingkungan dan proses produksi etis.',
                'content' => 'Keberlanjutan bukan sekadar buzzword bagi IbraLoka Wear. Kami telah mengambil langkah-langkah konkret untuk memastikan bahwa setiap produk yang kami hasilkan tidak hanya indah secara estetika tetapi juga bertanggung jawab terhadap lingkungan. Beberapa inisiatif yang telah kami jalankan meliputi: penggunaan 100% bahan katun organik bersertifikat untuk lini Essentials, program daur ulang kemasan yang memungkinkan pelanggan mengembalikan kemasan lama untuk didaur ulang, kemitraan dengan pengrajin lokal yang menerapkan praktik produksi etis, dan pengurangan penggunaan plastik dalam rantai pasok kami sebesar 70% pada tahun 2025. Kami juga berkomitmen untuk mencapai target carbon neutral pada tahun 2027 melalui program kompensasi karbon dan efisiensi energi di seluruh fasilitas produksi.',
                'image' => 'artikel-2.jpg',
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => '5 Cara Padu Padan Koleksi IbraLoka untuk Tampilan Kasual Elegan',
                'category' => 'style-guide',
                'excerpt' => 'Inspirasi gaya daily look dengan koleksi IbraLoka Wear — dari office casual hingga weekend vibes yang santai namun tetap berkelas.',
                'content' => 'Tampil kasual elegan adalah seni yang bisa dipelajari. Dengan koleksi IbraLoka Wear, Anda bisa menciptakan berbagai look yang effortless namun tetap berkelas. Berikut lima cara padu padan favorit kami: (1) Padukan oversized blazer dari lini Outerwear dengan plain white tee dan celana tailored dari lini Bottoms untuk look office casual yang timeless. (2) Kenakan essential hoodie IbraLoka dengan celana cargo dan sneakers untuk weekend vibe yang nyaman. (3) Layering maxi dress dari lini Limited Edition dengan jaket denim untuk tampilan feminin yang edgy. (4) Setelan monokromatik — atasan dan bawahan senada dalam warna earth tone — menciptakan ilusi silhouette yang lebih panjang dan elegan. (5) Aksesoris statement seperti belt atau tas dari lini Accessories bisa mengubah look simpel menjadi standout dalam sekejap.',
                'image' => 'artikel-3.jpg',
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ],
            [
                'title' => 'Cerita di Balik Koleksi "Nusantara Baru" IbraLoka',
                'category' => 'behind-brand',
                'excerpt' => 'Proses kreatif dan inspirasi budaya di balik koleksi terbaru IbraLoka Wear yang menggabungkan motif tradisional dengan potongan modern.',
                'content' => 'Koleksi "Nusantara Baru" adalah persembahan spesial IbraLoka Wear yang lahir dari riset mendalam selama enam bulan. Tim kreatif kami melakukan perjalanan ke lima daerah di Indonesia — Sumatra Utara, Yogyakarta, Bali, Kalimantan Timur, dan Sulawesi Selatan — untuk mempelajari teknik tenun tradisional dan motif khas daerah. Koleksi ini menampilkan reinterpretasi motif batik dan tenun dalam siluet modern yang wearable. Setiap piece dibuat dengan kolaborasi langsung dengan pengrajin lokal, memastikan bahwa teknik tradisional tetap terjaga sementara desainnya relevan untuk pasar kontemporer. Hasilnya adalah koleksi yang menceritakan kisah Indonesia yang kaya melalui bahasa fashion yang universal.',
                'image' => 'artikel-4.jpg',
                'is_published' => true,
                'published_at' => now()->subDays(30),
            ],
        ];

        foreach ($articles as $data) {
            Article::create(array_merge($data, ['slug' => Str::slug($data['title'])]));
        }
    }
}

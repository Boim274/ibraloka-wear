<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Oversized Blazer Nusantara', 'category' => 'apparel', 'price' => 1850000, 'image' => 'produk-outerwear.jpg', 'description' => 'Blazer premium dengan potongan oversized, cocok untuk gaya kasual formal. Dibuat dari bahan wool blend berkualitas tinggi dengan lapisan inner satin halus.', 'is_featured' => true],
            ['name' => 'Classic Trench Coat', 'category' => 'apparel', 'price' => 2450000, 'image' => 'produk-outerwear.jpg', 'description' => 'Trench coat ikonik dengan tailoring modern. Dilengkapi sabuk waist dan detail epaulette. Cocok untuk berbagai musim dan acara.', 'is_featured' => false],
            ['name' => 'Signature Cotton Tee', 'category' => 'apparel', 'price' => 299000, 'image' => 'produk-essentials.jpg', 'description' => 'T-shirt katun organik premium dengan potongan regular fit. Tersedia dalam berbagai pilihan warna earth tone yang timeless.', 'is_featured' => true],
            ['name' => 'Linen Button-Down Shirt', 'category' => 'apparel', 'price' => 549000, 'image' => 'produk-essentials.jpg', 'description' => 'Kemeja linen premium dengan potongan relaxed. Cocok untuk tropical formal look yang tetap adem dan nyaman sepanjang hari.', 'is_featured' => false],
            ['name' => 'Tailored Wool Trousers', 'category' => 'apparel', 'price' => 1250000, 'image' => 'produk-bottoms.jpg', 'description' => 'Celana tailored dari bahan wool premium dengan high-rise cut. Siluet lurus yang elegan untuk tampilan formal maupun smart casual.', 'is_featured' => true],
            ['name' => 'Pleated Wide-Leg Pants', 'category' => 'apparel', 'price' => 850000, 'image' => 'produk-bottoms.jpg', 'description' => 'Celana wide-leg dengan pleats depan yang memberi kesan flowy dan elegan. Elastis waistband untuk kenyamanan maksimal.', 'is_featured' => false],
            ['name' => 'Leather Crossbody Bag', 'category' => 'accessories', 'price' => 1250000, 'image' => 'produk-accessories.jpg', 'description' => 'Tas crossbody kulit asli dengan desain minimalis. Dilengkapi kompartemen yang fungsional untuk kebutuhan harian.', 'is_featured' => true],
            ['name' => 'Gold Signet Ring', 'category' => 'accessories', 'price' => 350000, 'image' => 'produk-accessories.jpg', 'description' => 'Cincin signet dengan logo IbraLoka terukir di permukaannya. Dibuat dari brass berlapis emas 18K dengan finishing matte elegan.', 'is_featured' => false],
            ['name' => 'Limited Edition Kimono Jacket', 'category' => 'limited', 'price' => 2200000, 'image' => 'produk-limited.jpg', 'description' => 'Jaket kimono limited edition hasil kolaborasi dengan seniman batik kontemporer. Setiap piece memiliki motif unik yang dikerjakan secara handmade.', 'is_featured' => true],
            ['name' => 'Limited Edition Silk Scarf', 'category' => 'limited', 'price' => 875000, 'image' => 'produk-limited.jpg', 'description' => 'Scarf sutra premium dengan motif Nusantara kontemporer. Edisi terbatas hanya 50 piece dengan sertifikat keaslian.', 'is_featured' => false],
            ['name' => 'Urban Street Hoodie', 'category' => 'apparel', 'price' => 650000, 'image' => 'produk-streetwear.jpg', 'description' => 'Hoodie streetwear dengan oversized fit. Bahan fleece heavyweight 400 GSM dengan bordir logo signature di dada.', 'is_featured' => true],
            ['name' => 'Cargo Parachute Pants', 'category' => 'apparel', 'price' => 550000, 'image' => 'produk-streetwear.jpg', 'description' => 'Celana cargo dengan siluet longgar dan detail tali di pinggang. Material nilon ripstop ringan yang nyaman untuk daily wear.', 'is_featured' => false],
        ];

        foreach ($products as $data) {
            Product::create(array_merge($data, ['slug' => Str::slug($data['name'])]));
        }
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            UPDATE products SET image = CASE `name`
                WHEN 'Oversized Blazer Nusantara' THEN 'blazer-nusantara.jpg'
                WHEN 'Classic Trench Coat' THEN 'trench-coat.jpg'
                WHEN 'Signature Cotton Tee' THEN 'cotton-tee.jpg'
                WHEN 'Linen Button-Down Shirt' THEN 'linen-shirt.jpg'
                WHEN 'Tailored Wool Trousers' THEN 'wool-trousers.jpg'
                WHEN 'Pleated Wide-Leg Pants' THEN 'wide-leg-pants.jpg'
                WHEN 'Leather Crossbody Bag' THEN 'crossbody-bag.jpg'
                WHEN 'Gold Signet Ring' THEN 'signet-ring.jpg'
                WHEN 'Limited Edition Kimono Jacket' THEN 'kimono-jacket.jpg'
                WHEN 'Limited Edition Silk Scarf' THEN 'silk-scarf.jpg'
                WHEN 'Urban Street Hoodie' THEN 'street-hoodie.jpg'
                WHEN 'Cargo Parachute Pants' THEN 'cargo-pants.jpg'
            END
        ");
    }

    public function down(): void
    {
        DB::statement("
            UPDATE products SET image = CASE `name`
                WHEN 'Oversized Blazer Nusantara' THEN 'produk-outerwear.jpg'
                WHEN 'Classic Trench Coat' THEN 'produk-outerwear.jpg'
                WHEN 'Signature Cotton Tee' THEN 'produk-essentials.jpg'
                WHEN 'Linen Button-Down Shirt' THEN 'produk-essentials.jpg'
                WHEN 'Tailored Wool Trousers' THEN 'produk-bottoms.jpg'
                WHEN 'Pleated Wide-Leg Pants' THEN 'produk-bottoms.jpg'
                WHEN 'Leather Crossbody Bag' THEN 'produk-accessories.jpg'
                WHEN 'Gold Signet Ring' THEN 'produk-accessories.jpg'
                WHEN 'Limited Edition Kimono Jacket' THEN 'produk-limited.jpg'
                WHEN 'Limited Edition Silk Scarf' THEN 'produk-limited.jpg'
                WHEN 'Urban Street Hoodie' THEN 'produk-streetwear.jpg'
                WHEN 'Cargo Parachute Pants' THEN 'produk-streetwear.jpg'
            END
        ");
    }
};

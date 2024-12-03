<?php

namespace Database\Seeders;

use App\Models\Shop;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Với mỗi shop, tạo 5 sản phẩm
        Shop::all()->each(function ($shop) {
            Product::factory(5)->create(['id_shop' => $shop->id]);
        });
    }
}

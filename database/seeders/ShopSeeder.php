<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    public function run()
    {
        Shop::factory(10)->create(); // Tạo 10 mẫu dữ liệu
    }
}


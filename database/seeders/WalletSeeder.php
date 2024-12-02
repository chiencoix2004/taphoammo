<?php

namespace Database\Seeders;

use App\Models\Wallet;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    public function run()
    {
        // Tạo 5 ví mẫu cho người dùng
        Wallet::factory()->count(6)->create();
    }
}

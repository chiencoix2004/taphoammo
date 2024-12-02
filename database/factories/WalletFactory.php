<?php

namespace Database\Factories;

use App\Models\Wallet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WalletFactory extends Factory
{
    protected $model = Wallet::class;

    public function definition()
    {
        // Lấy id_user từ bảng User đã tồn tại, id_wallet từ bảng User, và cash mặc định
        return [
            'id_user' => User::inRandomOrder()->first()->id, // Chọn ngẫu nhiên một user
            'id_wallet' => $this->faker->unique()->uuid(),  // Tạo id_wallet ngẫu nhiên
            'cash' => $this->faker->randomFloat(2, 100, 10000),  // Tạo số tiền ngẫu nhiên
        ];
    }
}

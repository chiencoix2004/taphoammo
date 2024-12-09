<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'id_shop' => Shop::inRandomOrder()->first()->id, // Lấy shop ngẫu nhiên
            // 'category_id' => Categories::inRandomOrder()->first()->id, 
            'product_name' => $this->faker->word(), // Giả sử bạn có phương thức giả lập tên sản phẩm
            'price' => $this->faker->numberBetween(100, 1000),
            'quantity' => $this->faker->numberBetween(1, 100),
            'status' => 1,
        ];
    }
}

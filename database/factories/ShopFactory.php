<?php

namespace Database\Factories;


// use Illuminate\Database\Eloquent\Factories\Factory;
// use App\Models\Shop;
// use App\Models\User;
// use App\Models\Category;
// class ShopFactory extends Factory
// {
//     protected $model = Shop::class;

//     public function definition()
//     {
//         // Lấy ngẫu nhiên một danh mục cấp 3
//         // $category = Categories::whereHas('children', function($query) {
//         //     $query->whereNull('children.id');
//         // })->inRandomOrder()->first();
//         $category = Categories::whereDoesntHave('children')->inRandomOrder()->first();

//         return [
//             'id_user' => User::inRandomOrder()->first()->id,
//             'title' => $this->faker->company,
//             'short_description' => $this->faker->sentence,
//             'description' => $this->faker->paragraph,
//             'image' => $this->faker->imageUrl(640, 480, 'business'),
//             'status' => 1,  // Đảm bảo chỉ có giá trị 1 hoặc 0
//             'id_category' => $category->id,
//             'discount' => $category->discount, // Lấy discount từ danh mục
//         ];
//     }
// }
namespace Database\Factories;

use App\Models\Categories;
use App\Models\Shop;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    protected $model = Shop::class;

    public function definition()
    {
        // Lấy danh mục cấp 3 ngẫu nhiên (có ít nhất 2 cấp cha)
        $categoryLevel3 = Categories::whereHas('parent.parent', function ($query) {
            $query->whereNotNull('id'); // Đảm bảo rằng có ít nhất 2 cấp cha
        })
            ->with('parent.parent') // Lấy tất cả dữ liệu cấp 2 và cấp 1 (cha của nó)
            ->inRandomOrder()
            ->first();

        // Nếu không có danh mục cấp 3, bạn có thể xử lý trường hợp này, ví dụ:
        if (!$categoryLevel3) {
            // Xử lý khi không có danh mục cấp 3 (nếu cần)
            // $categoryLevel3 = Categories::whereHas('parent')->first(); // Lấy danh mục cấp 2
        }
        
        return [
            'id_user' => User::inRandomOrder()->first()->id,
            'title' => $this->faker->company,
            'short_description' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl,
            'status' => 1, // Shop hoạt động
            'id_category' => $categoryLevel3->id, // Lấy id của danh mục cấp 3
            'discount' => $categoryLevel3->discount, // Lấy discount từ danh mục cấp 3
        ];
        
    }
}

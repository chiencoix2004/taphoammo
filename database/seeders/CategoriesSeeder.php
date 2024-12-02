<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        // Tạo 3 danh mục cha, mỗi danh mục cha có 3 danh mục con
        Categories::factory()->count(3)->create()->each(function ($category) {
            // Tạo 3 mục con cho mỗi mục cha
            Categories::factory()->count(3)->withParent($category->id)->create();
        });

        // Hoặc bạn có thể tạo danh mục cha và con như sau:
        // Category::factory()->createWithChildren(5);
    }
}

<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriesFactory extends Factory
{
    protected $model = Categories::class;

    public function definition()
    {
        $name = $this->faker->name();

        return [
            'name' => $name,
            'slug' => Str::slug($name), // Tạo slug từ name
            'parent_id' => null, // Mặc định không có cha (dành cho mục cha)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    // Tạo danh mục con cho một danh mục cha
    public function withParent($parentId)
    {
        return $this->state([
            'parent_id' => $parentId,
        ]);
    }

    // Tạo danh mục cha và danh mục con
    public function createWithChildren(int $childrenCount = 3)
    {
        // Tạo danh mục cha
        $parentCategory = Categories::create($this->definition());

        // Tạo các danh mục con cho cha vừa tạo
        Categories::factory()->count($childrenCount)->withParent($parentCategory->id)->create();

        return $parentCategory; // Trả về danh mục cha
    }

    // Quan hệ self-referencing (danh mục con)
    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }

    // Quan hệ self-referencing (danh mục cha)
    public function parent()
    {
        return $this->belongsTo(Categories::class, 'parent_id');
    }
}

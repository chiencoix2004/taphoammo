<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

// class Categories extends Model
// {
//     use HasFactory;

//     protected $fillable = ['name', 'slug', 'image']; // Đảm bảo 'slug' có trong fillable

//     // Boot function to create slug from name
//     protected static function boot()
//     {
//         parent::boot();

//         // Tạo slug tự động khi lưu tên
//         static::creating(function ($categories) {
//             $categories->slug = Str::slug($categories->name);
//         });

//         // Cập nhật slug nếu tên thay đổi
//         static::updating(function ($categories) {
//             $categories->slug = Str::slug($categories->name);
//         });
//     }

//     public function subCategories()
// {
//     return $this->hasMany(SubCategory::class, 'category_id');
// }

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'parent_id', 'discount', 'status'];

    // Tạo slug tự động khi lưu
    public static function boot()
    {
        parent::boot();
        // Tạo slug tự động khi lưu tên
        static::creating(function ($categories) {
            $categories->slug = Str::slug($categories->name);
        });

        // Cập nhật slug nếu tên thay đổi
        static::updating(function ($categories) {
            $categories->slug = Str::slug($categories->name);
        });
    }

    public function parent()
    {
        return $this->belongsTo(Categories::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }


    // Thêm thuộc tính level vào model Categories
public function getLevelAttribute()
{
    $level = 0;
    $parent = $this->parent;
    
    while ($parent) {
        $level++;
        $parent = $parent->parent; // Đi lên theo cây cha
    }
    
    return $level;
}

}




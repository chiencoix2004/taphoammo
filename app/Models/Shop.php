<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'title',
        'short_description',
        'description',
        'image',
        'status',
        'id_category',
        'discount',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_category');
    }
}

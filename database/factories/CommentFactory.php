<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'id_shop' => Shop::inRandomOrder()->first()->id,
            'id_user' => User::inRandomOrder()->first()->id,
            'content' => $this->faker->sentence(10),
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}

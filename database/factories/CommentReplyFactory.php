<?php
namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\CommentReply;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentReplyFactory extends Factory
{
    protected $model = CommentReply::class;

    public function definition()
    {
        return [
            'comment_id' => Comment::inRandomOrder()->first()->id, // Lấy bình luận ngẫu nhiên
            'id_user' => User::inRandomOrder()->first()->id, // Lấy người dùng ngẫu nhiên
            'content' => $this->faker->sentence(5),
        ];
    }
}

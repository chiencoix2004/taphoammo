<?php
namespace Database\Seeders;

use App\Models\CommentReply;
use Illuminate\Database\Seeder;

class CommentReplySeeder extends Seeder
{
    public function run()
    {
        CommentReply::factory()->count(100)->create(); // Tạo 100 câu trả lời mẫu
    }
}

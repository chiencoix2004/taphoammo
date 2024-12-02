<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Schema::create('shops', function (Blueprint $table) {
        //     $table->id(); // ID tự động tăng
        //     $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); // Khóa ngoại liên kết với bảng users
        //     $table->string('title'); // Tiêu đề gian hàng
        //     $table->string('short_description')->nullable(); // Mô tả ngắn
        //     $table->text('description')->nullable(); // Mô tả chi tiết
        //     $table->string('image')->nullable(); // Đường dẫn ảnh đại diện
        //     $table->enum('status', ['1', '2', '3'])->default('1'); // Trạng thái gian hàng
        //     $table->foreignId('id_category')->nullable()->constrained('categories')->nullOnDelete(); // Liên kết với bảng categories
        //     $table->decimal('discount', 5, 2)->default(0); // Giảm giá
        //     $table->timestamps(); // created_at và updated_at
        // });
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['1', '2', '3'])->default('1'); // Trạng thái gian hàng
            $table->foreignId('id_category')->constrained('categories')->onDelete('cascade');
            $table->decimal('discount', 5, 2)->default(0); // Lưu % chiết khấu
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('shops');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Tự động tạo khóa chính id
            $table->foreignId('id_shop')->constrained('shops')->onDelete('cascade'); // Khóa ngoại đến bảng shops
            $table->string('product_name');
            $table->decimal('price', 10); // Giá sản phẩm (tối đa 10 chữ số, 2 chữ số thập phân)
            $table->integer('quantity')->default(0); // Số lượng sản phẩm
            $table->boolean('status')->default(1); // Trạng thái sản phẩm (1: hoạt động, 0: không hoạt động)
            $table->timestamps(); // Tạo các cột created_at và updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

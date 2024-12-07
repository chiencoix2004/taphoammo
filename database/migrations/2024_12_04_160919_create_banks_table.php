<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id(); // Tạo trường id tự động
            $table->string('bank_name'); // Tên ngân hàng
            $table->string('bankers'); // Người giao dịch
            $table->string('account_number'); // Số tài khoản
            $table->string('image')->nullable(); // Hình ảnh của ngân hàng (có thể rỗng)
            $table->enum('status', ['1', '2'])->default('1'); // Trạng thái (active hoặc inactive)
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}

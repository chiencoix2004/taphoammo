<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID tự tăng
            $table->string('fullname'); // Họ và tên
            $table->string('username')->unique(); // Tên đăng nhập, duy nhất
            $table->string('phone')->unique(); // Số điện thoại, duy nhất
            $table->string('email')->unique(); // Email, duy nhất
            $table->timestamp('email_verified_at')->nullable(); // Xác thực email
            $table->string('password'); // Mật khẩu
            $table->string('id_wallet')->unique()->nullable(); // ID ví, duy nhất, cho phép null
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active'); // Trạng thái
            $table->string('zalo')->nullable(); // Zalo, cho phép null
            $table->string('facebook')->nullable(); // Facebook, cho phép null
            $table->string('image')->nullable(); // Ảnh đại diện, cho phép null
            $table->rememberToken(); // Token nhớ đăng nhập
            $table->timestamps(); // created_at và updated_at
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Email chính, duy nhất
            $table->string('token'); // Token đặt lại mật khẩu
            $table->timestamp('created_at')->nullable(); // Thời gian tạo token
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // ID phiên
            $table->foreignId('user_id')->nullable()->index(); // ID người dùng, liên kết khóa ngoại
            $table->string('ip_address', 45)->nullable(); // Địa chỉ IP
            $table->text('user_agent')->nullable(); // Thông tin trình duyệt
            $table->longText('payload'); // Dữ liệu phiên
            $table->integer('last_activity')->index(); // Hoạt động gần nhất
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

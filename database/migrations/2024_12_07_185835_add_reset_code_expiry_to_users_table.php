<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->timestamp('reset_code_expiry')->nullable();  // Thêm cột thời gian hết hạn mã xác nhận
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('reset_code_expiry');
    });
}

};

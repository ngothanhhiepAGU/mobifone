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
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // Cột ID tự tăng
            $table->string('name')->nullable(); // Tên admin
            $table->string('avatar')->nullable(); // Ảnh đại diện
            $table->string('email')->unique()->nullable(); // Email
            $table->string('password')->nullable(); // Mật khẩu
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins'); // Xóa bảng khi rollback migration
    }
};


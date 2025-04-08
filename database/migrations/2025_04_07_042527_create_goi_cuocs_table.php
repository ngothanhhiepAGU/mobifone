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
        Schema::create('goi_cuocs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_goi')->unique();   // Tên gói cước
            $table->text('mo_ta')->nullable();     // Mô tả gói cước
            $table->integer('gia');                // Giá tiền (đơn vị VNĐ)
            $table->integer('thoi_han');           // Thời hạn sử dụng (tính theo ngày)
            $table->string('nha_mang');            // Nhà mạng áp dụng
            $table->timestamps();                  // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goi_cuocs');
    }
};

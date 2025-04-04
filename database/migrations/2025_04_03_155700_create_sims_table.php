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
        Schema::create('sims', function (Blueprint $table) {
            $table->id();
            $table->string('so_sim')->unique();  // Số SIM (duy nhất)
            $table->string('loai_sim');         // Loại SIM (trả trước, trả sau,...)
            $table->string('nha_mang');         // Nhà mạng (Viettel, Mobifone, Vinaphone,...)
            $table->enum('trang_thai', ['kich hoat', 'chua kich hoat', 'chan'])
                  ->default('chua kich hoat'); // Chỉ cho phép 3 giá trị
            $table->date('ngay_kich_hoat')->nullable(); // Ngày kích hoạt
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sims');
    }
};

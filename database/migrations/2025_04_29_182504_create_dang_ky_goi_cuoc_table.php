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
        Schema::create('dang_ky_goi_cuoc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('so_dien_thoai_id')->constrained('so_dien_thoai')->onDelete('cascade');
            $table->foreignId('goi_cuoc_id')->constrained('goi_cuoc')->onDelete('cascade');
            $table->timestamps();
            $table->enum('trang_thai', ['cho_duyet', 'da_duyet', 'tu_choi'])->default('cho_duyet');
            $table->string('ly_do_tu_choi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dang_ky_goi_cuoc');
    }
};

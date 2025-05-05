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
        Schema::create('so_dien_thoai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('so');
            $table->string('chu_so_huu');
            $table->timestamps();

            // Ràng buộc khóa ngoại từ `so` đến `sims.sodt`
            $table->foreign('so')->references('sodt')->on('sims')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('so_dien_thoai');
    }
};

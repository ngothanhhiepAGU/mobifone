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
        Schema::create('bai_dangs', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de')->index();             // Tiêu đề bài đăng
            $table->text('noi_dung');                       // Nội dung chi tiết
            $table->string('tac_gia')->nullable();          // Tác giả
            $table->string('hinh_anh')->nullable();         // Hình ảnh đại diện
            $table->timestamp('ngay_dang')->useCurrent()->nullable(); // Ngày đăng
            $table->string('the_loai')->nullable();         // Thể loại bài đăng (Ví dụ: "Tin tức", "Khuyến mãi", v.v.)
            $table->timestamps();
            $table->softDeletes(); // Thêm cột deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bai_dangs');
    }
};

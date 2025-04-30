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
        Schema::create('goi_cuoc', function (Blueprint $table) {
            $table->id();
            $table->string('ten_goi');                                      // Tên gói cước
            $table->decimal('gia', 10, 2);                                  // Giá gói cước
            $table->text('mo_ta')->nullable();                              // Mô tả gói cước
            // Thêm cột 'cu_phap_dang_ky' vào sau cột 'mo_ta'
            $table->string('cu_phap_dang_ky')->nullable();                  //  Đã sửa
            $table->string('hinh_anh')->nullable();                         // Hình ảnh đại diện
            // Thêm cột mô tả chi tiết
            $table->text('mo_ta_chi_tiet')->nullable(); // Thêm cột mô tả chi tiết
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('goi_cuoc');
    }
};

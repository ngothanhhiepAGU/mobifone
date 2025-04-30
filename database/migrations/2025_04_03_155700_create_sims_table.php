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
        Schema::create('sims', function (Blueprint $table) {
            $table->id();
            $table->string('so_id')->unique();
            $table->string('loai_sim')->nullable();                                         // Cột loại SIM
            $table->decimal('gia', 10, 2)->nullable();                                      // Cột giá SIM
            $table->string('network_provider');                                             // Cột nhà mạng
            $table->enum('status', ['active', 'inactive', 'blocked'])->default('inactive'); // Cột tình trạng
            $table->date('activation_date')->nullable();                                    // Cột ngày kích hoạt
            // Thêm cột 'loai_thue_bao' với kiểu enum, nhưng không cần sử dụng 'after'
            $table->enum('loai_thue_bao', ['Tra Truoc', 'Tra Sau'])->default('Tra Truoc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('sims'); // Xóa bảng nếu cần rollback
    }
};

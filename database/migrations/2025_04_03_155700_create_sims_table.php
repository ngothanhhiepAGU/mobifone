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
            $table->id('so_id'); // Tự động tăng và là khóa chính
            $table->string('sodt')->unique(); // Số điện thoại
            $table->enum('loai_thue_bao', ['Trả trước', 'Trả sau', 'Fast Connect']); // Enum đúng theo DB
            $table->string('network_provider');
            $table->enum('status', ['active', 'inactive', 'blocked'])->default('inactive');
            $table->date('activation_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('sims');
    }
};

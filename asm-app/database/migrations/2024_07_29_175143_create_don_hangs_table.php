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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang');
            $table->string('ten_nguoi_nhan');
            $table->string('email_nguoi_nhan');
            $table->string('so_dien_thoai_nguoi_nhan');
            $table->string('dia_chi_nguoi_nhan');
            $table->date('ngay_dat');
            $table->double('tong_tien',10, 2);
            $table->text('ghi_chu');
            $table->unsignedBigInteger('trang_thai_id');
            //tạo khóa ngoại
            $table->foreign('trang_thai_id')->references('id')->on('trang_thai_don_hangs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};

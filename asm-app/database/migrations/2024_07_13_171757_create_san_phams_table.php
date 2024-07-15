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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham');
            $table->string('hinh_anh')->nullable();
            $table->unsignedInteger('so_luong');
            $table->double('gia_san_pham',10, 2);
            $table->double('gia_khuyen_mai',10, 2);
            $table->date('ngay_nhap');
            $table->text('mo_ta');
            $table->unsignedBigInteger('danh_muc_id');
            $table->string('trang_thai');
            //tạo khóa ngoại
            $table->foreign('danh_muc_id')->references('id')->on('danh_mucs')->onDelete('cascade');
            //foreign là định nghĩa 1 dàng buộc khóa ngoại
            //references: xác định cột mà khóa ngoại tham chiếu
            //on: xác định bảng tham chiếu.
            //onDelete: nếu danh mục bị xóa thì sẽ tiến hành xóa toàn bộ sản phẩm của danh mục đấy.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};

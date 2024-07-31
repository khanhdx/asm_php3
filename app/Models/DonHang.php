<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $fillable = [

        'ma_don_hang',
        'ten_nguoi_nhan',
        'email_nguoi_nhan',
        'so_dien_thoai_nguoi_nhan',
        'dia_chi_nguoi_nhan',
        'ngay_dat',
        'tong_tien',
        'ghi_chu',
        'trang_thai_id',

    ];
    public $table = 'don_hangs';

    public $timestamp = false;

    public function trangThaiDonHang()
    {
        return $this->belongsTo(TrangThaiDonHang::class, 'trang_thai_id');
    }
    public function createdonHang($data) 
    {
        DB::table('don_hangs')->insert($data); 
    }

    public function updateDonHang($data, $id) 
    {
        DB::table('don_hangs')
        ->where('id', $id)
        ->update($data);  
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;
    protected $fillable = [

        'don_hang_id',
        'san_pham_id',
        'so_luong',
        'gia',
        'thanh_tien',
    ];
    public $table = 'chi_tiet_don_hangs';

    public $timestamp = false;

    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'don_hang_id');
    }
    public function sanPham()
    {
        return $this->belongsTo(sanPham::class, 'san_pham_id');
    }
    public function createchiTietDonHang($data) 
    {
        DB::table('chi_tiet_don_hangs')->insert($data); 
    }

    public function updateChiTietDonHang($data, $id) 
    {
        DB::table('chi_tiet_don_hangs')
        ->where('id', $id)
        ->update($data);  
    }
}

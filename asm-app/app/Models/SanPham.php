<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPham extends Model
{
    use HasFactory;

    protected $fillable = [

        'ten_san_pham',
        'hinh_anh',
        'so_luong',
        'gia_san_pham',
        'gia_khuyen_mai',
        'ngay_nhap',
        'mo_ta',
        'danh_muc_id',
        'trang_thai',

    ];
    public $table = 'san_phams';

    public $timestamp = false;

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'danh_muc_id');
    }

    // c1: sử dụng Query Builer
    // public function getAll() {
    //     $san_phams = DB::table('san_phams')
    //     ->join('danh_mucs', 'san_phams.danh_muc_id', '=', 'danh_mucs.id')
    //     ->select('san_phams.*', 'danh_mucs.ten_danh_muc')
    //     ->orderBy('san_phams.id', 'DESC')
    //     ->get();

    //     return $san_phams;
    // }
    //sử lý thêm sản phẩm
    public function createsanPham($data) 
    {
        // DB::table('san_phams')->insert([
        //     'ten_san_pham' => $data['ten_san_pham'],
        //     'hinh_anh' => $data['hinh_anh'],
        //     'so_luong' => $data['so_luong'],
        //     'gia_san_pham' => $data['gia_san_pham'],
        //     'gia_khuyen_mai' => $data['gia_khuyen_mai'],
        //     'ngay_nhap' => $data['ngay_nhap'],
        //     'mo_ta' => $data['mo_ta'],
        //     'danh_muc_id' => $data['danh_muc_id'],
        //     'trang_thai' => $data['trang_thai'],
        // ]);
        DB::table('san_phams')->insert($data); 
    }

    public function updateSanPham($data, $id) 
    {
        DB::table('san_phams')
        ->where('id', $id)
        ->update($data);  
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrangThaiDonHang extends Model
{
    use HasFactory;
    protected $fillable = [
        'ten_trang_thai',
    ];
    public $table = 'trang_thai_don_hangs';

    public $timestamp = false;

    public function donHangs() {
        return $this->hasMany(DonHang::class, 'trang_thai_id');
    }

    public function createtrangThaiDonHang($data) 
    {
        
        DB::table('trang_thai_don_hangs')->insert($data); 
    }
    public function updatetrangThaiDonHang($data, $id) 
    {
        DB::table('trang_thai_don_hangs')
        ->where('id', $id)
        ->update($data);  
    }
}

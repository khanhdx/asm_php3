<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DanhMuc extends Model
{
    use HasFactory;

    protected $fillable = [

        'hinh_anh',
        'ten_danh_muc',
        'mo_ta'

    ];
    public $table = 'danh_mucs';

    public $timestamp = false;

    public function sanPhams() {
        return $this->hasMany(SanPham::class, 'danh_muc_id');
    }

    public function createdanhMuc($data) 
    {
        
        DB::table('danh_mucs')->insert($data); 
    }
    public function updatedanhMuc($data, $id) 
    {
        DB::table('danh_mucs')
        ->where('id', $id)
        ->update($data);  
    }

}

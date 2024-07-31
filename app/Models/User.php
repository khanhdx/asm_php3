<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public $table = 'users';

    public $timestamp = false;

    // public function danhMuc()
    // {
    //     return $this->belongsTo(DanhMuc::class, 'danh_muc_id');
    // }

    // c1: sử dụng Query Builer
    public function getAll() {
        $users = DB::table('users')
        ->select('users.*')
        ->orderBy('users.id', 'DESC')
        ->get();

        return $users;
    }
    //sử lý thêm sản phẩm
    public function createUser($data) 
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
        DB::table('users')->insert($data); 
    }

    public function updateUser($data, $id) 
    {
        DB::table('users')
        ->where('id', $id)
        ->update($data);  
    }
}

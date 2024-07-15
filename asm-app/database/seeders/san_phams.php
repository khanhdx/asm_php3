<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class san_phams extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('san_phams')->insert(
            [
                [
                    
                    'ten_san_phams' => 'Iphone 15',
                    'hinh_anh' => '',
                    'so_luong' => 10,
                    'gia_san_pham' => 19000000,
                    'gia_khuyen_mai' => 12000000,
                    'ngay_nhap' => '2024/14/01',
                    'mo_ta' => 'mo ta san pham Iphone',
                    'danh_muc_id' => '',
                    'trang_thai' => 'active',
                ],
                [
                    
                    'ten_san_phams' => 'Samsung S20 ultra',
                    'hinh_anh' => '',
                    'so_luong' => 10,
                    'gia_san_pham' => 13000000,
                    'gia_khuyen_mai' => 10000000,
                    'ngay_nhap' => '2024/14/01',
                    'mo_ta' => 'mo ta san pham Samsung',
                    'danh_muc_id' => '',
                    'trang_thai' => 'active',
                ],
            ]
        );
    }
}

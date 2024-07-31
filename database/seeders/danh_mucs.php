<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class danh_mucs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('danh_mucs')->insert(
            [
                [
                    'hinh_anh' => '',
                    'ten_danh_muc' => 'Iphone',
                    'mo_ta' => 'mo ta san pham Iphone',
                ],
                [
                    'hinh_anh' => '',
                    'ten_danh_muc' => 'Samsung',
                    'mo_ta' => 'mo ta san pham Samsung',
                ],
            ]
        );
    }
}

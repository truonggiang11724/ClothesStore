<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Hà Nội
        DB::table('districts')->insert([
            ['name' => 'Ba Đình', 'province_id' => 1],
            ['name' => 'Hoàn Kiếm', 'province_id' => 1],
            ['name' => 'Thanh Xuân', 'province_id' => 1],
        ]);
        // TP. Hồ Chí Minh
        DB::table('districts')->insert([
            ['name' => 'Quận 1', 'province_id' => 2],
            ['name' => 'Quận 3', 'province_id' => 2],
            ['name' => 'Gò Vấp', 'province_id' => 2],
        ]);
        // Đà Nẵng
        DB::table('districts')->insert([
            ['name' => 'Hải Châu', 'province_id' => 3],
            ['name' => 'Thanh Khê', 'province_id' => 3],
            ['name' => 'Cẩm Lệ', 'province_id' => 3],
        ]);
    }
}

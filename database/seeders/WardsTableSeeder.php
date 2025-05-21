<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Ba Đình
        DB::table('wards')->insert([
            ['name' => 'Phường Trúc Bạch', 'district_id' => 1],
            ['name' => 'Phường Kim Mã', 'district_id' => 1],
        ]);
        // Quận 1
        DB::table('wards')->insert([
            ['name' => 'Phường Bến Nghé', 'district_id' => 4],
            ['name' => 'Phường Nguyễn Thái Bình', 'district_id' => 4],
        ]);
        // Gò Vấp
        DB::table('wards')->insert([
            ['name' => 'Phường 1', 'district_id' => 6],
            ['name' => 'Phường 11', 'district_id' => 6],
        ]);
        // Hải Châu
        DB::table('wards')->insert([
            ['name' => 'Phường Hải Châu I', 'district_id' => 7],
            ['name' => 'Phường Hải Châu II', 'district_id' => 7],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('provinces')->insert([
            ['name' => 'Hà Nội'],
            ['name' => 'TP. Hồ Chí Minh'],
            ['name' => 'Đà Nẵng'],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Color::create([
            'name' => 'Trắng',
        ]);

        Color::create([
            'name' => 'Đen',
        ]);

        Color::create([
            'name' => 'Xám',
        ]);
    }
}

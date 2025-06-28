<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Size::create([
            'name' => 'S',
        ]);

        Size::create([
            'name' => 'M',
        ]);

        Size::create([
            'name' => 'L',
        ]);

        Size::create([
            'name' => 'XL',
        ]);

        Size::create([
            'name' => 'XXL',
        ]);

        Size::create([
            'name' => '36',
        ]);

        Size::create([
            'name' => '37',
        ]);

        Size::create([
            'name' => '38',
        ]);

        Size::create([
            'name' => '39',
        ]);

        Size::create([
            'name' => '40',
        ]);

        Size::create([
            'name' => '41',
        ]);

        Size::create([
            'name' => '42',
        ]);
    }
}

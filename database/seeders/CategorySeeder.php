<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create(['name' => 'Áo']);
        Category::create(['name' => 'Phụ kiện']);
        Category::create(['name' => 'Giày']);
        Category::create(['name' => 'Quần']);
    }
}

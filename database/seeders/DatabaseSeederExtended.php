<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeederExtended extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gọi các Seeder theo thứ tự mong muốn
        $this->call([
            CategorySeeder::class,
            ColorSeeder::class,
            SizeSeeder::class,
            ProductSeeder::class,
            ProvincesTableSeeder::class,
            DistrictsTableSeeder::class,
            WardsTableSeeder::class,
            ProductVariantSeeder::class,
            CouponSeeder::class,
        ]);
    }
}

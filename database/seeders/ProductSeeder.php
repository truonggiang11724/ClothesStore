<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::create([
            'name' => 'Giày Golf Nike Vapor Golf Wide ‘White’ AQ2301-100',
            'description' => 'Thông tin phát hành Nike Vapor Golf Wide ‘White’ Thương hiệu: Nike Thiết kế: Nike Vapor Mã sản phẩm: AQ2301-100 Xuất xứ : Mỹ Phân loại: Giày Golf',
            'price' => 350000,
            'size' => 40,
            'image' => 'shirt1.jpg',
        ]);
    
        Product::create([
            'name' => 'Giày Nike Air VaporMax 2023 Flyknit ‘Coconut Milk Olive’ DV1678-101',
            'description' => 'Giày Nike Air VaporMax 2023 Flyknit ‘Coconut Milk Olive’ DV1678-101 là một phiên bản mới của dòng Air',
            'price' => 420000,
            'size' => 40,
            'image' => 'dress1.jpg',
        ]);
    }
}

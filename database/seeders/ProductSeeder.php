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
            'image' => 'assets/images/products/product-1.jpg',
            'category_id' => '3',
        ]);

        Product::create([
            'name' => 'Giày Nike Air VaporMax 2023 Flyknit ‘Coconut Milk Olive’ DV1678-101',
            'description' => 'Giày Nike Air VaporMax 2023 Flyknit ‘Coconut Milk Olive’ DV1678-101 là một phiên bản mới của dòng Air',
            'price' => 420000,
            'size' => 40,
            'image' => 'assets/images/products/product-2.jpg',
            'category_id' => '3',
        ]);

        Product::create([
            'name' => 'Áo Kangol T-Shirt White',
            'description' => 'Chiếc áo thun Kangol phối tone đen – trắng mang phong cách tối giản nhưng không hề đơn điệu, nổi bật với logo kangaroo dập nổi 3D ngay trước ngực – một điểm nhấn hiện đại vừa tinh tế vừa mang đậm dấu ấn thương hiệu. Phom áo regular fit dễ mặc, ôm nhẹ theo dáng người mà không quá bó sát, phù hợp với nhiều vóc dáng và hoàn cảnh sử dụng.',
            'price' => 420000,
            'size' => 40,
            'image' => 'assets/images/products/product-2.jpg',
            'category_id' => '3',
        ]);

        Product::create([
            'name' => 'Giày Nike Air VaporMax 2023 Flyknit ‘Coconut Milk Olive’ DV1678-101',
            'description' => 'Giày Nike Air VaporMax 2023 Flyknit ‘Coconut Milk Olive’ DV1678-101 là một phiên bản mới của dòng Air',
            'price' => 420000,
            'size' => 40,
            'image' => 'assets/images/products/product-2.jpg',
            'category_id' => '3',
        ]);

        Product::create([
            'name' => 'Giày Nike Air VaporMax 2023 Flyknit ‘Coconut Milk Olive’ DV1678-101',
            'description' => 'Giày Nike Air VaporMax 2023 Flyknit ‘Coconut Milk Olive’ DV1678-101 là một phiên bản mới của dòng Air',
            'price' => 420000,
            'size' => 40,
            'image' => 'assets/images/products/product-2.jpg',
            'category_id' => '3',
        ]);

        Product::create([
            'name' => 'Giày Nike Air VaporMax 2023 Flyknit ‘Coconut Milk Olive’ DV1678-101',
            'description' => 'Giày Nike Air VaporMax 2023 Flyknit ‘Coconut Milk Olive’ DV1678-101 là một phiên bản mới của dòng Air',
            'price' => 420000,
            'size' => 40,
            'image' => 'assets/images/products/product-2.jpg',
            'category_id' => '3',
        ]);

        Product::create([
            'name' => 'Giày Nike Air VaporMax 2023 Flyknit ‘Coconut Milk Olive’ DV1678-101',
            'description' => 'Giày Nike Air VaporMax 2023 Flyknit ‘Coconut Milk Olive’ DV1678-101 là một phiên bản mới của dòng Air',
            'price' => 420000,
            'size' => 40,
            'image' => 'assets/images/products/product-2.jpg',
            'category_id' => '3',
        ]);
    }
}

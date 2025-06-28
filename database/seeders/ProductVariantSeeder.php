<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ProductVariant::create([
            'product_id' => '8',
            'color_id' => '1',
            'size_id' => '1',
            'stock_quantity' => '34',
            'image' => 'assets/images/products/1750763309_Kangol_Tshirt2.png',
        ]);

                ProductVariant::create([
            'product_id' => '8',
            'color_id' => '3',
            'size_id' => '2',
            'stock_quantity' => '64',
            'image' => 'assets/images/products/1750763309_Kangol_Tshirt3.png',
        ]);
    }
}

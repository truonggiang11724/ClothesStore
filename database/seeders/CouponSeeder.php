<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Coupon::create([
            'code' => 'XXX111',
            'type' => 'fixed',
            'value' => '200000',
            'usage_limit' => '20',
            'expires_at' => '2027-08-06',
        ]);
    }
}

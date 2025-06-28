<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{


    public function apply(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->first();

        if (!$coupon) {
            return back()->withErrors(['coupon_code' => 'Mã giảm giá không tồn tại.']);
        }

        if ($coupon->expires_at && now()->gt($coupon->expires_at)) {
            return back()->withErrors(['coupon_code' => 'Mã giảm giá đã hết hạn.']);
        }

        if ($coupon->usage_limit && $coupon->usage_limit==0) {
            return back()->withErrors(['coupon_code' => 'Mã giảm giá đã được sử dụng hết.']);
        }

        $total = $request->total; // Hoặc bạn tính trực tiếp từ giỏ hàng

        $discount = $coupon->type === 'percentage'
            ? $total * ($coupon->value / 100)
            : $coupon->value;

        // Lưu vào session
        session()->put('coupon', [
            'code' => $coupon->code,
            'discount' => $discount,
        ]);

        return back()->with('success', 'Áp dụng mã giảm giá thành công!');
    }
}

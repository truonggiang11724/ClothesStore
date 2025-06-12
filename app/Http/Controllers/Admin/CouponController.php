<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    //
    public function index()
    {
        $coupons = Coupon::latest()->paginate(10);
        return view('admin.coupons.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|unique:coupons',
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:1',
            'expires_at' => 'nullable|date|after:today',
        ]);

        Coupon::create($data);
        return redirect()->route('admin.coupon')->with('success', 'Tạo mã giảm giá thành công');
    }

    public function edit(Request $request)
    {
        $coupon = Coupon::findOrFail($request->query('id'));
        return view('admin.coupons.edit', compact('coupon'));
    }

    public function update(Request $request)
    {
        $coupon = Coupon::findOrFail($request->input('id'));

        $data = $request->validate([
            'code' => 'required|unique:coupons,code,' . $coupon->id,
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:1',
            'expires_at' => 'nullable|date|after:today',
        ]);

        $coupon->update($data);
        return redirect()->route('admin.coupon')->with('success', 'Cập nhật mã giảm giá thành công');
    }

    public function destroy(Request $request)
    {
        $coupon = Coupon::findOrFail($request->input('id'));
        $coupon->delete();
        return redirect()->route('admin.coupon')->with('success', 'Đã xóa mã giảm giá');
    }
}

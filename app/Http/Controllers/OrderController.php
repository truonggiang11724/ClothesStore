<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    //Điều hướng đến trang đặt hàng và lấy thông tin giỏ hànghàng
    public function index()
    {
        $provinces = Province::all();
        $cart = session()->get('cart', []);
        return view('pages.order', compact('cart', 'provinces'));
    }

    //Ajax lấy địa chỉ
    public function getDistricts($province_id)
    {
        $districts = District::where('province_id', $province_id)->get();
        return response()->json($districts);
    }

    public function getWards($district_id)
    {
        $wards = Ward::where('district_id', $district_id)->get();
        return response()->json($wards);
    }

    // Xác nhận đặt hàng
    public function submit(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'province' => 'required|string|max:20',
            'district' => 'required|string|max:20',
            'ward' => 'required|string|max:20',
            'payment_method' => 'required|string|max:20',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng trống');
        }
        // Tính tổng tiền cần thanh toán
        if (session('coupon')) $totalPrice = collect($cart)->reduce(fn($sum, $item) => $sum + $item['price'] * $item['quantity'], 0) - round(session('coupon')['discount']);
        else $totalPrice = collect($cart)->reduce(fn($sum, $item) => $sum + $item['price'] * $item['quantity'], 0);

        if ($request->payment_method == 'cod')
            $order_status = 'Đang giao hàng';
        else $order_status = 'Chưa thanh toán';
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'customer_name' => $request->first . $request->lastname,
            'phonenumber' => $request->phonenumber,
            'email' => $request->email,
            'address' => $request->address,
            'ward' => $request->ward,
            'total_price' => $totalPrice,
            'payment_method' => $request->payment_method,
            'order_status' => $order_status,
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity']
            ]);
        }
        // Xóa giỏ hàng
        session()->forget('cart');
        $coupon = Coupon::where('code', session('coupon')['code'])->first();
        $coupon->usage_limit = $coupon->usage_limit - 1;
        $coupon->update();
        session()->forget('coupon');
        if ($request->payment_method == 'cod') {
            return redirect()->route('cart')->with('success', 'Đặt hàng thành công!');
        } else {
            return view('pages.checkout', compact('order'));
        }
    }

    //Điều hướng trang danh sách đơn hàng
    public function list_order()
    {
        $orders = Order::with(['items.productVariant.product'])->where('customer_id', Auth::user()->id)->latest()->paginate(6);
        return view('pages.list_order', compact('orders')); 
    }
}

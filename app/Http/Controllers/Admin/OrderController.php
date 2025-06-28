<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //Điều hướng trang danh sách đơn hàng cho admin
    public function index()
    {
        $orders = Order::with('items.productVariant.product')->latest()->paginate(6);
        return view('admin.orders.index', compact('orders'));
    }

    public function markDelivered(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->order_status = 'Đã giao hàng';
        $order->save();

        return redirect()->route('admin.orders')->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }
}

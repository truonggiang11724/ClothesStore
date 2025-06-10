<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use App\Models\OrderItem;


class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        // Tổng đơn hàng trong tháng hiện tại
        $totalMonthlyOrders = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        // Doanh thu tháng này (chỉ đơn đã hoàn thành)
        $monthlyRevenue = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->where('order_status', 'Chưa thanh toán')
            ->sum('total_price');

        // Tổng sản phẩm bán ra tháng này
        $productsSold = OrderItem::whereHas('order', function ($query) use ($startOfMonth, $endOfMonth) {
            $query->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->where('order_status', 'Chưa thanh toán');
        })->sum('quantity');


        return view('admin.dashboard', compact('totalMonthlyOrders', 'monthlyRevenue', 'productsSold'));
    }
}

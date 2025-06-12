<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;



class DashboardController extends Controller
{
    public function index()
    {
        // Tổng đơn hàng trong tháng hiện tại
        $totalMonthlyOrders = DB::table('orders')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->count();

        // Doanh thu tháng này (chỉ đơn đã hoàn thành)
        $monthlyRevenue = DB::table('orders')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->sum('total_price');

        // Tổng sản phẩm bán ra tháng này
        $productsSold = DB::table('order_items')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->whereMonth('orders.created_at', date('m'))
            ->whereYear('orders.created_at', date('Y'))
            ->sum('order_items.quantity');


        return view('admin.dashboard', compact('totalMonthlyOrders', 'monthlyRevenue', 'productsSold'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



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

    public function getMonthlyRevenueData()
    {
        $monthlyRevenue = DB::table('orders')
            ->selectRaw('MONTH(created_at) as month, SUM(total_price) as revenue')
            ->whereYear('created_at', date('Y'))
            ->groupByRaw('MONTH(created_at)')
            ->pluck('revenue', 'month');

        // Format thành mảng có 12 phần tử, nếu tháng nào không có thì giá trị = 0
        $revenues = [];
        for ($i = 1; $i <= 12; $i++) {
            $revenues[] = $monthlyRevenue[$i] ?? 0;
        }

        return response()->json($revenues);
    }

    // Hàm tạo biểu đồ thể hiện số lượng bán ra theo từng loại hàng
    public function getProductCategoryMonthlyData()
    {
        $categories = DB::table('categories')->pluck('name', 'id'); // Lấy tất cả tên category

        $data = [];

        foreach ($categories as $categoryId => $categoryName) {
            $monthlyData = DB::table('order_items')
                ->join('products', 'order_items.product_id', '=', 'products.id')
                ->where('products.category_id', $categoryId)
                ->selectRaw('MONTH(order_items.created_at) as month, SUM(order_items.quantity) as total')
                ->whereYear('order_items.created_at', now()->year)
                ->groupByRaw('MONTH(order_items.created_at)')
                ->pluck('total', 'month');

            $formatted = [];
            for ($i = 1; $i <= 12; $i++) {
                $formatted[] = $monthlyData[$i] ?? 0;
            }

            $data[$categoryName] = $formatted;
        }

        return response()->json($data);
    }

    public function getCategoryStructure()
    {
        $data = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('categories.name as category_name', DB::raw('SUM(order_items.quantity) as total_quantity'))
            ->groupBy('categories.name')
            ->get();

        // Tách dữ liệu thành 2 mảng: labels & totals
        $labels = [];
        $totals = [];
        $sumAll = $data->sum('total_quantity');

        foreach ($data as $item) {
            $labels[] = $item->category_name;
            // Hiển thị phần trăm cơ cấu:
            $totals[] = $sumAll > 0 ? round(($item->total_quantity / $sumAll) * 100, 1) : 0;
            // Hiển thị số lượng tuyệt đối:
            // $totals[] = (int)$item->total_quantity;
        }

        return response()->json([
            'categories' => $labels,
            'totals' => $totals
        ]);
    }
}

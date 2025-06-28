<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;

class CartController extends Controller
{
    //
    public function add(Request $request)
    {
        $product_id = $request->input('product_id');
        $color_id = $request->input('color_id');
        $size_id = $request->input('size_id');

        $product_variant = ProductVariant::with(['color', 'size'])->where('product_id', $product_id)->where('color_id', $color_id)->where('size_id', $size_id)->first();
        $product = Product::findOrFail($product_id);

        $id = $product_variant->id;
        $quantity = $request->input('quantity', 1);
        if ($product_variant) {
            $color_name = $product_variant->color ? $product_variant->color->name : null;
            $size_name = $product_variant->size ? $product_variant->size->name : null;
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product_variant->variant_price,
                'color' => $product_variant->color->name,
                'size' => $product_variant->size->name,
                'quantity' => $quantity,
                'image' => $product_variant->image,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Đã thêm vào giỏ hàng!',
            'totalQuantity' => collect($cart)->sum('quantity')
        ]);
    }


    public function index()
    {
        $cart = session()->get('cart', []);
        return view('pages.cart', compact('cart'));
    }

    public function updateQuantity(Request $request)
    {
        $id = $request->input('id');
        $action = $request->input('action'); // "increase" hoặc "decrease"

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($action === 'increase') {
                $cart[$id]['quantity']++;
            } elseif ($action === 'decrease') {
                if ($cart[$id]['quantity'] > 1) {
                    $cart[$id]['quantity']--;
                } else {
                    // Không làm gì nếu đang là 1
                    return response()->json([
                        'success' => false,
                        'message' => 'Không thể giảm dưới 1'
                    ]);
                }
            }

            session()->put('cart', $cart);

            $itemTotal = $cart[$id]['quantity'] * $cart[$id]['price'];
            $totalQuantity = collect($cart)->sum('quantity');
            $totalPrice = collect($cart)->reduce(fn($c, $item) => $c + $item['quantity'] * $item['price'], 0);

            return response()->json([
                'success' => true,
                'quantity' => $cart[$id]['quantity'],
                'itemTotal' => number_format($itemTotal),
                'totalPrice' => number_format($totalPrice),
                'totalQuantity' => $totalQuantity
            ]);
        }

        return response()->json(['success' => false], 400);
    }


    public function remove(Request $request)
    {
        $id = $request->input('id');
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);

            $totalQuantity = collect($cart)->sum('quantity');
            $totalPrice = collect($cart)->reduce(fn($c, $item) => $c + $item['quantity'] * $item['price'], 0);

            return response()->json([
                'success' => true,
                'totalPrice' => number_format($totalPrice),
                'totalQuantity' => $totalQuantity
            ]);
        }

        return response()->json(['success' => false], 400);
    }
}

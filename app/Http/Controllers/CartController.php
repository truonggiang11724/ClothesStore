<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    //
    public function add(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $quantity = $request->input('quantity', 1);
        $image = $request->input('image');

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
                'image' => $image,
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

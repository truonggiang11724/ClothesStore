<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($search = $request->keyword) {
            $query->where('name', 'like', "%$search%");
        }

        if ($search = $request->category) {
            $query->where('category_id', "=", $request->category);
        }

        $products = $query->latest()->paginate(6);

        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        return view('admin.products.create', compact('categories', 'sizes', 'colors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'variants' => 'required|array|min:1',
            'variants.*.size_id' => 'required|exists:sizes,id',
            'variants.*.color_id' => 'required|exists:colors,id',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.stock' => 'required|integer|min:0',
            'variants.*.image' => 'nullable|image',
        ]);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'category_id' => 'required|exists:categories,id',
        ]);
        if ($request->hasFile('image')) {
            $destinationPath = public_path('assets/images/products/');
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($destinationPath, $fileName);
            $data['image'] = 'assets/images/products/' . $fileName;
        }

        try {
            DB::beginTransaction();
            // 1. Lưu sản phẩm
            $product = Product::create($data);

            // 2. Lưu các biến thể
            foreach ($request->variants as $index => $variant) {
                $exists = ProductVariant::where('product_id', $product->id)
                    ->where('size_id', $variant['size_id'])
                    ->where('color_id', $variant['color_id'])
                    ->exists();

                if ($exists) {
                    // Gây lỗi để rollback
                    throw new \Exception("Biến thể bị trùng (size + color)");
                }
                if ($request->hasFile('variants.' . $index . '.image')) {
                    $destinationPath = public_path('assets/images/products/');
                    $fileName = time() . '_' . $request->file('variants.' . $index . '.image')->getClientOriginalName();
                    $request->file('variants.' . $index . '.image')->move($destinationPath, $fileName);
                    $imagepath = 'assets/images/products/' . $fileName;
                }

                ProductVariant::create([
                    'product_id' => $product->id,
                    'size_id' => $variant['size_id'],
                    'color_id' => $variant['color_id'],
                    'variant_price' => $variant['price'],
                    'stock_quantity' => $variant['stock'],
                    'image' => $request->hasFile('variants.' . $index . '.image') ? $imagepath : null,
                ]);
            }

            DB::commit();
            return redirect()->route('admin.product')->with('success', 'Thêm sản phẩm thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }

    public function edit(Request $request)
    {
        $id = $request->query('id'); // Lấy id từ query string
        $product = Product::with('variants')->findOrFail($id);

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'sizes' => Size::all(),
            'colors' => Color::all(),
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',

            'variants' => 'required|array|min:1',
            'variants.*.size_id' => 'required|exists:sizes,id',
            'variants.*.color_id' => 'required|exists:colors,id',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.stock' => 'required|integer|min:0',
            'variants.*.image' => 'nullable|image|max:2048',
        ]);

        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Nếu người dùng upload ảnh mới, thì xử lý
        if ($request->hasFile('image')) {
            $destinationPath = public_path('assets/images/products/');
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($destinationPath, $fileName);
            $data['image'] = 'assets/images/products/' . $fileName;
            if ($product->image) {
                $filePath = public_path('assets/images/products/' . basename($product->image));
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        } else {
            // Nếu không có ảnh mới, giữ nguyên ảnh cũ
            unset($data['image']);
        }

        // Cập nhật dữ liệu
        $product->update($data);
        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            $variantIds = [];

            foreach ($request->variants as $index => $variantInput) {
                $variant = null;

                // Nếu có ID thì cập nhật biến thể cũ
                if (isset($variantInput['id'])) {
                    $variant = ProductVariant::where('id', $variantInput['id'])
                        ->where('product_id', $product->id)
                        ->first();

                    if ($variant) {
                        // Cập nhật ảnh nếu có
                        if ($request->hasFile('variants.' . $index . '.image')) {

                            if ($variant->image) {
                                $filePath = public_path('assets/images/products/' . basename($variant->image));
                                if (file_exists($filePath)) {
                                    unlink($filePath);
                                }
                            }
                            $destinationPath = public_path('assets/images/products/');
                            $fileName = time() . '_' . $request->file('variants.' . $index . '.image')->getClientOriginalName();
                            $request->file('variants.' . $index . '.image')->move($destinationPath, $fileName);
                            $imagepath = 'assets/images/products/' . $fileName;
                            $variant->image = $imagepath;
                        }
                        $variant->size_id = $variantInput['size_id'];
                        $variant->color_id = $variantInput['color_id'];
                        $variant->variant_price = $variantInput['price'];
                        $variant->stock_quantity = $variantInput['stock'];
                        $variant->save();

                        $variantIds[] = $variant->id;
                        continue;
                    }
                }

                // Nếu không có ID hoặc ID không khớp → thêm mới
                if ($request->hasFile('variants.' . $index . '.image')) {
                    $destinationPath = public_path('assets/images/products/');
                    $fileName = time() . '_' . $request->file('variants.' . $index . '.image')->getClientOriginalName();
                    $request->file('variants.' . $index . '.image')->move($destinationPath, $fileName);
                    $imagepath = 'assets/images/products/' . $fileName;
                }

                $newVariant = ProductVariant::create([
                    'product_id' => $product->id,
                    'size_id' => $variantInput['size_id'],
                    'color_id' => $variantInput['color_id'],
                    'variant_price' => $variantInput['price'],
                    'stock_quantity' => $variantInput['stock'],
                    'image' => $request->hasFile('variants.' . $index . '.image') ? $imagepath : null,
                ]);

                $variantIds[] = $newVariant->id;
            }

            // Xoá những biến thể cũ không còn trong form
            ProductVariant::where('product_id', $product->id)
                ->whereNotIn('id', $variantIds)
                ->get()
                ->each(function ($variant) {
                    if ($variant->image) {
                        $filePath = public_path('assets/images/products/' . basename($variant->image));
                        if (file_exists($filePath)) {
                            unlink($filePath);
                        }
                    }
                    $variant->delete();
                });

            DB::commit();
            return redirect()->route('admin.product')->with('success', 'Cập nhật sản phẩm thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Lỗi khi cập nhật sản phẩm: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $product = Product::findOrFail($id);

        $product->delete();
        return redirect()->route('admin.product')->with('success', 'Xóa sản phẩm thành công!');
    }


    public function detail($id, Request $request)
    {
        // Thông tin sản phẩm
        $product = Product::findOrFail($id);
        $variants = ProductVariant::where('product_id', $id)->get();
        $sizes = Size::all();
        $colors = Color::all();
        $images = DB::select('SELECT image FROM (SELECT *, ROW_NUMBER() OVER (PARTITION BY color_id ORDER BY created_at) as rn 
        FROM product_variants WHERE product_id=' . $id . ') sub WHERE rn = 1;');

        // Đánh giá sản phẩm
        $feedbacks = Feedback::with('user')->where('product_id', $id)->get();
        $comments = Feedback::with('user')->where('product_id', $id)->latest()->paginate(6);

        if ($request->ajax()) {
            $display = $comments->perPage() * $comments->currentPage();
            return view('partials.feedback', compact('comments','display'))->render();
        }

        return view('pages.detailproduct', compact('product', 'variants', 'colors', 'sizes', 'images', 'feedbacks', 'comments'));
    }

    public function getSizesByColor(Request $request)
    {
        $product_id = $request->product_id;
        $color_id = $request->color_id;

        $sizeIds = ProductVariant::where('product_id', $product_id)
            ->where('color_id', $color_id)
            ->pluck('size_id')
            ->unique()
            ->values();

        $sizes = Size::whereIn('id', $sizeIds)->get();


        return response()->json($sizes);
    }

    public function feedback(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
        ]);
        $order_id = $request->order_id;
        $orders = Order::with(['items.productVariant.product'])->where('id', $order_id)->get();
        return view('pages.feedback', compact('orders'));
    }

    public function submitFeedback(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'order_id' => 'required',
        ]);
        $user_id = $request->user_id;
        $order_id = $request->order_id;

        $items = OrderItem::where('order_id', $order_id)->get();
        foreach ($items as $item) {
            $variant_id = $item->product_id;
            $request->validate([
                'rating-' . $variant_id => 'required|integer|min:1|max:5',
                'comment-' . $variant_id => 'nullable|string',
            ]);

            $variant = ProductVariant::findOrFail($variant_id);
            $product_id = $variant->product_id;

            Feedback::create([
                'order_id' => $order_id,
                'product_id' => $product_id,
                'user_id' => $user_id,
                'rating' => $request->input('rating-' . $variant_id),
                'comment' => $request->input('comment-' . $variant_id),
            ]);
        }
        $order = Order::findOrFail($order_id);
        $order->order_status = 'Đã đánh giá';
        $order->update();

        return redirect()->route('list_order')->with('success', 'Cảm ơn bạn đã đánh giá sản phẩm!');
    }
}

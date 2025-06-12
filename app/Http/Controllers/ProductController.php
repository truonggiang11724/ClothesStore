<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($search = $request->keyword) {
            $query->where('name', 'like', "%$search%");
        }

        $products = $query->latest()->paginate(10);

        return view('admin.products.index', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'size' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $destinationPath = public_path('public/assets/images/products/');
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($destinationPath, $fileName);
            $data['image'] = 'assets/images/products/' . $fileName;
            
        }

        Product::create($data);
        return redirect()->route('admin.product')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function edit(Request $request)
    {
        $id = $request->query('id'); // Lấy id từ query string
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $product = Product::findOrFail($id);

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
        } else {
            // Nếu không có ảnh mới, giữ nguyên ảnh cũ
            unset($data['image']);
        }

        // Cập nhật dữ liệu
        $product->update($data);

        return redirect()->route('admin.product')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $product = Product::findOrFail($id);

        $product->delete();
        return redirect()->route('admin.product')->with('success', 'Xóa sản phẩm thành công!');
    }


    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.detailproduct', compact('product'));
    }
}

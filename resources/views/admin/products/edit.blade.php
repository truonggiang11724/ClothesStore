@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header text-white" style="background: rgb(231, 137, 231)">
                <h4>Sửa sản phẩm</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <div class="mb-3">
                        <label class="form-label">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control"
                            value="{{ old('name', $product->name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Giá</label>
                        <input type="number" name="price" class="form-control"
                            value="{{ old('price', $product->price ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Danh mục</label>
                        <select name="category_id" class="form-select" required>
                            <option value="">-- Chọn danh mục --</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Ảnh sản phẩm</label>
                        <input type="file" name="image">
                        @if (!empty($product->image))
                            <img src="{{ asset($product->image) }}" width="100">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
                </form>
            </div>
        </div>
    </div>
@endsection

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
                                <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
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

                    {{-- Biến thể sản phẩm --}}
                    <h5>Biến thể sản phẩm</h5>
                    <div id="variant-container">
                        @foreach ($product->variants as $index => $variant)
                            <div class="row variant-row mb-3">
                                <input type="hidden" name="variants[{{ $index }}][id]" value="{{ $variant->id }}">

                                <div class="col-md-2">
                                    <label>Size</label>
                                    <select name="variants[{{ $index }}][size_id]" class="form-select">
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}"
                                                {{ $variant->size_id == $size->id ? 'selected' : '' }}>
                                                {{ $size->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label>Màu</label>
                                    <select name="variants[{{ $index }}][color_id]" class="form-select">
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}"
                                                {{ $variant->color_id == $color->id ? 'selected' : '' }}>
                                                {{ $color->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label>Giá</label>
                                    <input type="number" name="variants[{{ $index }}][price]" class="form-control"
                                        value="{{ $variant->variant_price }}">
                                </div>

                                <div class="col-md-2">
                                    <label>Tồn kho</label>
                                    <input type="number" name="variants[{{ $index }}][stock]" class="form-control"
                                        value="{{ $variant->stock_quantity }}">
                                </div>

                                <div class="col-md-3">
                                    <label>Ảnh</label><br>
                                    @if ($variant->image)
                                        <img src="{{ asset($variant->image) }}" width="80" class="mb-2">
                                    @endif
                                    <input type="file" name="variants[{{ $index }}][image]" class="form-control">
                                </div>

                                <div class="col-md-1 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger btn-remove-variant">X</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-variant" class="btn btn-outline-secondary">+ Thêm biến thể</button>
                    <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        let variantIndex = {{ count($product->variants) }};

        document.getElementById('add-variant').addEventListener('click', function() {
            const container = document.getElementById('variant-container');
            const template = document.querySelector('.variant-row');
            const row = template.cloneNode(true);

            // Reset value và cập nhật index
            row.querySelectorAll('input, select').forEach(input => {
                const newName = input.name.replace(/\[\d+\]/, `[${variantIndex}]`);
                input.name = newName;
                if (input.type === 'file') return;
                input.value = '';
            });

            row.querySelector('input[type="hidden"]')?.remove(); // Xóa id cũ nếu có
            container.appendChild(row);
            variantIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('btn-remove-variant')) {
                const rows = document.querySelectorAll('.variant-row');
                if (rows.length > 1) {
                    e.target.closest('.variant-row').remove();
                }
            }
        });
    </script>
@endsection

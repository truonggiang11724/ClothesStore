@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header text-white" style="background: rgb(231, 137, 231)">
                <h4>Thêm sản phẩm</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Giá chung</label>
                        <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                    </div>
                    <input type="hidden" value="S" name="size">

                    <div class="mb-3">
                        <label class="form-label">Danh mục</label>
                        <select name="category_id" class="form-select">
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
                    </div>

                    {{-- Biến thể sản phẩm --}}
                    <h5>Biến thể sản phẩm (Size, Màu, Giá, Tồn kho, Ảnh)</h5>
                    <div id="variant-container">
                        <div class="row variant-row mb-3">
                            <div class="col-md-2">
                                <label>Size</label>
                                <select name="variants[0][size_id]" class="form-select" required>
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label>Màu</label>
                                <select name="variants[0][color_id]" class="form-select" required>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label>Giá</label>
                                <input type="number" name="variants[0][price]" class="form-control" required>
                            </div>

                            <div class="col-md-2">
                                <label>Tồn kho</label>
                                <input type="number" name="variants[0][stock]" class="form-control" required>
                            </div>

                            <div class="col-md-3">
                                <label>Ảnh</label>
                                <input type="file" name="variants[0][image]" class="form-control">
                            </div>

                            <div class="col-md-1 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-remove-variant">X</button>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="add-variant" class="btn btn-outline-secondary">+ Thêm biến thể</button>

                    <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        let variantIndex = 1;

        document.getElementById('add-variant').addEventListener('click', function() {
            const container = document.getElementById('variant-container');
            const row = document.querySelector('.variant-row').cloneNode(true);

            // Clear old values
            row.querySelectorAll('input, select').forEach(input => {
                if (input.type !== 'file') input.value = '';
                const name = input.name.replace(/\[\d+\]/, `[${variantIndex}]`);
                input.name = name;
            });

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

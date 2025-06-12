@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header text-white d-flex justify-content-between align-items-center"
                style="background: rgb(231, 137, 231)">
                <h4 class="mb-0">Danh sách sản phẩm</h4>
                <a href="{{ route('admin.product.create') }}" class="btn btn-light btn-sm">+ Thêm sản phẩm</a>
            </div>

            <div class="card-body">
                @if ($products->count())
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Ảnh</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Danh mục</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr>
                                        <td>{{ $index + $products->firstItem() }}</td>
                                        <td>
                                            @if ($product->image)
                                                <img src="{{ asset($product->image) }}" width="100" height="100"
                                                    class="rounded">
                                            @else
                                                <span class="text-muted">Không có ảnh</span>
                                            @endif
                                        </td>
                                        <td class="text-start">{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }} đ</td>
                                        <td>{{ $product->category->name ?? 'Không có' }}</td>
                                        <td>
                                            <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}"
                                                class="btn btn-sm btn-warning">Sửa</a>
                                            <form action="{{ route('admin.product.destroy') }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <button onclick="return confirm('Xác nhận xóa sản phẩm?')"
                                                    class="btn btn-sm btn-danger">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $products->links('pagination::bootstrap-5') }}
                    </div>
                @else
                    <div class="alert alert-info">Chưa có sản phẩm nào.</div>
                @endif
            </div>
        </div>
    </div>
@endsection

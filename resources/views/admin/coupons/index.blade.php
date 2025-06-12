@extends('layouts.admin')
@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Danh sách mã giảm giá</h4>
            <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary">Thêm mã mới</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Mã</th>
                    <th>Loại</th>
                    <th>Giá trị</th>
                    <th>Số lượng</th>
                    <th>Hạn dùng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $key => $coupon)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $coupon->code }}</td>
                        <td>{{ $coupon->type == 'fixed' ? 'Cố định' : '%' }}</td>
                        <td>{{ $coupon->type == 'percent' ? $coupon->value . '%' : number_format($coupon->value) . 'đ' }}
                        </td>
                        <td>{{ $coupon->usage_limit }}</td>
                        <td>{{ $coupon->expires_at ? date('d/m/Y', strtotime($coupon->expires_at)) : '-' }}</td>
                        <td>
                            <a href="{{ route('admin.coupon.edit', ['id' => $coupon->id]) }}"
                                class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('admin.coupon.delete') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ $coupon->id }}">
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Xác nhận xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $coupons->links() }}
    </div>
@endsection

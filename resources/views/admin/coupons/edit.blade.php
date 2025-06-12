@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h4>Chỉnh sửa mã giảm giá</h4>

    <form action="{{ route('admin.coupon.update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $coupon->id }}">

        <div class="mb-3">
            <label class="form-label">Mã giảm giá</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code', $coupon->code) }}" required>
            @error('code') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Loại giảm giá</label>
            <select class="form-select @error('type') is-invalid @enderror" name="type" required>
                <option value="fixed" {{ old('type', $coupon->type) == 'fixed' ? 'selected' : '' }}>Cố định (VND)</option>
                <option value="percent" {{ old('type', $coupon->type) == 'percent' ? 'selected' : '' }}>% phần trăm</option>
            </select>
            @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Giá trị giảm</label>
            <input type="number" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ old('value', $coupon->value) }}" required>
            @error('value') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Số lần sử dụng tối đa</label>
            <input type="number" class="form-control @error('usage_limit') is-invalid @enderror" name="usage_limit" value="{{ old('usage_limit', $coupon->usage_limit) }}">
            @error('usage_limit') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ngày hết hạn</label>
            <input type="date" class="form-control @error('expires_at') is-invalid @enderror" name="expires_at" value="{{ old('expires_at', optional($coupon->expires_at)->format('Y-m-d')) }}">
            @error('expires_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.coupon') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection

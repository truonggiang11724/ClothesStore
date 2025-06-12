@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h4>Thêm mã giảm giá</h4>

    <form action="{{ route('admin.coupon.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="code" class="form-label">Mã giảm giá</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required>
            @error('code') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Loại giảm giá</label>
            <select class="form-select @error('type') is-invalid @enderror" name="type" required>
                <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Cố định (VND)</option>
                <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>% phần trăm</option>
            </select>
            @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="value" class="form-label">Giá trị giảm</label>
            <input type="number" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ old('value') }}" required>
            @error('value') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="usage_limit" class="form-label">Số lần sử dụng tối đa (bỏ trống nếu không giới hạn)</label>
            <input type="number" class="form-control @error('usage_limit') is-invalid @enderror" name="usage_limit" value="{{ old('usage_limit') }}">
            @error('usage_limit') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="expires_at" class="form-label">Ngày hết hạn (nếu có)</label>
            <input type="date" class="form-control @error('expires_at') is-invalid @enderror" name="expires_at" value="{{ old('expires_at') }}">
            @error('expires_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Lưu mã</button>
        <a href="{{ route('admin.coupon') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection

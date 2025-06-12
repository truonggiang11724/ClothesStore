@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h4>Sửa loại hàng</h4>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên loại hàng</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control @error('name') is-invalid @enderror" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection

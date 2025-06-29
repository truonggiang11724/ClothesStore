@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Đánh giá đơn hàng</h2>

        @foreach ($orders as $order)
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Đơn hàng #{{ $order->id }}</strong> - {{ $order->created_at->format('d/m/Y H:i') }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>👤 Khách hàng:</strong> {{ $order->customer_name }}</p>
                            <p><strong>📞 SĐT:</strong> {{ $order->phonenumber }}</p>
                            <p><strong>📧 Email:</strong> {{ $order->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>📍 Địa chỉ:</strong> {{ $order->address }} - {{ $order->ward }}</p>
                            <p><strong>💵 Tổng tiền:</strong> <span
                                    class="text-danger fw-bold">{{ number_format($order->total_price, 0, ',', '.') }}đ</span>
                            </p>
                            <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
                        </div>
                    </div>

                    <h5 class="mt-4">🧾 Sản phẩm:</h5>
                    <form action="{{ route('product.feedback.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                        @foreach ($order->items as $item)
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 mt-2">
                                <div class="col">
                                    <div class="card h-100 shadow-sm border">
                                        @php $productVariant = $item->productVariant; @endphp

                                        @if ($productVariant)
                                            <img src="{{ $item->productVariant->image }}" class="card-img-top"
                                                alt="{{ $item->productVariant->name }}"
                                                style="height: 300px; object-fit: cover;">
                                            <div class="card-body">
                                                <h6 class="card-title mb-1">{{ $item->productVariant->name }}</h6>
                                                <p class="mb-1"><strong>Màu:</strong>
                                                    {{ $item->ProductVariant->color->name }} / <strong>Size:</strong>
                                                    {{ $item->ProductVariant->size->name }}</p>
                                                <p class="mb-1"><strong>Số lượng:</strong> {{ $item->quantity }}</p>
                                                <p class="mb-0"><strong>Giá:</strong> <span
                                                        class="text-primary">{{ number_format($item->productVariant->variant_price, 0, ',', '.') }}đ</span>
                                                </p>
                                            </div>
                                        @else
                                            <img src="https://via.placeholder.com/300x180?text=No+Image"
                                                class="card-img-top" alt="Không có ảnh">
                                            <h6 class="card-title mb-1 text-danger">Sản phẩm đã bị xoá</h6>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-grid">
                                        <h5>Đánh giá mức độ hài lòng</h5>
                                        <label for="rating"><input type="radio"
                                                name="rating-{{ $item->ProductVariant->id }}" value="1" required>
                                            Tệ</label>
                                        <label for="rating"><input type="radio"
                                                name="rating-{{ $item->ProductVariant->id }}" value="2" required> Không
                                            hài
                                            lòng</label>
                                        <label for="rating"><input type="radio"
                                                name="rating-{{ $item->ProductVariant->id }}" value="3" required> Tạm
                                            ổn</label>
                                        <label for="rating"><input type="radio"
                                                name="rating-{{ $item->ProductVariant->id }}" value="4" required> Hài
                                            lòng</label>
                                        <label for="rating"><input type="radio"
                                                name="rating-{{ $item->ProductVariant->id }}" value="5" required> Yêu
                                            thích</label>
                                        <p class="mt-3">Viết phản hồi</p>
                                        <textarea name="comment-{{ $item->ProductVariant->id }}" id="" cols="30" rows="6"></textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <button type="submit" class="badge bg-primary p-2 mt-5" style="width: 120px">Đánh
                            giá</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection

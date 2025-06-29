@extends('layouts.admin')
@section('content')
    <div class="container">
        <h2 class="mb-4">🛒 Danh sách đơn hàng</h2>

        @foreach ($orders as $order)
            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Đơn hàng #{{ $order->id }}</strong> - {{ $order->created_at->format('d/m/Y H:i') }}
                    </div>
                    <span
                        class="badge bg-{{ $order->order_status == 'Đã giao hàng' ? 'success' : ($order->order_status == 'Chưa thanh toán' ? 'danger' : 'secondary') }}">
                        {{ $order->order_status }}
                    </span>
                        @if($order->order_status == 'Đang giao hàng')
                            <form action="{{ route('admin.orders.deliver') }}" method="POST" onsubmit="return confirm('Xác nhận đơn hàng đã giao?');">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <button type="submit" class="btn btn-sm btn-success">Xác nhận giao hàng</button>
                            </form>
                        @endif
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>👤 Khách hàng:</strong> {{ $order->customer_name }}</p>
                            <p><strong>📞 SĐT:</strong> {{ $order->phonenumber }}</p>
                            <p><strong>📧 Email:</strong> {{ $order->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>📍 Địa chỉ:</strong> {{ $order->address }}</p>
                            <p><strong>💵 Tổng tiền:</strong> <span
                                    class="text-danger fw-bold">{{ number_format($order->total_price, 0, ',', '.') }}đ</span>
                            </p>
                            <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
                        </div>
                    </div>

                    <h5 class="mt-4">🧾 Sản phẩm:</h5>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 mt-2">
                        @foreach ($order->items as $item)
                            <div class="col">
                                <div class="card h-100 shadow-sm border">
                                    @php $productVariant = $item->productVariant; @endphp

                                    @if ($productVariant)
                                        <img src="{{ asset($item->productVariant->image) }}" class="card-img-top"
                                            alt="{{ $item->productVariant->name }}" style="height: 300px; object-fit: cover;">
                                        <div class="card-body">
                                            <h6 class="card-title mb-1">{{ $item->productVariant->name }}</h6>
                                            <p class="mb-1"><strong>Màu:</strong> {{ $item->ProductVariant->color->name }} / <strong>Size:</strong> {{ $item->ProductVariant->size->name }}</p>
                                            <p class="mb-1"><strong>Số lượng:</strong> {{ $item->quantity }}</p>
                                            <p class="mb-0"><strong>Giá:</strong> <span
                                                    class="text-primary">{{ number_format($item->productVariant->variant_price, 0, ',', '.') }}đ</span>
                                            </p>
                                        </div>
                                    @else
                                        <img src="https://via.placeholder.com/300x180?text=No+Image" class="card-img-top"
                                            alt="Không có ảnh">
                                        <h6 class="card-title mb-1 text-danger">Sản phẩm đã bị xoá</h6>
                                    @endif

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Phân trang --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $orders->links() }}
        </div>
    </div>
@endsection

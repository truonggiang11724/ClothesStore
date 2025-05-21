<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Thanh Toán Đơn Hàng</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Thông Tin Thanh Toán</h2>
    <div class="card p-4">
        <p><strong>Mã đơn hàng:</strong> {{ $order->id }}</p>
        <p><strong>Tổng số tiền cần thanh toán:</strong> {{ number_format($order->total_price, 0, ',', '.') }} VNĐ</p>
        <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
        <!-- Nút bấm chuyển sang trang thanh toán -->
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <!-- Gửi các thông tin cần thiết -->
            <input type="hidden" name="order_id" value="{{ $order->id }}" />
            <input type="hidden" name="total_price" value="{{ $order->total_price }}" />
            <input type="hidden" name="payment_method" value="{{ $order->payment_method }}" />

            <button type="submit" class="btn btn-primary">
                Tiến Hành Thanh Toán
            </button>
        </form>
    </div>
</div>

<!-- Bootstrap 5 JS và Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
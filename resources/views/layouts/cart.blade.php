<!doctype html>
<html lang="en">

<!-- Head -->

<head>
    <!-- Page Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Custom Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600&family=Roboto:wght@300;400;700&display=auto"
        rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
    <link rel="mask-icon" href="{{ asset('assets/images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/libs.bundle.css') }}" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.bundle.css') }}" />

    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
            /**
          * Reinstate scrolling for non-JS clients
          */
            .simplebar-content-wrapper {
                overflow: auto;
            }
        </style>
    </noscript>

    <!-- Page Title -->
    <title>OldSkool | Bootstrap 5 HTML Template</title>

</head>

<body class="">

    <!-- Main Section-->
    <section class="mt-0 overflow-lg-hidden  vh-lg-100">
        <!-- Page Content Goes Here -->
        <div class="container">
            <div class="row g-0 vh-lg-100">
                <div class="col-12 col-lg-7 pt-5 pt-lg-10">
                    <div class="pe-lg-5">
                        <!-- Logo-->
                        <a class="navbar-brand fw-bold fs-3 flex-shrink-0 mx-0 px-0" href="{{ route('home') }}">
                            <div class="d-flex align-items-center">
                                <svg class="f-w-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 77.53 72.26">
                                    <path
                                        d="M10.43,54.2h0L0,36.13,10.43,18.06,20.86,0H41.72L10.43,54.2Zm67.1-7.83L73,54.2,68.49,62,45,48.47,31.29,72.26H20.86l-5.22-9L52.15,0H62.58l5.21,9L54.06,32.82,77.53,46.37Z"
                                        fill="currentColor" fill-rule="evenodd" />
                                </svg>
                            </div>
                        </a>
                        <!-- / Logo-->
                        <nav class="d-none d-md-block">
                            <ul
                                class="list-unstyled d-flex justify-content-start mt-4 align-items-center fw-bolder small">
                                <li class="me-4"><a class="nav-link-checkout active" href="{{ route('cart') }}">Your
                                        Cart</a></li>
                                <li class="me-4"><a class="nav-link-checkout "
                                        href="{{ route('checkout') }}">Information</a></li>
                                {{-- <li class="me-4"><a class="nav-link-checkout "
                                        href="{{ route('checkout_shipping') }}">Shipping</a></li>
                                <li><a class="nav-link-checkout nav-link-last "
                                        href="{{ route('checkout_payment') }}">Payment</a></li> --}}
                            </ul>
                        </nav>
                        <div class="mt-5">
                            <h3 class="fs-5 fw-bolder mb-0 border-bottom pb-4">Your Cart</h3>
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <tbody class="border-0">

                                        @if (session('cart'))
                                            @foreach ($cart as $id => $item)
                                                <!-- Cart Item-->
                                                <div data-id="{{ $id }}"
                                                    class="cart-item row mx-0 py-4 g-0 border-bottom">
                                                    <div class="col-2 position-relative">
                                                        <picture class="d-block border">
                                                            <img class="img-fluid" src="{{ asset($item['image']) }}"
                                                                alt="HTML Bootstrap Template by Pixel Rocket">
                                                        </picture>
                                                    </div>
                                                    <div class="quantity-controls col-9 offset-1">

                                                        <h6
                                                            class="justify-content-between d-flex align-items-start mb-2">
                                                            {{ $item['name'] }}
                                                            <button class="remove-btn btn-outline"
                                                                style="background:0%;border:0;"><i
                                                                    class="ri-close-line ms-3"></i></button>
                                                        </h6>
                                                        <span class="d-block text-muted fw-bolder fs-9">Price:
                                                            {{ number_format($item['price']) }}đ</span>

                                                        <div class="position:absolute; right:0; bottom:0">
                                                            <div class="">
                                                                <span>Quantity: </span>
                                                                <button class="quantity-btn"
                                                                    data-action="decrease">−</button>
                                                                <span style="margin: 0 10px"
                                                                    class="quantity">{{ $item['quantity'] }}</span>
                                                                <button class="quantity-btn"
                                                                    data-action="increase">+</button>
                                                            </div>
                                                            <div><span class="item-total">Total price:
                                                                    {{ number_format($item['price'] * $item['quantity']) }}</span>
                                                                đ</div>
                                                        </div>

                                                    </div>
                                                </div> <!-- / Cart Item-->
                                            @endforeach
                                        @else
                                            <p>Giỏ hàng trống.</p>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                    <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                        <div class="pb-4 border-bottom">
                            <div class="d-flex flex-column flex-md-row justify-content-md-between mb-4 mb-md-2">
                                <div>
                                    <p class="m-0 fw-bold fs-5">Grand Total</p>
                                    <span class="text-muted small">Inc $45.89 sales tax</span>
                                </div>
                                <p class="m-0 fs-5 fw-bold"><span id="cart-total">
                                        {{ number_format(collect($cart)->reduce(fn($sum, $item) => $sum + $item['price'] * $item['quantity'], 0)) }}
                                    </span> đ</p>
                            </div>
                        </div>
                        <div class="py-4">
                            <div class="input-group mb-0">
                                <input type="text" class="form-control" placeholder="Enter coupon code">
                                <button class="btn btn-secondary btn-sm px-4">Apply</button>
                            </div>
                        </div>
                        <a href="{{ route('order') }}" class="btn btn-dark w-100 text-center" role="button">Proceed
                            to checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.bundle.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function updateCartDisplay(itemDiv, response) {
            itemDiv.find('.quantity').text(response.quantity);
            itemDiv.find('.item-total').text(response.itemTotal + ' đ');
            $('#cart-total').text(response.totalPrice + ' đ');

            // Disable nút giảm nếu số lượng = 1
            const decreaseBtn = itemDiv.find('.quantity-btn[data-action="decrease"]');
            if (response.quantity <= 1) {
                decreaseBtn.prop('disabled', true);
            } else {
                decreaseBtn.prop('disabled', false);
            }
        }
        $('.cart-item').each(function() {
            let quantity = parseInt($(this).find('.quantity').text());
            if (quantity <= 1) {
                $(this).find('.quantity-btn[data-action="decrease"]').prop('disabled', true);
            }
        });

        $('.quantity-btn').click(function() {
            let button = $(this);
            let action = button.data('action');
            let itemDiv = button.closest('.cart-item');
            let id = itemDiv.data('id');

            $.ajax({
                url: '{{ route('cart.updateQuantity') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    action: action
                },
                success: function(response) {
                    if (response.success) {
                        updateCartDisplay(itemDiv, response);
                    }
                }
            });
        });

        $('.remove-btn').click(function() {
            let itemDiv = $(this).closest('.cart-item');
            let id = itemDiv.data('id');

            $.ajax({
                url: '{{ route('cart.remove') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(response) {
                    if (response.success) {
                        itemDiv.remove();
                        $('#cart-total').text(response.totalPrice + ' đ');
                    }
                }
            });
        });
    </script>
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Đặt hàng thành Công!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif


</body>

</html>

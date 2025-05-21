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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Page Title -->
    <title>OldSkool | Bootstrap 5 HTML Template</title>

</head>

<body class="">

    <!-- Main Section-->
    <section class="mt-0  vh-lg-100">
        <!-- Page Content Goes Here -->
        <div class="container">
            <div class="row g-0 vh-lg-100">
                <div class="col-lg-7 pt-5 pt-lg-10">
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
                                <li class="me-4"><a class="nav-link-checkout " href="{{ route('cart') }}">Your
                                        Cart</a></li>
                                <li class="me-4"><a class="nav-link-checkout active"
                                        href="{{ route('checkout') }}">Information</a></li>
                                {{-- <li class="me-4"><a class="nav-link-checkout "
                                        href="{{ route('checkout_shipping') }}">Shipping</a></li>
                                <li><a class="nav-link-checkout nav-link-last "
                                        href="{{ route('checkout_payment') }}">Payment</a></li> --}}
                            </ul>
                        </nav>
                        <form action="{{ route('order.submit') }}" method="POST">
                            @csrf
                            <div class="mt-5">
                                <!-- Checkout Panel Information-->
                                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-4">
                                    <h3 class="fs-5 fw-bolder m-0 lh-1">Contact Information</h3>
                                    <small class="text-muted fw-bolder">Already registered? <a
                                            href="{{ route('login') }}">Login</a></small>
                                </div>

                                <div class="row">
                                    {{-- Customer_id --}}
                                    <input type="hidden" value="@auth{{ Auth::user()->id }} @endauth"
                                        name="customer_id">
                                    <!-- First Name-->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstNameBilling" class="form-label">First name</label>
                                            <input type="text" class="form-control" id="firstNameBilling"
                                                placeholder="" name="firstname" required="">
                                        </div>
                                    </div>

                                    <!-- Last Name-->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastNameBilling" class="form-label">Last name</label>
                                            <input type="text" class="form-control" id="lastNameBilling"
                                                placeholder="" name="lastname" required="">
                                        </div>
                                    </div>

                                    {{-- Phone number --}}
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="Phonenumber" class="form-label">Phone number</label>
                                            <input type="text" class="form-control" id="Phonenumber" placeholder=""
                                                name="phonenumber" required="">
                                        </div>
                                    </div>

                                    <!-- Email-->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="you@example.com" name="email">
                                        </div>

                                        <!-- Mailing List Signup-->
                                        {{-- <div class="form-group form-check m-0">
                                        <input type="checkbox" class="form-check-input" id="add-mailinglist" checked>
                                        <label class="form-check-label small text-muted" for="add-mailinglist">Keep me
                                            updated with your latest news and offers</label>
                                    </div> --}}
                                    </div>
                                </div>

                                <h3 class="fs-5 mt-5 fw-bolder mb-4 border-bottom pb-4">Shipping Address</h3>
                                <div class="row">
                                    <!-- Address-->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="address" class="form-label">Address</label>
                                            <input name="address" type="text" class="form-control" id="address"
                                                placeholder="123 Some Street Somewhere" required="">
                                        </div>
                                    </div>

                                    <!-- Chọn địa chỉ-->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="province" class="form-label">Province</label>
                                            <select class="form-select" id="province" name="province"
                                                required="">
                                                <option value="">Please Select...</option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}">{{ $province->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="district" class="form-label">District</label>
                                            <select class="form-select" id="district" name="district" disabled>
                                                <option value="">--Chọn quận/huyện--</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ward" class="form-label">District</label>
                                            <select class="form-select" id="ward" name="ward" disabled>
                                                <option value="">--Chọn xã/phường--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                {{-- Phương thức thanh toántoán --}}
                                <h3 class="fs-5 mt-5 fw-bolder mb-4 border-bottom pb-4">Chọn phương thức thanh toán</h3>
                                <label>
                                    <input type="radio" name="payment_method" value="cod" checked required>
                                    Thanh toán khi nhận hàng
                                </label><br>
                                <label>
                                    <input type="radio" name="payment_method" value="atm">
                                    Thanh toán qua thẻ tín dụng
                                </label><br>
                                <label>
                                    <input type="radio" name="payment_method" value="qrpay">
                                    Thanh toán qua ví điện tử
                                </label><br>

                                {{-- Xác nhận đặt hàng --}}
                                <div
                                    class="pt-5 mt-5 pb-5 border-top d-flex justify-content-md-end align-items-center">
                                    <button type="submit" class="btn btn-dark w-100 w-md-auto" role="button">Đặt
                                        hàng</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-5 bg-light pt-lg-10 aside-checkout pb-5 pb-lg-0 my-5 my-lg-0">
                    <div class="p-4 py-lg-0 pe-lg-0 ps-lg-5">
                        <div class="pb-3">
                            @if (session('cart'))
                                @foreach ($cart as $id => $item)
                                    <!-- Cart Item-->
                                    <div data-id="{{ $id }}" class="row mx-0 py-4 g-0 border-bottom">
                                        <div class="col-2 position-relative">
                                            <span class="checkout-item-qty">{{ $item['quantity'] }}</span>
                                            <picture class="d-block border">
                                                <img class="img-fluid" src="{{ asset($item['image']) }}"
                                                    alt="HTML Bootstrap Template by Pixel Rocket">
                                            </picture>
                                        </div>
                                        <div class="col-9 offset-1">
                                            <div>
                                                <h6 class="justify-content-between d-flex align-items-start mb-2">
                                                    {{ $item['name'] }}
                                                    <i class="ri-close-line ms-3"></i>
                                                </h6>
                                                <span class="d-block text-muted fw-bolder text-uppercase fs-9">Size: 9
                                                    / Qty: {{ $item['quantity'] }}</span>
                                            </div>
                                            <p class="fw-bolder text-end text-muted m-0">
                                                {{ number_format($item['price']) }}đ</p>
                                        </div>
                                    </div> <!-- / Cart Item-->
                                @endforeach
                            @else
                                <p>Giỏ hàng trống.</p>
                            @endif
                        </div>
                        <div class="py-4 border-bottom">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="m-0 fw-bolder fs-6">Subtotal</p>
                                <p class="m-0 fs-6 fw-bolder">
                                    {{ number_format(collect($cart)->reduce(fn($sum, $item) => $sum + $item['price'] * $item['quantity'], 0)) }}đ
                                </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center ">
                                <p class="m-0 fw-bolder fs-6">Shipping</p>
                                <p class="m-0 fs-6 fw-bolder">$8.95</p>
                            </div>
                        </div>
                        <div class="py-4 border-bottom">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="m-0 fw-bold fs-5">Grand Total</p>
                                    <span class="text-muted small">Inc $45.89 sales tax</span>
                                </div>
                                <p class="m-0 fs-5 fw-bold">$422.99</p>
                            </div>
                        </div>
                        <div class="py-4">
                            <div class="input-group mb-0">
                                <input type="text" class="form-control" placeholder="Enter your coupon code">
                                <button class="btn btn-dark btn-sm px-4">Apply</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </section>
    <!-- / Main Section-->

    {{-- Script Adress --}}
    <script>
        $(document).ready(function() {
            $('#province').change(function() {
                var provinceID = $(this).val();
                $('#district').prop('disabled', true);
                $('#ward').prop('disabled', true);
                $('#district').empty().append('<option value="">--Chọn quận/huyện--</option>');
                $('#ward').empty().append('<option value="">--Chọn xã/phường--</option>');
                if (provinceID) {
                    $.ajax({
                        url: '/districts/' + provinceID,
                        type: 'GET',
                        success: function(data) {
                            $('#district').prop('disabled', false);
                            $.each(data, function(i, item) {
                                $('#district').append('<option value="' + item.id +
                                    '">' + item.name + '</option>');
                            });
                        }
                    });
                }
            });

            $('#district').change(function() {
                var districtID = $(this).val();
                $('#ward').prop('disabled', true);
                $('#ward').empty().append('<option value="">--Chọn xã/phường--</option>');
                if (districtID) {
                    $.ajax({
                        url: '/wards/' + districtID,
                        type: 'GET',
                        success: function(data) {
                            $('#ward').prop('disabled', false);
                            $.each(data, function(i, item) {
                                $('#ward').append('<option value="' + item.id + '">' +
                                    item.name + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>

    <!-- Theme JS -->
    <!-- Vendor JS -->
    <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.bundle.js') }}"></script>
</body>

</html>

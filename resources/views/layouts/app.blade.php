<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'OldSkool')</title>

    <!-- CSS từ template -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.bundle.css') }}">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/libs.bundle.css') }}" />
</head>

<body>

    {{-- Header --}}
    @include('partials.header')

    {{-- Nội dung từng trang --}}
    @yield('content')

    {{-- Footer --}}
    @include('partials.footer')

    <!-- JS từ template -->
    <script src="{{ asset('assets/js/theme.bundle.js') }}"></script>
    <!-- Vendor JS -->
    <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>
    @yield('scripts')

</body>

</html>

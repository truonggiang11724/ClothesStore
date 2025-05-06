<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'OldSkool')</title>

  <!-- CSS từ template -->
  <link rel="stylesheet" href="{{ asset('assets/css/theme.bundle.css') }}">
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
</body>
</html>

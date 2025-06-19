<!-- Navbar -->
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white flex-column border-0  ">
    <div class="container-fluid">
        <div class="w-100">
            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <!-- Logo-->
                <a class="navbar-brand fw-bold fs-3 m-0 p-0 flex-shrink-0 order-0" href="{{ route('home') }}">
                    <div class="d-flex align-items-center">
                        <img class="f-w-36" src="https://theme.hstatic.net/200000265619/1001353407/14/logo.png?v=355"
                            alt="">
                    </div>
                </a>
                <!-- / Logo-->

                <!-- Navbar Icons-->
                <ul class="list-unstyled mb-0 d-flex align-items-center order-1 order-lg-2 nav-sidelinks">

                    <!-- Mobile Nav Toggler-->
                    <li class="d-lg-none">
                        <span class="nav-link text-body d-flex align-items-center cursor-pointer"
                            data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><i
                                class="ri-menu-line ri-lg me-1"></i> Lựa chọn</span>
                    </li>
                    <!-- /Mobile Nav Toggler-->

                    <!-- Navbar Search-->
                    {{-- <li class="d-none d-sm-block">
                        <span class="nav-link text-body search-trigger cursor-pointer">Search</span>

                        <!-- Search navbar overlay-->
                        <div class="navbar-search d-none">
                            <div class="input-group mb-3 h-100">
                                <span class="input-group-text px-4 bg-transparent border-0"><i
                                        class="ri-search-line ri-lg"></i></span>
                                <input type="text" class="form-control text-body bg-transparent border-0"
                                    placeholder="Enter your search terms...">
                                <span
                                    class="input-group-text px-4 cursor-pointer disable-child-pointer close-search bg-transparent border-0"><i
                                        class="ri-close-circle-line ri-lg"></i></span>
                            </div>
                        </div>
                        <div class="search-overlay"></div>
                        <!-- / Search navbar overlay-->

                    </li> --}}
                    <!-- /Navbar Search-->
                    {{-- View List Order --}}
                    <li class="d-none d-sm-block">
                        <a href="{{ route('list_order') }}" style="text-decoration: none"><span
                                class="nav-link text-body search-trigger cursor-pointer">Đơn hàng</span></a>
                    </li>

                    <!-- Settings Dropdown -->
                    <!-- Navbar Account-->
                    <div class="collapse navbar-collapse navbar-collapse-light w-auto flex-grow-1 order-2 order-lg-1"
                        id="navbarNavDropdown">
                        <!-- Menu-->
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    @auth
                                        {{ Auth::user()->name }}
                                    @endauth
                                    @guest
                                        Tài khoản
                                    @endguest
                                </a>
                                <ul class="dropdown-menu">
                                    @auth
                                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Trang cá nhân</a></li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Đăng xuất') }}
                                                </a>
                                            </form>
                                        </li>
                                    @endauth
                                    @guest
                                        <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                                    @endguest
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- /Navbar Login-->

                    <!-- Navbar Cart Icon-->
                    <li class="ms-1 d-inline-block position-relative dropdown-cart">
                        <a class="nav-link me-0 disable-child-pointer border-0 p-0 bg-transparent text-body"
                            href="{{ route('cart') }}">
                            Giỏ hàng
                        </a>


                    </li>
                    <!-- /Navbar Cart Icon-->

                </ul>
                <!-- Navbar Icons-->

                <!-- Main Navigation-->
                <div class="flex-shrink-0 collapse navbar-collapse navbar-collapse-light w-auto flex-grow-1 order-2 order-lg-1"
                    id="navbarNavDropdown">

                    <!-- Menu-->
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown dropdown position-static">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Đồ nam
                            </a>
                            <!-- Menswear dropdown menu-->
                            <div class="dropdown-menu dropdown-megamenu">
                                <div class="container-fluid">
                                    <div class="row g-0 g-lg-3">
                                        <!-- Menswear Dropdown Menu Links Section-->
                                        <div class="col col-lg-8 py-lg-5">
                                            <div class="row py-3 py-lg-0 flex-wrap gx-4 gy-6">
                                                <!-- menu row-->
                                                <div class="col">
                                                    <h6 class="dropdown-heading">Coats & Jackets</h6>
                                                    <ul class="list-unstyled">
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Waterproof Jackets</a>
                                                        </li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Insulated Jackets</a>
                                                        </li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Down Jackets</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Softshell Jackets</a>
                                                        </li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Casual Jackets</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Windproof Jackets</a>
                                                        </li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Breathable Jackets</a>
                                                        </li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Cleaning & Proofing</a>
                                                        </li>
                                                        <li class="dropdown-list-item"><a
                                                                class="dropdown-item dropdown-link-all"
                                                                href="{{ route('category') }}">View All</a></li>
                                                    </ul>
                                                </div>
                                                <!-- / menu row-->

                                                <!-- menu row-->
                                                <div class="col">
                                                    <h6 class="dropdown-heading">Insulated</h6>
                                                    <ul class="list-unstyled">
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Insulated Jackets</a>
                                                        </li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Bodywarmers</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Parkas</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Baselayers &
                                                                Thermals</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Winter Hats</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Scarves & Neck</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Gloves & Mitts</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Accessories</a></li>
                                                        <li class="dropdown-list-item"><a
                                                                class="dropdown-item dropdown-link-all"
                                                                href="{{ route('category') }}">Xem tất cả</a></li>
                                                    </ul>
                                                </div>
                                                <!-- / menu row-->

                                                <!-- menu row-->
                                                <div class="d-none d-xxl-block col">
                                                    <h6 class="dropdown-heading">Footwear</h6>
                                                    <ul class="list-unstyled">
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Lifestyle & Casual</a>
                                                        </li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Walking Shoes</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Running Shoes</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Military Boots</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Fabric Walking
                                                                Boots</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Leather Walking
                                                                Boots</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Wellies</a></li>
                                                        <li class="dropdown-list-item"><a class="dropdown-item"
                                                                href="{{ route('category') }}">Winter Footwear</a>
                                                        </li>
                                                        <li class="dropdown-list-item"><a
                                                                class="dropdown-item dropdown-link-all"
                                                                href="{{ route('category') }}">Xem tất cả</a></li>
                                                    </ul>
                                                </div>
                                                <!-- / menu row-->

                                                <!-- menu row-->
                                                <div class="col">
                                                    <h6 class="dropdown-heading text-danger">Special Offers</h6>
                                                    <ul class="list-unstyled">
                                                        <li class="dropdown-list-item"><a
                                                                class="dropdown-item text-danger"
                                                                href="{{ route('category') }}">Insulated Jackets</a>
                                                        </li>
                                                        <li class="dropdown-list-item"><a
                                                                class="dropdown-item text-danger"
                                                                href="{{ route('category') }}">Bodywarmers</a></li>
                                                        <li class="dropdown-list-item"><a
                                                                class="dropdown-item text-danger"
                                                                href="{{ route('category') }}">Parkas</a></li>
                                                        <li class="dropdown-list-item"><a
                                                                class="dropdown-item text-danger"
                                                                href="{{ route('category') }}">Baselayers &
                                                                Thermals</a></li>
                                                        <li class="dropdown-list-item"><a
                                                                class="dropdown-item text-danger"
                                                                href="{{ route('category') }}">Winter Hats</a></li>
                                                        <li class="dropdown-list-item"><a
                                                                class="dropdown-item text-danger"
                                                                href="{{ route('category') }}">Scarves & Neck</a></li>
                                                        <li class="dropdown-list-item"><a
                                                                class="dropdown-item text-danger"
                                                                href="{{ route('category') }}">Gloves & Mitts</a></li>
                                                        <li class="dropdown-list-item"><a
                                                                class="dropdown-item text-danger"
                                                                href="{{ route('category') }}">Accessories</a></li>
                                                        <li class="dropdown-list-item"><a
                                                                class="dropdown-item text-danger dropdown-link-all"
                                                                href="{{ route('category') }}">Xem tất cả</a></li>
                                                    </ul>
                                                </div>
                                                <!-- / menu row-->
                                            </div>

                                            <div
                                                class="align-items-center justify-content-between mt-5 d-none d-lg-flex">
                                                <div class="me-5 f-w-20">
                                                    <a class="d-block" href="{{ route('category') }}">
                                                        <picture>
                                                            <img class="img-fluid d-table mx-auto"
                                                                src="{{ asset('assets/images/logos/logo-1.svg') }}"
                                                                alt="">
                                                        </picture>
                                                    </a>
                                                </div>
                                                <div class="me-5 f-w-20">
                                                    <a class="d-block" href="{{ route('category') }}">
                                                        <picture>
                                                            <img class="img-fluid d-table mx-auto"
                                                                src="{{ asset('assets/images/logos/logo-2.svg') }}"
                                                                alt="">
                                                        </picture>
                                                    </a>
                                                </div>
                                                <div class="me-5 f-w-20">
                                                    <a class="d-block" href="{{ route('category') }}">
                                                        <picture>
                                                            <img class="img-fluid d-table mx-auto"
                                                                src="{{ asset('assets/images/logos/logo-3.svg') }}"
                                                                alt="">
                                                        </picture>
                                                    </a>
                                                </div>
                                                <div class="me-5 f-w-20">
                                                    <a class="d-block" href="{{ route('category') }}">
                                                        <picture>
                                                            <img class="img-fluid d-table mx-auto"
                                                                src="{{ asset('assets/images/logos/logo-4.svg') }}"
                                                                alt="">
                                                        </picture>
                                                    </a>
                                                </div>
                                                <div class="me-5 f-w-20">
                                                    <a class="d-block" href="{{ route('category') }}">
                                                        <picture>
                                                            <img class="img-fluid d-table mx-auto"
                                                                src="{{ asset('assets/images/logos/logo-5.svg') }}"
                                                                alt="">
                                                        </picture>
                                                    </a>
                                                </div>
                                                <div class="me-5 f-w-20">
                                                    <a class="d-block" href="{{ route('category') }}">
                                                        <picture>
                                                            <img class="img-fluid d-table mx-auto"
                                                                src="{{ asset('assets/images/logos/logo-6.svg') }}"
                                                                alt="">
                                                        </picture>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Menswear Dropdown Menu Links Section-->

                                        <!-- Menswear Dropdown Menu Images Section-->
                                        <div class="col-lg-4 d-none d-lg-block">
                                            <div class="vw-50 border-start h-100 position-absolute"></div>
                                            <div class="py-lg-5 position-relative z-index-10 px-lg-4">
                                                <div class="row g-4">
                                                    <div class="col-12 col-md-6">
                                                        <div
                                                            class="card justify-content-center d-flex align-items-center bg-transparent">
                                                            <picture class="w-100 d-block mb-2 mx-auto">
                                                                <img class="w-100 rounded" title=""
                                                                    src="{{ asset('assets/images/banners/banner-12.jpg') }}"
                                                                    alt="HTML Bootstrap Template by Pixel Rocket">
                                                            </picture>
                                                            <a class="fw-bolder link-cover"
                                                                href="{{ route('category') }}">Latest Arrivals</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div
                                                            class="card justify-content-center d-flex align-items-center bg-transparent">
                                                            <picture class="w-100 d-block mb-2 mx-auto">
                                                                <img class="w-100 rounded" title=""
                                                                    src="{{ asset('assets/images/banners/banner-13.jpg') }}"
                                                                    alt="HTML Bootstrap Template by Pixel Rocket">
                                                            </picture>
                                                            <a class="fw-bolder link-cover"
                                                                href="{{ route('category') }}">Accessories</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div
                                                            class="card justify-content-center d-flex align-items-center bg-transparent">
                                                            <picture class="w-100 d-block mb-2 mx-auto">
                                                                <img class="w-100 rounded" title=""
                                                                    src="{{ asset('assets/images/banners/banner-14.jpg') }}"
                                                                    alt="HTML Bootstrap Template by Pixel Rocket">
                                                            </picture>
                                                            <a class="fw-bolder link-cover"
                                                                href="{{ route('category') }}">T-Shirts</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div
                                                            class="card justify-content-center d-flex align-items-center bg-transparent">
                                                            <picture class="w-100 d-block mb-2 mx-auto">
                                                                <img class="w-100 rounded" title=""
                                                                    src="{{ asset('assets/images/banners/banner-15.jpg') }}"
                                                                    alt="HTML Bootstrap Template by Pixel Rocket">
                                                            </picture>
                                                            <a class="fw-bolder link-cover"
                                                                href="{{ route('category') }}">Jackets</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('category') }}"
                                                    class="btn btn-link p-0 fw-bolder text-link-border mt-5 text-dark mx-auto d-table">Visit
                                                    Mens Section</a>
                                            </div>
                                        </div>
                                        <!-- Menswear Dropdown Menu Images Section-->
                                    </div>
                                </div>
                            </div>
                            <!-- / Menswear dropdown menu-->
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Đồ nữ
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('category') }}">Tops</a></li>
                                <li><a class="dropdown-item" href="{{ route('category') }}">Bottoms</a></li>
                                <li><a class="dropdown-item" href="{{ route('category') }}">Jeans</a></li>
                                <li><a class="dropdown-item" href="{{ route('category') }}">T-Shirts</a></li>
                                <li><a class="dropdown-item" href="{{ route('category') }}">Shoes</a></li>
                                <li><a class="dropdown-item" href="{{ route('category') }}">Accessories</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category') }}" role="button">
                                Đồ trẻ em
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category') }}" role="button">
                                Bán hàng
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('home') }}">Trang chủ</a></li>
                                <li><a class="dropdown-item" href="{{ route('category') }}">Trang loại hàng</a></li>
                                <li><a class="dropdown-item" href="{{ route('product') }}">Trang sản phẩm</a></li>
                                <li><a class="dropdown-item" href="{{ route('cart') }}">Giỏ hàng</a></li>
                                <li><a class="dropdown-item" href="{{ route('checkout') }}">Thanh toán</a></li>
                                <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                                <li><a class="dropdown-item" href="{{ route('register') }}">Đăng kí</a></li>
                                <li><a class="dropdown-item" href="{{ route('forgotten_password') }}">Quên mật khẩu</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard (Admin)</a></li>
                            </ul>
                        </li>
                    </ul> <!-- / Menu-->

                </div>
                <!-- / Main Navigation-->

            </div>
        </div>
    </div>
</nav>
<!-- / Navbar--> <!-- / Navbar-->

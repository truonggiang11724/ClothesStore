<!-- Main Section-->
<section class="mt-0 ">
    <!-- Page Content Goes Here -->

    <!-- Category Top Banner -->
    <div class="py-10 bg-img-cover bg-overlay-dark position-relative overflow-hidden bg-pos-center-center rounded-0"
        style="background-image: url({{ asset('assets/images/banners/banner-category-top.jpg') }});">
        <div class="container-fluid position-relative z-index-20" data-aos="fade-right" data-aos-delay="300">
            <h1 class="fw-bold display-6 mb-4 text-white">Latest Arrivals</h1>
            <div class="col-12 col-md-6">
                <p class="text-white mb-0 fs-5">
                    When it's time to head out and get your Kicks on, have a look at our latest arrivals. Whether you're
                    into Nike, Adidas, Dunks or New Balance, we really have something for everyone!
                </p>
            </div>
        </div>
    </div>
    <!-- Category Top Banner -->

    <div class="container-fluid" data-aos="fade-in">
        <!-- Category Toolbar-->
        <div class="d-flex justify-content-between items-center pt-5 pb-4 flex-column flex-lg-row">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Sneakers</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New Releases</li>
                    </ol>
                </nav>
                <h1 class="fw-bold fs-3 mb-2">New Releases (121)</h1>
                <p class="m-0 text-muted small">Showing 1 - 9 of 121</p>
            </div>
            <div class="d-flex justify-content-end align-items-center mt-4 mt-lg-0 flex-column flex-md-row">

                <form method="GET" action="{{ url('/category') }}"
                    class="d-flex fs-7 lh-1 w-100 mb-2 mb-md-0 w-md-auto" style="height: 48px">
                    <div class="" style="height: 48px">
                        <input style="height: 48px;width:140px;" type="text" name="search" class="form-control"
                            placeholder="Tìm sản phẩm..." value="{{ request('search') }}">
                    </div>

                    <div class="" style="height: 48px">
                        <button type="submit" class="btn btn-primary"
                            style="margin: 0 10px;height:48px;line-height:12px">Lọc</button>
                    </div>
                </form>

                {{-- 
                                    <div class="">
                        <select name="category" class="form-control">
                            <option value="">-- Tất cả danh mục --</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                --}}


                <!-- Filter Trigger-->
                <button
                    class="btn bg-light p-3 me-md-3 d-flex align-items-center fs-7 lh-1 w-100 mb-2 mb-md-0 w-md-auto "
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilters"
                    aria-controls="offcanvasFilters">
                    <i class="ri-equalizer-line me-2"></i> Filters
                </button>
                <!-- / Filter Trigger-->

                <!-- Sort Options-->
                <select class="form-select form-select-sm border-0 bg-light p-3 pe-5 lh-1 fs-7">
                    <option selected>Sort By</option>
                    <option value="1">Hi Low</option>
                    <option value="2">Low Hi</option>
                    <option value="3">Name</option>
                </select>
                <!-- / Sort Options-->
            </div>
        </div> <!-- /Category Toolbar-->

        <!-- Products-->
        <div class="row g-4">
            {{-- Cards Product --}}
            <div class="row" id="product-container">
                @include('partials.product-list', ['products' => $products])
            </div>
        </div>



        <!-- / Products-->
        @if ($products->hasMorePages())
            <!-- Pagination-->
            <div class="d-flex flex-column f-w-44 mx-auto my-5 text-center">
                <small class="text-muted">Showing 9 of 121 products</small>
                <div class="progress f-h-1 mt-3">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <button id="load-more" data-next-page="{{ $products->currentPage() + 1 }}" href="#"
                    class="btn btn-outline-dark btn-sm mt-5 align-self-center py-3 px-4 border-2">Load
                    More</button>
            </div>
        @endif
        <!-- / Pagination-->

    </div>

    <!-- /Page Content -->
</section>
<!-- / Main Section-->
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#load-more').on('click', function() {
            let button = $(this);
            let nextPage = button.data('next-page');
            let baseUrl = new URL(window.location.href);
            baseUrl.searchParams.set('page', nextPage);
            let finalUrl = baseUrl.toString();

            $.ajax({
                url: finalUrl,
                type: 'GET',
                beforeSend: function() {
                    button.text('Đang tải...');
                },
                success: function(data) {
                    $('#product-container').append(data);
                    button.data('next-page', nextPage + 1);

                    // Ẩn nút nếu không còn trang tiếp theo
                    $.get('?page=' + (nextPage + 1), function(response) {
                        if (response.trim() === '') {
                            button.remove();
                        } else {
                            button.text('Load more');
                        }
                    });
                },
                error: function() {
                    button.text('Tải thất bại!');
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @auth
        <script>
            $(document).on('click', '.add-to-cart-btn', function() {
                const button = $(this);
                const id = button.data('id');
                const name = button.data('name');
                const price = button.data('price');
                const image = button.data('image');

                $.ajax({
                    url: '{{ route('cart.add') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        name: name,
                        price: price,
                        image: image,
                        quantity: 1
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });

                            $('#cart-count').text(response.totalQuantity);
                        }
                    }
                });
            });
        </script>
    @endauth
    @guest
        <script>
            $(document).on('click', '.add-to-cart-btn', function() {
                const button = $(this);

                $.ajax({
                    url: '{{ route('login') }}',
                    method: 'GET',
                    data: {
                    },
                    success: function(response) {
                        // Chuyển hướng đến trang đăng nhập
                        window.location.href = '{{ route('login') }}'; // hoặc '/login'
                    }
                });
            });
        </script>
    @endguest
@endsection

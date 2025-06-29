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
        <div class="d-flex justify-content-between items-center pt-5 pb-4 flex-column flex-lg-row" style="margin-bottom: 20px">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Sneakers</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New Releases</li>
                    </ol>
                </nav>

            </div>
            <div class="d-flex justify-content-end align-items-center mt-4 mt-lg-0 flex-column flex-md-row">

                <form method="GET" action="{{ url('/category') }}"
                    class="d-flex fs-7 lh-1 w-100 mb-2 mb-md-0 w-md-auto" style="height: 52px;margin-right:20px; margin-bottom:20px">
                    <div class="" style="height: 52px">
                        <input style="height: 52px;width:140px;" type="text" name="search" class="form-control"
                            placeholder="Tìm sản phẩm..." value="{{ request('search') }}">
                    </div>

                    <div class="" style="height: 52px">
                        <button type="submit" class="btn btn-primary"
                            style="margin: 0 10px;height:52px;line-height:12px">Lọc</button>
                    </div>
                    <div style="width: 180px; height:52px">
                        <select name="category" class="form-control lh-1" style="height: 52px">
                            <option value="">-- Chọn danh mục --</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" style="text-align: center"
                                    {{ request('category') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>

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
                <small class="text-muted">Hiển thị <strong id="product-display">{{ $products->perPage() * $products->currentPage() }}</strong> trong số
                    {{ $products->total() }} sản phẩm</small>
                <div class="progress f-h-1 mt-3">
                    <div class="progress-bar bg-dark" role="progressbar" style="width: 25%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <button id="load-more" data-next-page="{{ $products->currentPage() + 1 }}" href="#"
                    class="btn btn-outline-dark btn-sm mt-5 align-self-center py-3 px-4 border-2">Tải thêm</button>
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
            let product_display = $('#product-display');
            let total_product = {{$products->total()}};
            $.ajax({
                url: finalUrl,
                type: 'GET',
                beforeSend: function() {
                    button.text('Đang tải...');
                },
                success: function(data) {
                    $('#product-container').append(data);
                    button.data('next-page', nextPage + 1);
                    product_display.text(nextPage*6)
                    // Ẩn nút nếu không còn trang tiếp theo
                    $.get('?page=' + (nextPage + 1), function(response) {
                        if (response.trim() === '') {
                            button.remove();
                            product_display.text(total_product)
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
@endsection

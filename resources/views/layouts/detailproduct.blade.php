 <!-- Main Section-->
 <section class="mt-0 ">
     <!-- Page Content Goes Here -->

     <!-- Breadcrumbs-->
     <div class="bg-dark py-6">
         <div class="container-fluid">
             <nav class="m-0" aria-label="breadcrumb">
                 <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item breadcrumb-light"><a href="#">Home</a></li>
                     <li class="breadcrumb-item breadcrumb-light"><a href="#">T-Shirts</a></li>
                     <li class="breadcrumb-item  breadcrumb-light active" aria-current="page">{{ $product->name }}</li>
                 </ol>
             </nav>
         </div>
     </div>
     <!-- / Breadcrumbs-->

     <div class="container-fluid mt-5">

         <!-- Product Top Section-->
         <div class="row g-9" data-sticky-container>

             <!-- Product Images-->
             <div class="col-12 col-md-6 col-xl-7">
                 <div class="row g-3" data-aos="fade-right">
                     <div class="col-12">
                         <picture>
                             <img class="img-fluid" data-zoomable src="{{ asset($product->image) }}" alt="">
                         </picture>
                     </div>

                     <div class="col-12">
                         @foreach ($images as $image)
                             <picture>
                                 <img class="img-fluid" data-zoomable src="{{ asset($image->image) }}"
                                     alt="HTML Bootstrap Template by Pixel Rocket">
                             </picture>
                         @endforeach

                     </div>
                 </div>
             </div>
             <!-- /Product Images-->

             <!-- Product Information-->
             <div class="col-12 col-md-6 col-lg-5">
                 <div class="sticky-top top-5">
                     <div class="pb-3" data-aos="fade-in">
                         <div class="d-flex align-items-center mb-3">
                             <p class="small fw-bolder text-uppercase tracking-wider text-muted m-0 me-4">KiiKii</p>
                             <div class="d-flex justify-content-start align-items-center disable-child-pointer cursor-pointer"
                                 data-pixr-scrollto data-target=".reviews">
                                 <!-- Review Stars Small-->
                                 <div class="rating position-relative d-table">
                                     <div class="position-absolute stars" style="width: 80%">
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                     </div>
                                     <div class="stars">
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                     </div>
                                 </div> <small class="text-muted d-inline-block ms-2 fs-bolder">(105 reviews)</small>
                             </div>
                         </div>

                         <h1 class="mb-1 fs-2 fw-bold">{{ $product->name }}</h1>
                         <div class="d-flex justify-content-between align-items-center">
                             <p class="fs-4 m-0">{{ number_format($product->price) }}₫</p>
                         </div>
                         <form id="add-to-cart-form">
                             @csrf
                             <input type="hidden" name="product_id" value="{{ $product->id }}">
                             {{-- Chọn màu --}}
                             <div class="border-top mt-4 mb-3 product-option">
                                 <small class="text-uppercase pt-4 d-block fw-bolder">
                                     <span class="text-muted">Chọn Màu</span> : <span class="selected-option fw-bold"
                                         data-pixr-product-option="size"></span>
                                 </small>
                                 <div class="mt-4 d-flex justify-content-start flex-wrap align-items-start">
                                     @foreach ($colors as $color)
                                         <div class="form-check-option form-check-rounded btn">
                                             <input type="radio" name="color_id" value="{{ $color->id }}"
                                                 id="option-sizes-{{ $color->id }}" class="color-radio" required>
                                             <label for="option-sizes-{{ $color->id }}">
                                                 <small>{{ $color->name }}</small>
                                             </label>
                                         </div>
                                     @endforeach
                                 </div>
                             </div>
                             {{-- Chọn size --}}
                             <div class="mb-3">
                                 <label><strong>Chọn kích cỡ:</strong></label><br>
                                 <div id="size-options">
                                     <p class="text-muted">Vui lòng chọn màu để hiển thị kích cỡ</p>
                                 </div>
                             </div>
                             <button class="btn btn-dark w-100 mt-4 mb-0 hover-lift-sm hover-boxshadow">Thêm vào giỏ
                                 hàng</button>
                             <div id="cart-message" class="mt-2"></div>
                         </form>
                         {{-- <div class="mb-3">
                             <small class="text-uppercase pt-4 d-block fw-bolder text-muted">
                                 Xem trước mẫu :
                             </small>
                             <div class="mt-4 d-flex justify-content-start flex-wrap align-items-start">
                                 <picture class="me-2">
                                     <img class="f-w-24 p-2 bg-light border-bottom border-dark border-2 cursor-pointer"
                                         src="{{ asset('assets/images/products/product-page-thumb-1.jpeg') }}"
                                         alt="HTML Bootstrap Template by Pixel Rocket">
                                 </picture>
                             </div>
                         </div> --}}


                         <!-- Product Highlights-->
                         <div class="my-5">
                             <div class="row">
                                 <div class="col-12 col-md-4">
                                     <div class="text-center px-2">
                                         <i class="ri-24-hours-line ri-2x"></i>
                                         <small class="d-block mt-1">Giao hàng nhanh 1-2 ngày</small>
                                     </div>
                                 </div>
                                 <div class="col-12 col-md-4">
                                     <div class="text-center px-2">
                                         <i class="ri-secure-payment-line ri-2x"></i>
                                         <small class="d-block mt-1">Được đồng kiểm</small>
                                     </div>
                                 </div>
                                 <div class="col-12 col-md-4">
                                     <div class="text-center px-2">
                                         <i class="ri-service-line ri-2x"></i>
                                         <small class="d-block mt-1">Hoàn tiền</small>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!-- / Product Highlights-->

                         <!-- Product Accordion -->
                         <div class="accordion" id="accordionProduct">
                             <div class="accordion-item">
                                 <h2 class="accordion-header" id="headingOne">
                                     <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                         data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                         Chi tiết sản phẩm
                                     </button>
                                 </h2>
                                 <div id="collapseOne" class="accordion-collapse collapse show"
                                     aria-labelledby="headingOne" data-bs-parent="#accordionProduct">
                                     <div class="accordion-body">
                                         <p class="m-0">{{ $product->description }}</p>
                                     </div>
                                 </div>
                             </div>
                             <div class="accordion-item">
                                 <h2 class="accordion-header" id="headingTwo">
                                     <button class="accordion-button collapsed" type="button"
                                         data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                         aria-expanded="false" aria-controls="collapseTwo">
                                         Đánh giá & Phản hồi
                                     </button>
                                 </h2>
                                 <div id="collapseTwo" class="accordion-collapse collapse"
                                     aria-labelledby="headingTwo" data-bs-parent="#accordionProduct">
                                     <div class="accordion-body">
                                         <ul class="list-group list-group-flush">
                                             <li class="list-group-item d-flex border-0 row g-0 px-0">
                                                 <span class="col-4 fw-bolder">Đánh giá</span>
                                                 <span class="col-7 offset-1">Khách hàng có thắc mắc hay không hài lòng
                                                     với sản phẩm
                                                     nhớ inbox cho shop hoặc liên hệ hotline nhé ạ.
                                                 </span>
                                             </li>
                                             <li class="list-group-item d-flex border-0 row g-0 px-0">
                                                 <span class="col-4 fw-bolder">Phản hồi</span>
                                                 <span class="col-7 offset-1">Shop sẽ cố gắng xử lý yêu cầu của khách
                                                     hàng sớm nhất có thể.
                                                     Đừng vội đánh giá xấu nhé.
                                                 </span>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                             <div class="accordion-item">
                                 <h2 class="accordion-header" id="headingThree">
                                     <button class="accordion-button collapsed" type="button"
                                         data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                         aria-expanded="false" aria-controls="collapseThree">
                                         Giao hàng & Hoàn tiền
                                     </button>
                                 </h2>
                                 <div id="collapseThree" class="accordion-collapse collapse"
                                     aria-labelledby="headingThree" data-bs-parent="#accordionProduct">
                                     <div class="accordion-body">
                                         <ul class="list-group list-group-flush">
                                             <li class="list-group-item d-flex border-0 row g-0 px-0">
                                                 <span class="col-4 fw-bolder">Giao hàng</span>
                                                 <span class="col-7 offset-1">Giao hàng tiêu chuẩn với giá cước GHTK,
                                                     GHSR</span>
                                             </li>
                                             <li class="list-group-item d-flex border-0 row g-0 px-0">
                                                 <span class="col-4 fw-bolder">Hoàn tiền</span>
                                                 <span class="col-7 offset-1">Hoàn tiền trong 7 ngày. Xem chi tiết
                                                     trong<a class="text-link-border" href="#"> Chính sách &
                                                         Điều khoản</a> của chúng tôi </span>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!-- / Product Accordion-->
                     </div>
                 </div>
             </div>
             <!-- / Product Information-->
         </div>
         <!-- / Product Top Section-->

         <div class="row g-0">

             <!-- Related Products-->
             <div class="col-12" data-aos="fade-up">
                 <h3 class="fs-4 fw-bolder mt-7 mb-4">You May Also Like</h3>
                 <!-- Swiper Latest -->
                 <div class="swiper-container" data-swiper
                     data-options='{
                        "spaceBetween": 10,
                        "loop": true,
                        "autoplay": {
                          "delay": 5000,
                          "disableOnInteraction": false
                        },
                        "navigation": {
                          "nextEl": ".swiper-next",
                          "prevEl": ".swiper-prev"
                        },   
                        "breakpoints": {
                          "600": {
                            "slidesPerView": 2
                          },
                          "1024": {
                            "slidesPerView": 3
                          },       
                          "1400": {
                            "slidesPerView": 4
                          }
                        }
                      }'>
                     <div class="swiper-wrapper">
                         <div class="swiper-slide">
                             <!-- Card Product-->
                             <div
                                 class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                 <div class="card-img position-relative">
                                     <div class="card-badges">
                                         <span class="badge badge-card"><span
                                                 class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"></span>
                                             Sale</span>
                                     </div>
                                     <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i
                                             class="ri-heart-line"></i></span>
                                     <picture class="position-relative overflow-hidden d-block bg-light">
                                         <img class="w-100 img-fluid position-relative z-index-10" title=""
                                             src="{{ asset('assets/images/products/product-1.jpg') }}"
                                             alt="">
                                     </picture>
                                     <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                         <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                             Add</button>
                                     </div>
                                 </div>
                                 <div class="card-body px-0">
                                     <a class="text-decoration-none link-cover" href="{{ route('product') }}">Nike
                                         Air VaporMax 2021</a>
                                     <small class="text-muted d-block">4 colours, 10 sizes</small>
                                     <p class="mt-2 mb-0 small"><s class="text-muted">$329.99</s> <span
                                             class="text-danger">$198.66</span></p>
                                 </div>
                             </div>
                             <!--/ Card Product-->
                         </div>
                         <div class="swiper-slide">
                             <!-- Card Product-->
                             <div
                                 class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                 <div class="card-img position-relative">
                                     <div class="card-badges">
                                         <span class="badge badge-card"><span
                                                 class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span> New
                                             In</span>
                                     </div>
                                     <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i
                                             class="ri-heart-line"></i></span>
                                     <picture class="position-relative overflow-hidden d-block bg-light">
                                         <img class="w-100 img-fluid position-relative z-index-10" title=""
                                             src="{{ asset('assets/images/products/product-2.jpg') }}"
                                             alt="">
                                     </picture>
                                     <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                         <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                             Add</button>
                                     </div>
                                 </div>
                                 <div class="card-body px-0">
                                     <a class="text-decoration-none link-cover" href="{{ route('product') }}">Nike
                                         ZoomX Vaporfly</a>
                                     <small class="text-muted d-block">2 colours, 4 sizes</small>
                                     <p class="mt-2 mb-0 small">$275.45</p>
                                 </div>
                             </div>
                             <!--/ Card Product-->
                         </div>
                         <div class="swiper-slide">
                             <!-- Card Product-->
                             <div
                                 class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                 <div class="card-img position-relative">
                                     <div class="card-badges">
                                         <span class="badge badge-card"><span
                                                 class="f-w-2 f-h-2 bg-secondary rounded-circle d-block me-1"></span>
                                             Sold Out</span>
                                     </div>
                                     <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i
                                             class="ri-heart-line"></i></span>
                                     <picture class="position-relative overflow-hidden d-block bg-light">
                                         <img class="w-100 img-fluid position-relative z-index-10" title=""
                                             src="{{ asset('assets/images/products/product-3.jpg') }}"
                                             alt="">
                                     </picture>
                                 </div>
                                 <div class="card-body px-0">
                                     <a class="text-decoration-none link-cover" href="{{ route('product') }}">Nike
                                         Blazer Mid &#x27;77</a>
                                     <small class="text-muted d-block">5 colours, 6 sizes</small>
                                     <p class="mt-2 mb-0 small text-muted">Sold Out</p>
                                 </div>
                             </div>
                             <!--/ Card Product-->
                         </div>
                         <div class="swiper-slide">
                             <!-- Card Product-->
                             <div
                                 class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                 <div class="card-img position-relative">
                                     <div class="card-badges">
                                     </div>
                                     <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i
                                             class="ri-heart-line"></i></span>
                                     <picture class="position-relative overflow-hidden d-block bg-light">
                                         <img class="w-100 img-fluid position-relative z-index-10" title=""
                                             src="{{ asset('assets/images/products/product-4.jpg') }}"
                                             alt="">
                                     </picture>
                                     <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                         <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                             Add</button>
                                     </div>
                                 </div>
                                 <div class="card-body px-0">
                                     <a class="text-decoration-none link-cover" href="{{ route('product') }}">Nike
                                         Air Force 1</a>
                                     <small class="text-muted d-block">6 colours, 9 sizes</small>
                                     <p class="mt-2 mb-0 small">$425.85</p>
                                 </div>
                             </div>
                             <!--/ Card Product-->
                         </div>
                         <div class="swiper-slide">
                             <!-- Card Product-->
                             <div
                                 class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                 <div class="card-img position-relative">
                                     <div class="card-badges">
                                         <span class="badge badge-card"><span
                                                 class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"></span>
                                             Sale</span>
                                     </div>
                                     <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i
                                             class="ri-heart-line"></i></span>
                                     <picture class="position-relative overflow-hidden d-block bg-light">
                                         <img class="w-100 img-fluid position-relative z-index-10" title=""
                                             src="{{ asset('assets/images/products/product-5.jpg') }}"
                                             alt="">
                                     </picture>
                                     <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                         <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                             Add</button>
                                     </div>
                                 </div>
                                 <div class="card-body px-0">
                                     <a class="text-decoration-none link-cover" href="{{ route('product') }}">Nike
                                         Air Max 90</a>
                                     <small class="text-muted d-block">4 colours, 10 sizes</small>
                                     <p class="mt-2 mb-0 small"><s class="text-muted">$196.99</s> <span
                                             class="text-danger">$98.66</span></p>
                                 </div>
                             </div>
                             <!--/ Card Product-->
                         </div>
                         <div class="swiper-slide">
                             <!-- Card Product-->
                             <div
                                 class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                 <div class="card-img position-relative">
                                     <div class="card-badges">
                                         <span class="badge badge-card"><span
                                                 class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"></span>
                                             Sale</span>
                                         <span class="badge badge-card"><span
                                                 class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span> New
                                             In</span>
                                     </div>
                                     <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i
                                             class="ri-heart-line"></i></span>
                                     <picture class="position-relative overflow-hidden d-block bg-light">
                                         <img class="w-100 img-fluid position-relative z-index-10" title=""
                                             src="{{ asset('assets/images/products/product-6.jpg') }}"
                                             alt="">
                                     </picture>
                                     <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                         <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                             Add</button>
                                     </div>
                                 </div>
                                 <div class="card-body px-0">
                                     <a class="text-decoration-none link-cover" href="{{ route('product') }}">Nike
                                         Glide FlyEase</a>
                                     <small class="text-muted d-block">1 colour</small>
                                     <p class="mt-2 mb-0 small"><s class="text-muted">$329.99</s> <span
                                             class="text-danger">$198.66</span></p>
                                 </div>
                             </div>
                             <!--/ Card Product-->
                         </div>
                         <div class="swiper-slide">
                             <!-- Card Product-->
                             <div
                                 class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                 <div class="card-img position-relative">
                                     <div class="card-badges">
                                     </div>
                                     <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i
                                             class="ri-heart-line"></i></span>
                                     <picture class="position-relative overflow-hidden d-block bg-light">
                                         <img class="w-100 img-fluid position-relative z-index-10" title=""
                                             src="{{ asset('assets/images/products/product-7.jpg') }}"
                                             alt="">
                                     </picture>
                                     <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                         <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                             Add</button>
                                     </div>
                                 </div>
                                 <div class="card-body px-0">
                                     <a class="text-decoration-none link-cover" href="{{ route('product') }}">Nike
                                         Zoom Freak</a>
                                     <small class="text-muted d-block">2 colours, 2 sizes</small>
                                     <p class="mt-2 mb-0 small">$444.99</p>
                                 </div>
                             </div>
                             <!--/ Card Product-->
                         </div>
                         <div class="swiper-slide">
                             <!-- Card Product-->
                             <div
                                 class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                 <div class="card-img position-relative">
                                     <div class="card-badges">
                                         <span class="badge badge-card"><span
                                                 class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span> New
                                             In</span>
                                     </div>
                                     <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i
                                             class="ri-heart-line"></i></span>
                                     <picture class="position-relative overflow-hidden d-block bg-light">
                                         <img class="w-100 img-fluid position-relative z-index-10" title=""
                                             src="{{ asset('assets/images/products/product-8.jpg') }}"
                                             alt="">
                                     </picture>
                                     <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                         <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                             Add</button>
                                     </div>
                                 </div>
                                 <div class="card-body px-0">
                                     <a class="text-decoration-none link-cover" href="{{ route('product') }}">Nike
                                         Air Pegasus</a>
                                     <small class="text-muted d-block">3 colours, 10 sizes</small>
                                     <p class="mt-2 mb-0 small">$178.99</p>
                                 </div>
                             </div>
                             <!--/ Card Product-->
                         </div>
                         <div class="swiper-slide">
                             <!-- Card Product-->
                             <div
                                 class="card border border-transparent position-relative overflow-hidden h-100 transparent">
                                 <div class="card-img position-relative">
                                     <div class="card-badges">
                                         <span class="badge badge-card"><span
                                                 class="f-w-2 f-h-2 bg-success rounded-circle d-block me-1"></span> New
                                             In</span>
                                     </div>
                                     <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i
                                             class="ri-heart-line"></i></span>
                                     <picture class="position-relative overflow-hidden d-block bg-light">
                                         <img class="w-100 img-fluid position-relative z-index-10" title=""
                                             src="{{ asset('assets/images/products/product-1.jpg') }}"
                                             alt="">
                                     </picture>
                                     <div class="position-absolute start-0 bottom-0 end-0 z-index-20 p-2">
                                         <button class="btn btn-quick-add"><i class="ri-add-line me-2"></i> Quick
                                             Add</button>
                                     </div>
                                 </div>
                                 <div class="card-body px-0">
                                     <a class="text-decoration-none link-cover" href="{{ route('product') }}">Nike
                                         Air Jordans</a>
                                     <small class="text-muted d-block">3 colours, 10 sizes</small>
                                     <p class="mt-2 mb-0 small">$154.99</p>
                                 </div>
                             </div>
                             <!--/ Card Product-->
                         </div>
                     </div>

                     <!-- Add Arrows -->
                     <div
                         class="swiper-prev top-50  start-0 z-index-30 cursor-pointer transition-all bg-white px-3 py-4 position-absolute z-index-30 top-50 start-0 mt-n8 d-flex justify-content-center align-items-center opacity-50-hover">
                         <i class="ri-arrow-left-s-line ri-lg"></i>
                     </div>
                     <div
                         class="swiper-next top-50 end-0 z-index-30 cursor-pointer transition-all bg-white px-3 py-4 position-absolute z-index-30 top-50 end-0 mt-n8 d-flex justify-content-center align-items-center opacity-50-hover">
                         <i class="ri-arrow-right-s-line ri-lg"></i>
                     </div>


                 </div>
                 <!-- / Swiper Latest-->
             </div>
             <!-- / Related Products-->

             <!-- Reviews-->
             <div class="col-12" data-aos="fade-up">
                 <h3 class="fs-4 fw-bolder mt-7 mb-4 reviews">Đánh giá & Phản hồi</h3>

                 <!-- Review Summary-->
                 <div class="bg-light p-5 justify-content-between d-flex flex-column flex-lg-row">
                     <div class="d-flex flex-column align-items-center mb-4 mb-lg-0">
                         <div
                             class="bg-dark text-white f-w-24 f-h-24 d-flex rounded-circle align-items-center justify-content-center fs-2 fw-bold mb-3">
                             {{ round($feedbacks->sum('rating') / $feedbacks->count(), 1) }}</div>
                         <!-- Review Stars Medium-->
                         <div class="rating position-relative d-table">
                             <div class="position-absolute stars"
                                 style="width: {{ $feedbacks->sum('rating') / ($feedbacks->count() * 0.05) }}%">
                                 <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                 <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                 <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                 <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                                 <i class="ri-star-fill text-dark ri-2x mr-1"></i>
                             </div>
                             <div class="stars">
                                 <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                                 <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                                 <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                                 <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                                 <i class="ri-star-fill ri-2x mr-1 text-muted opacity-25"></i>
                             </div>
                         </div>
                     </div>
                     <div class="d-flex flex-grow-1 flex-column ms-lg-8">
                         <div class="d-flex align-items-center justify-content-start mb-2">
                             <div class="f-w-20">
                                 <!-- Review Stars Small-->
                                 <div class="rating position-relative d-table">
                                     <div class="position-absolute stars" style="width: 100%">
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                     </div>
                                     <div class="stars">
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                     </div>
                                 </div>
                             </div>
                             <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                                 <div class="progress-bar bg-dark" role="progressbar" style="width: 80%"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                             </div>
                             <span
                                 class="fw-bold small d-block f-w-4 text-end">{{ $feedbacks->where('rating', 5)->count() }}</span>
                         </div>
                         <div class="d-flex align-items-center justify-content-start mb-2">
                             <div class="f-w-20">
                                 <!-- Review Stars Small-->
                                 <div class="rating position-relative d-table">
                                     <div class="position-absolute stars" style="width: 80%">
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                     </div>
                                     <div class="stars">
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                     </div>
                                 </div>
                             </div>
                             <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                                 <div class="progress-bar bg-dark" role="progressbar" style="width: 60%"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                             </div>
                             <span
                                 class="fw-bold small d-block f-w-4 text-end">{{ $feedbacks->where('rating', 4)->count() }}</span>
                         </div>
                         <div class="d-flex align-items-center justify-content-start mb-2">
                             <div class="f-w-20">
                                 <!-- Review Stars Small-->
                                 <div class="rating position-relative d-table">
                                     <div class="position-absolute stars" style="width: 60%">
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                     </div>
                                     <div class="stars">
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                     </div>
                                 </div>
                             </div>
                             <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                                 <div class="progress-bar bg-dark" role="progressbar" style="width: 30%"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                             </div>
                             <span
                                 class="fw-bold small d-block f-w-4 text-end">{{ $feedbacks->where('rating', 3)->count() }}</span>
                         </div>
                         <div class="d-flex align-items-center justify-content-start mb-2">
                             <div class="f-w-20">
                                 <!-- Review Stars Small-->
                                 <div class="rating position-relative d-table">
                                     <div class="position-absolute stars" style="width: 40%">
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                     </div>
                                     <div class="stars">
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                     </div>
                                 </div>
                             </div>
                             <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                                 <div class="progress-bar bg-dark" role="progressbar" style="width: 8%"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                             </div>
                             <span
                                 class="fw-bold small d-block f-w-4 text-end">{{ $feedbacks->where('rating', 2)->count() }}</span>
                         </div>
                         <div class="d-flex align-items-center justify-content-start mb-2">
                             <div class="f-w-20">
                                 <!-- Review Stars Small-->
                                 <div class="rating position-relative d-table">
                                     <div class="position-absolute stars" style="width: 20%">
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                         <i class="ri-star-fill text-dark mr-1"></i>
                                     </div>
                                     <div class="stars">
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                         <i class="ri-star-fill mr-1 text-muted opacity-25"></i>
                                     </div>
                                 </div>
                             </div>
                             <div class="progress d-flex flex-grow-1 mx-4 f-h-1">
                                 <div class="progress-bar bg-dark" role="progressbar" style="width: 5%"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                             </div>
                             <span
                                 class="fw-bold small d-block f-w-4 text-end">{{ $feedbacks->where('rating', 1)->count() }}</span>
                         </div>
                         <p class="mt-3 mb-0 d-flex align-items-start"><i class="ri-chat-voice-line me-2"></i>
                             {{ $feedbacks->count() }}
                             đánh giá</p>
                     </div>
                 </div><!-- / Rewview Summary-->

                 <!-- Reviews-->
                 <div id="comment-container" class="row g-6 g-md-8 g-lg-10 my-3">
                     @include('partials.feedback', ['comments' => $comments])
                 </div>
                 <!-- / Reviews-->

                 <!-- Review Pagination-->
                 @if ($comments->hasMorePages())
                     <div class="d-flex flex-column f-w-44 mx-auto my-5 text-center">
                         <small class="text-muted">Hiển thị <strong
                                 id="comment-display">{{ $comments->perPage() * $comments->currentPage() }}</strong>
                             trong số
                             {{ $comments->total() }} phản hồi</small>
                         <div class="progress f-h-1 mt-3">
                             <div class="progress-bar bg-dark" role="progressbar" style="width: 25%"
                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                         </div>
                         <button id="load-more" data-next-page="{{ $comments->currentPage() + 1 }}" href="#"
                             class="btn btn-outline-dark btn-sm mt-5 align-self-center py-3 px-4 border-2">Tải
                             thêm</button>
                     </div>
                 @endif
                 <!-- / Review Pagination-->
             </div>
             <!-- / Reviews-->
         </div>
     </div>
     <!-- /Page Content -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
         $('#load-more').on('click', function() {
             let button = $(this);
             let nextPage = button.data('next-page');
             let baseUrl = new URL(window.location.href);
             baseUrl.searchParams.set('page', nextPage);
             let finalUrl = baseUrl.toString();
             let comment_display = $('#comment-display');
             let total_comment = {{$comments->total()}};

                 $.ajax({
                     url: finalUrl,
                     type: 'GET',
                     beforeSend: function() {
                         button.text('Đang tải...');
                     },
                     success: function(data) {
                         $('#comment-container').append(data);
                         button.data('next-page', nextPage + 1);
                         comment_display.text(nextPage * 6);
                         // Ẩn nút nếu không còn trang tiếp theo
                         $.get('?page=' + (nextPage + 1), function(response) {
                             if (response.trim() === '') {
                                 button.remove();
                                 comment_display.text(total_comment);
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
 </section>
 <!-- / Main Section-->
 <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
 <script>
     const productId = {{ $product->id }};

     document.querySelectorAll('.color-radio').forEach(radio => {
         radio.addEventListener('change', function() {
             const selectedColorId = this.value;
             const sizeArea = document.getElementById('size-options');
             sizeArea.innerHTML = '<p class="text-info">Đang tải kích cỡ...</p>';

             axios.get('/get-sizes-by-color', {
                     params: {
                         product_id: productId,
                         color_id: selectedColorId
                     }
                 })
                 .then(response => {
                     const sizes = response.data;
                     if (sizes.length === 0) {
                         sizeArea.innerHTML =
                             '<p class="text-danger">Không có kích cỡ cho màu này.</p>';
                         return;
                     }

                     sizeArea.innerHTML = '';
                     sizes.forEach(size => {
                         const label = document.createElement('label');
                         label.className = 'me-3';

                         const input = document.createElement('input');
                         input.type = 'radio';
                         input.name = 'size_id';
                         input.value = size.id;

                         label.appendChild(input);
                         label.appendChild(document.createTextNode(' ' + size.name));
                         sizeArea.appendChild(label);
                     });
                 })
                 .catch(error => {
                     console.error(error);
                     sizeArea.innerHTML = '<p class="text-danger">Lỗi khi tải kích cỡ.</p>';
                 });
         });
     });
 </script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 @auth
     <script>
         document.getElementById('add-to-cart-form').addEventListener('submit', function(e) {
             e.preventDefault();

             const form = e.target;
             const product_id = form.product_id.value;
             const color_id = form.color_id?.value;
             const size_id = form.size_id?.value;

             if (!color_id || !size_id) {
                 document.getElementById('cart-message').innerHTML =
                     '<p class="text-danger">Vui lòng chọn màu và kích cỡ.</p>';
                 return;
             }

             axios.post('/cart/add', {
                 product_id: product_id,
                 color_id: color_id,
                 size_id: size_id,
                 quantity: 1,
             }).then(res => {
                 Swal.fire({
                     icon: 'success',
                     title: 'Đã thêm vào giỏ hàng',
                     showConfirmButton: false,
                     timer: 1500
                 });
             }).catch(err => {
                 Swal.fire({
                     icon: 'error',
                     title: 'Lỗi',
                     text: 'Không thể thêm vào giỏ hàng.'
                 });
             });
         });
     </script>
 @endauth
 @guest
     <script>
         document.getElementById('add-to-cart-form').addEventListener('submit', function(e) {

             $.ajax({
                 url: '{{ route('login') }}',
                 method: 'GET',
                 data: {},
                 success: function(response) {
                     // Chuyển hướng đến trang đăng nhập
                     window.location.href = '{{ route('login') }}'; // hoặc '/login'
                 }
             });
         });
     </script>
 @endguest

@foreach ($products as $product)
    <div class="col-12 col-sm-6 col-lg-4">
        <!-- Card Product-->
        <div class="card border border-transparent position-relative overflow-hidden h-100 transparent">
            <div class="card-img position-relative">
                <div class="card-badges">
                    <span class="badge badge-card"><span class="f-w-2 f-h-2 bg-danger rounded-circle d-block me-1"></span>
                        Sale</span>
                </div>
                <span class="position-absolute top-0 end-0 p-2 z-index-20 text-muted"><i class="ri-heart-line"></i></span>
                <picture class="position-relative overflow-hidden d-block bg-light">
                    @if ($product->image)
                        <img class="w-100 img-fluid position-relative z-index-10" title=""
                            src="{{ asset($product->image) }}" alt="">
                    @endif
                </picture>
                {{-- <form action="{{ route('cart.add') }}" method="POST"
                    class="position-absolute start-0 bottom-0 end-0 z-index-40 p-2">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-quick-add"><i class="ri-add-line me-2 z-index-20"></i> Quick
                        Add</button>
                </form> --}}
                <div class="position-absolute start-0 bottom-0 end-0 p-2">
                    <button class="add-to-cart-btn btn btn-quick-add"
                 data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}" data-image="{{ $product->image}}">
                    Xem chi tiết
                </button>
                </div>
                
            </div>
            <div class="card-body px-0">
                <a class="text-decoration-none link-cover"
                    href="{{ route('products.detail', $product->id) }}">{{ $product->name }}</a>
                <small class="text-muted d-block">{{ $product->description }}</small>
                <p class="mt-2 mb-0 small"><s class="text-muted">{{ isset($product->promote) ? number_format($product->price).'₫' : '' }}</s> <span
                        class="text-danger"> {{ isset($product->promote) ? number_format($product->price * $product->promote) : number_format($product->price) }}₫</span></p>
            </div>
        </div>
        <!--/ Card Product-->
    </div>
@endforeach

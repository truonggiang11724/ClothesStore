@foreach ($comments as $comment)
    <div class="col-12 col-lg-6 col-xxl-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Review Stars Small-->
            <div class="rating position-relative d-table">
                <div class="position-absolute stars" style="width: {{ $comment->rating / 0.05 }}%">
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
            <div class="text-muted small">{{ $comment->created_at }}</div>
        </div>
        <p class="fw-bold mb-2">{{ $comment->user->name }}</p>
        <p class="fs-7">{{ $comment->comment }}</p>
    </div>
@endforeach

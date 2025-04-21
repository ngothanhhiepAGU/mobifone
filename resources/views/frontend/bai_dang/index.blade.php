@extends('layouts.frontend')

@section('content')
<style>
    .breadcrumb-mobifone h2 {
        font-size: 1rem;
        margin: 0;
    }
    .breadcrumb-more-than {
        margin: 0 0.5rem;
        color: #999;
    }
    .post-item:hover,
    .news-item:hover {
        transform: translateY(-2px);
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }
    .post-item .post-image img,
    .news-item img {
        transition: transform 0.3s ease;
    }
    .post-item:hover img,
    .news-item:hover img {
        transform: scale(1.03);
    }
    .featured-post {
        background: linear-gradient(135deg, #f8fbff, #ffffff);
        border-left: 5px solid #007bff;
    }
    .btn-outline-primary {
        border-radius: 30px;
    }
</style>

<main class="l-main box-news py-4">
    <div class="main-content container">
        <div class="inner">

            <!-- Breadcrumb -->
            <div class="content-title is-desktop breadcrumb-mobifone mb-4 d-flex align-items-center gap-2">
                <h2><a href="{{ url('/') }}" class="text-decoration-none text-dark">Trang chủ</a></h2>
                <span class="breadcrumb-more-than">›</span>
                <h2 class="text-primary">Bài đăng</h2>
            </div>

            <!-- Bài đăng chính -->
            <div class="events-content news-page mb-5">
                <div class="content-body">
                    <div class="main-posts">
                        @foreach ($tinChinh as $tin)
                        <div class="post-item {{ $loop->first ? 'featured-post' : '' }} d-md-flex gap-4 mb-4 p-3 border rounded shadow-sm bg-white">
                            <div class="post-image flex-shrink-0" style="max-width: 320px;">
                                <a href="{{ route('bai_dang.show', $tin->id) }}">
                                    <img src="{{ asset($tin->hinh_anh ?? 'images/default.jpg') }}" alt="{{ $tin->tieu_de }}" class="img-fluid rounded w-100" style="object-fit: cover; height: 200px;">
                                </a>
                            </div>
                            <div class="post-content">
                                <p class="meta text-muted small mb-1">
                                    <strong class="text-primary">{{ $tin->the_loai ?? 'Khác' }}</strong> | {{ $tin->ngay_dang->format('d/m/Y') }}
                                </p>
                                <h3 class="title h5 fw-bold mb-2">
                                    <a href="{{ route('bai_dang.show', $tin->id) }}" class="text-dark text-decoration-none">{{ $tin->tieu_de }}</a>
                                </h3>
                                <p class="excerpt text-muted mb-2">{{ \Illuminate\Support\Str::limit(strip_tags($tin->noi_dung), 150) }}</p>
                                @if ($loop->first)
                                <a href="{{ route('bai_dang.show', $tin->id) }}" class="btn btn-primary btn-sm mt-2 px-4">Xem thêm</a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Bài đăng khác -->
            <div class="other-news mt-5">
                <div class="title mb-3 fs-5 fw-bold text-uppercase">Bài đăng khác</div>
                <div class="row g-4">
                    @foreach ($tinKhac as $tin)
                    <div class="col-md-4 col-sm-6">
                        <div class="news-item border rounded overflow-hidden shadow-sm h-100 bg-white d-flex flex-column">
                            <a href="{{ route('bai_dang.show', $tin->id) }}">
                                <img src="{{ asset($tin->hinh_anh ?? 'images/default.jpg') }}" alt="{{ $tin->tieu_de }}" class="img-fluid w-100" style="height: 180px; object-fit: cover;">
                            </a>
                            <div class="news-content p-3 flex-grow-1 d-flex flex-column">
                                <p class="meta text-muted small mb-1">
                                    <i class="fa fa-calendar-alt me-1"></i> {{ $tin->the_loai ?? 'Khác' }} | {{ $tin->ngay_dang->format('d/m/Y') }}
                                </p>
                                <h3 class="title h6 fw-semibold mb-2 flex-grow-1">
                                    <a href="{{ route('bai_dang.show', $tin->id) }}" class="text-dark text-decoration-none">{{ $tin->tieu_de }}</a>
                                </h3>
                                <a href="{{ route('bai_dang.show', $tin->id) }}" class="text-primary mt-auto small">Xem chi tiết →</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('bai_dang.index') }}" class="btn btn-outline-primary px-5">Xem thêm bài viết</a>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection

@extends('layouts.frontend')

@section('content')
<main class="l-main box-news">
    <div class="main-content">
        <div class="inner">
            <!-- Breadcrumb -->
            <div class="content-title is-desktop breadcrumb-mobifone">
                <h2><a href="{{ url('/') }}">Trang chủ</a></h2>
                <span class="breadcrumb-more-than"></span>
                <h2 class="text-primary">Bài đăng</h2>
            </div>

            <!-- Bài đăng chính -->
            <div class="events-content news-page">
                <div class="content-body">
                    <div class="main-posts">
                        @foreach ($tinChinh as $tin)
                        <div class="post-item {{ $loop->first ? 'featured-post' : '' }}">
                            <div class="post-image">
                                <a href="{{ route('bai_dang.show', $tin->id) }}">
                                    <img src="{{ $tin->image_url }}" alt="{{ $tin->tieu_de }}">
                                </a>
                            </div>
                            <div class="post-content">
                                <p class="meta">
                                    <span>{{ $tin->the_loai ?? 'Khác' }}</span> | 
                                    <span>{{ $tin->ngay_dang->format('d/m/Y') }}</span>
                                </p>
                                <h3 class="title">
                                    <a href="{{ route('bai_dang.show', $tin->id) }}">{{ $tin->tieu_de }}</a>
                                </h3>
                                <p class="excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($tin->noi_dung), 150) }}</p>
                                @if ($loop->first)
                                <p class="more">
                                    <a href="{{ route('bai_dang.show', $tin->id) }}" class="btn btn-primary">Xem thêm</a>
                                </p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Bài đăng khác -->
            <div class="other-news mt-5">
                <div class="title mb-3">Bài đăng khác</div>
                <div class="other-news__content d-flex flex-wrap gap-4">
                    @foreach ($tinKhac as $tin)
                    <div class="news-item" style="width: 270px;">
                        <div class="news-image">
                            <a href="{{ route('bai_dang.show', $tin->id) }}">
                                <img src="{{ $tin->image_url }}" alt="{{ $tin->tieu_de }}">
                            </a>
                        </div>
                        <div class="news-content p-2">
                            <p class="meta text-muted small mb-1">
                                {{ $tin->the_loai ?? 'Khác' }} | {{ $tin->ngay_dang->format('d/m/Y') }}
                            </p>
                            <h3 class="title h6">
                                <a href="{{ route('bai_dang.show', $tin->id) }}">{{ $tin->tieu_de }}</a>
                            </h3>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('bai_dang.index') }}" class="btn btn-outline-primary">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

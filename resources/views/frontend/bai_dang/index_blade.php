@extends('layouts.app')

@section('content')
<main class="l-main box-news">
    <div class="main-content">
        <div class="inner">
            <!-- Tiêu đề -->
            <div class="content-title is-desktop breadcrumb-mobifone">
                <h2><a href="{{ url('/') }}">Trang chủ</a></h2>
                <span class="breadcrumb-more-than"></span>
                <h2 class="text-primary">Bài đăng</h2>
            </div>

            <!-- Bài đăng chính -->
            <div class="events-content news-page">
                <div class="content-body">
                    @foreach ($tinChinh as $tin)
                    <div class="m-card {{ $loop->first ? 'events' : 'event-nd' }}">
                        <div class="{{ $loop->first ? 'content-image' : 'event-image' }}">
                            <a href="{{ route('bai_dang.show', $tin->id) }}">
                                <img src="{{ $tin->image_url }}" alt="{{ $tin->tieu_de }}">
                            </a>
                        </div>
                        <div class="{{ $loop->first ? 'm-card-body' : 'event-nd-content' }}">
                            <p class="content">
                                <span class="icon-event-link"></span>
                                <a href="{{ route('bai_dang.show', $tin->id) }}">{{ $tin->tieu_de }}</a>
                            </p>
                            @if ($loop->first)
                            <p class="des">{{ Str::limit($tin->noi_dung, 150) }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Bài đăng khác -->
            <div class="other-news mt-5">
                <div class="title">Bài đăng khác</div>
                <div class="other-news__content d-flex flex-wrap gap-4">
                    @foreach ($tinKhac as $tin)
                    <div class="news-item" style="width: 270px;">
                        <div class="news-image">
                            <a href="{{ route('bai_dang.show', $tin->id) }}">
                                <img src="{{ $tin->image_url }}" alt="{{ $tin->tieu_de }}">
                            </a>
                        </div>
                        <div class="news-content">
                            <h3 class="title">
                                <a href="{{ route('bai_dang.show', $tin->id) }}">{{ $tin->tieu_de }}</a>
                            </h3>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

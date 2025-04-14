@extends('layouts.app') {{-- Hoặc layout bạn đang dùng --}}

@section('content')
<main class="l-main box-news">
    <div class="main-content">
        <div class="inner">
            <div class="content-title is-desktop breadcrumb-mobifone">
                <h2><a href="{{ url('/') }}">Trang chủ</a></h2>
                <span class="breadcrumb-more-than"></span>
                <h2 class="text-primary">Tin tức</h2>
            </div>
            <div class="content-header">
                <h2 class="title title-mobile">Tin tức</h2>
                <div class="dropdown dropdown-mobile">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                        Tất cả
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Tất cả</a>
                        <a class="dropdown-item" href="#">Tin khuyến mại</a>
                        <a class="dropdown-item" href="#">Tin tức sự kiện</a>
                        <a class="dropdown-item" href="#">Thông cáo báo chí</a>
                    </div>
                </div>
            </div>
            <div class="box-tab">
                <ul class="events-menu is-desktop">
                    <li class="active"><a href="#">Tất cả</a></li>
                    <li><a href="#">Tin khuyến mại</a></li>
                    <li><a href="#">Tin tức sự kiện</a></li>
                    <li><a href="#">Thông cáo báo chí</a></li>
                </ul>
            </div>

            <!-- Tin chính -->
            <div class="events-content news-page">
                <div class="content-body">
                    @foreach ($tinChinh as $tin)
                    <div class="m-card {{ $loop->first ? 'events' : 'event-nd' }}">
                        <div class="{{ $loop->first ? 'content-image' : 'event-image' }}">
                            <a href="{{ route('tin_tuc.show', $tin->id) }}">
                                <img src="{{ $tin->image_url }}" alt="{{ $tin->tieu_de }}">
                            </a>
                        </div>
                        <div class="{{ $loop->first ? 'm-card-body' : 'event-nd-content' }}">
                            <p class="title">{{ $tin->loai }}</p>
                            <p class="content">
                                <span class="icon-event-link"></span>
                                <a href="{{ route('tin_tuc.show', $tin->id) }}">{{ $tin->tieu_de }}</a>
                            </p>
                            @if ($loop->first)
                            <p class="des">{{ $tin->mo_ta }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Tin khác -->
            <div class="other-news mt-5">
                <div class="title">Tin tức khác</div>
                <div class="other-news__content d-flex flex-wrap gap-4">
                    @foreach ($tinKhac as $tin)
                    <div class="news-item" style="width: 270px;">
                        <div class="news-image">
                            <a href="{{ route('tin_tuc.show', $tin->id) }}">
                                <img src="{{ $tin->image_url }}" alt="{{ $tin->tieu_de }}">
                            </a>
                        </div>
                        <div class="news-content">
                            <h3 class="title">
                                <a href="{{ route('tin_tuc.show', $tin->id) }}">{{ $tin->tieu_de }}</a>
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

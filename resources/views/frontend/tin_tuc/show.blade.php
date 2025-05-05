@extends('layouts.app')

@section('content')
<main class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">

            <!-- Tiêu đề -->
            <h1 class="mb-3 text-primary">{{ $baiDang->tieu_de }}</h1>

            <!-- Meta -->
            <div class="mb-3 text-muted small">
                @if ($baiDang->ngay_dang)
                    <span><i class="bi bi-calendar"></i> {{ \Carbon\Carbon::parse($baiDang->ngay_dang)->format('d/m/Y') }}</span>
                @endif
                @if ($baiDang->the_loai)
                    <span class="ms-3"><i class="bi bi-tags"></i> {{ $baiDang->the_loai }}</span>
                @endif
                @if ($baiDang->tac_gia)
                    <span class="ms-3"><i class="bi bi-person"></i> {{ $baiDang->tac_gia }}</span>
                @endif
            </div>

            <!-- Hình ảnh -->
            @if ($baiDang->hinh_anh)
            <div class="mb-4">
                <img src="{{ asset($baiDang->hinh_anh) }}" alt="{{ $baiDang->tieu_de }}" class="img-fluid rounded shadow-sm">
            </div>
            @endif

            <!-- Nội dung -->
            <div class="content" style="line-height: 1.8;">
                {!! $baiDang->noi_dung !!}
            </div>

            <!-- Quay lại -->
            <div class="mt-5">
                <a href="{{ route('bai_dang.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Quay về danh sách
                </a>
            </div>

        </div>
    </div>
</main>
@endsection

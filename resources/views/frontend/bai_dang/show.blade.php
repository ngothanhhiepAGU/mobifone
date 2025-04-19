@extends('layouts.app')

@section('content')
<main class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="mb-3">{{ $baiDang->tieu_de }}</h1>
            <p class="text-muted mb-4">
                @if($baiDang->ngay_dang)
                    Ngày đăng: {{ \Carbon\Carbon::parse($baiDang->ngay_dang)->format('d/m/Y') }}
                @endif
            </p>
            <div>
                <img src="{{ $baiDang->image_url }}" alt="{{ $baiDang->tieu_de }}" class="img-fluid mb-4">
            </div>
            <div class="content">
                {!! nl2br(e($baiDang->noi_dung)) !!}
            </div>
        </div>
    </div>
</main>
@endsection

@extends('layouts.app')

@section('content')
<main class="container py-4">
    <div class="row">
        <div class="col-md-9 mx-auto">
            <h1 class="mb-3">{{ $baiDang->tieu_de }}</h1>
            <p class="text-muted">
                @if($baiDang->ngay_dang)
                    Ngày đăng: {{ \Carbon\Carbon::parse($baiDang->ngay_dang)->format('d/m/Y') }}
                @endif
                @if($baiDang->tac_gia)
                    | Tác giả: {{ $baiDang->tac_gia }}
                @endif
            </p>
            <img src="{{ $baiDang->image_url }}" alt="Hình ảnh" class="img-fluid mb-4">
            <div class="noi-dung">
                {!! nl2br(e($baiDang->noi_dung)) !!}
            </div>
        </div>
    </div>
</main>
@endsection

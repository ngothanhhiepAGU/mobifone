@extends('layouts.frontend') {{-- Layout của bạn --}}
@section('content')
<div class="tab-content" id="serviceTabsContent">
  <div class="tab-pane fade show active" id="data" role="tabpanel">
    <div class="row">
      @foreach($goiCuocs as $goi)
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5 class="card-title mb-0">{{ $goi->ten_goi }}</h5>
              <img src="{{ asset('images/slide/title.svg') }}" alt="icon" width="32">
            </div>
            <p class="mb-2">
              <img src="{{ asset('images/slide/wallet.svg') }}" alt="" width="20" class="me-2">
              {{ number_format($goi->gia, 0, ',', '.') }} đ / 
              {{ $goi->thoi_han ?? 'Không xác định' }}
            </p>
            <p class="mb-3">
              <img src="{{ asset('images/slide/box-time.svg') }}" alt="" width="20" class="me-2">
              {{ $goi->mo_ta ?? 'Không có thông tin' }}
            </p>
            <a href="#" class="btn btn-primary w-100">Đăng ký</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="text-center mt-3">
      <a href="{{ route('frontend.goi_cuoc.index') }}" class="btn btn-link">Xem tất cả</a>
    </div>
  </div>

  <div class="tab-pane fade" id="charge" role="tabpanel">Đang cập nhật...</div>
</div>
@endsection

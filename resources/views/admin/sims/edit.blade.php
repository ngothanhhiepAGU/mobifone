@extends('layouts.app')  <!-- Kế thừa layout chính của bạn -->

@section('content')
<div class="container">
    <h2>Chỉnh sửa SIM</h2>

    <!-- Form chỉnh sửa SIM -->
    <form action="{{ route('admin.sims.update', $sim->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="so_sim">Số SIM</label>
            <input type="text" name="so_sim" id="so_sim" class="form-control" value="{{ $sim->so_sim }}" required>
        </div>

        <div class="form-group">
            <label for="loai_sim">Loại SIM</label>
            <select name="loai_sim" id="loai_sim" class="form-control">
                <option value="Trả trước" {{ $sim->loai_sim == 'Trả trước' ? 'selected' : '' }}>Trả trước</option>
                <option value="Trả sau" {{ $sim->loai_sim == 'Trả sau' ? 'selected' : '' }}>Trả sau</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nha_mang">Nhà mạng</label>
            <input type="text" name="nha_mang" id="nha_mang" class="form-control" value="{{ $sim->nha_mang }}" required>
        </div>

        <div class="form-group">
            <label for="trang_thai">Trạng thái</label>
            <select name="trang_thai" id="trang_thai" class="form-control">
                <option value="chua kich hoat" {{ $sim->trang_thai == 'chua kich hoat' ? 'selected' : '' }}>Chưa kích hoạt</option>
                <option value="da kich hoat" {{ $sim->trang_thai == 'da kich hoat' ? 'selected' : '' }}>Đã kích hoạt</option>
                <option value="chua kich hoat" {{ $sim->trang_thai == 'chua kich hoat' ? 'selected' : '' }}>Chưa kích hoạt</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ngay_kich_hoat">Ngày kích hoạt</label>
            <input type="date" name="ngay_kich_hoat" id="ngay_kich_hoat" class="form-control" value="{{ $sim->ngay_kich_hoat ? $sim->ngay_kich_hoat->format('Y-m-d') : '' }}">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật SIM</button>
    </form>
</div>
@endsection

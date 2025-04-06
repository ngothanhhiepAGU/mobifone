@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Tạo mới SIM</h2>
    
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>Nhập thông tin SIM</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.sims.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="so_sim">Số SIM</label>
                    <input type="text" name="so_sim" id="so_sim" class="form-control" required placeholder="Nhập số SIM">
                </div>

                <div class="form-group">
                    <label for="loai_sim">Loại SIM</label>
                    <select name="loai_sim" id="loai_sim" class="form-control" required>
                        <option value="Trả trước">Trả trước</option>
                        <option value="Trả sau">Trả sau</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nha_mang">Nhà Mạng</label>
                    <input type="text" name="nha_mang" id="nha_mang" class="form-control" required placeholder="Nhập tên nhà mạng">
                </div>

                <div class="form-group">
                    <label for="trang_thai">Trạng Thái</label>
                    <select name="trang_thai" id="trang_thai" class="form-control" required>
                        <option value="kich hoat">Kích Hoạt</option>
                        <option value="chua kich hoat">Chưa Kích Hoạt</option>
                        <option value="chan">Chặn</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ngay_kich_hoat">Ngày Kích Hoạt</label>
                    <input type="date" name="ngay_kich_hoat" id="ngay_kich_hoat" class="form-control" required>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success">Lưu SIM</button>
                    <a href="{{ route('admin.sims.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

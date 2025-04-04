<!-- resources/views/admin/sims/create.blade.php -->
@extends('layouts.admin')

@section('content')
    <h2>Tạo mới SIM</h2>

    <form action="{{ route('admin.sims.store') }}" method="POST">
        @csrf
        <div>
            <label for="so_sim">Số SIM:</label>
            <input type="text" name="so_sim" id="so_sim" required>
        </div>
        <div>
            <label for="loai_sim">Loại SIM:</label>
            <input type="text" name="loai_sim" id="loai_sim" required>
        </div>
        <div>
            <label for="nha_mang">Nhà Mạng:</label>
            <input type="text" name="nha_mang" id="nha_mang" required>
        </div>
        <div>
            <label for="trang_thai">Trạng Thái:</label>
            <select name="trang_thai" id="trang_thai" required>
                <option value="kich hoat">Kích Hoạt</option>
                <option value="chua kich hoat">Chưa Kích Hoạt</option>
                <option value="chan">Chặn</option>
            </select>
        </div>
        <div>
            <label for="ngay_kich_hoat">Ngày Kích Hoạt:</label>
            <input type="date" name="ngay_kich_hoat" id="ngay_kich_hoat">
        </div>
        <button type="submit">Lưu</button>
    </form>
@endsection

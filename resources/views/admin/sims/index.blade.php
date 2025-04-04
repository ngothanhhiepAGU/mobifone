@extends('layouts.admin')

@section('content')
    <h2>Danh sách SIM</h2>
    <a href="{{ route('admin.sims.create') }}">Tạo mới SIM</a>
    
    <table>
        <thead>
            <tr>
                <th>Số SIM</th>
                <th>Loại SIM</th>
                <th>Nhà Mạng</th>
                <th>Trạng Thái</th>
                <th>Ngày Kích Hoạt</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sims as $sim)
                <tr>
                    <td>{{ $sim->so_sim }}</td>
                    <td>{{ $sim->loai_sim }}</td>
                    <td>{{ $sim->nha_mang }}</td>
                    <td>{{ $sim->trang_thai }}</td>
                    <td>{{ $sim->ngay_kich_hoat }}</td>
                    <td>
                        <a href="{{ route('admin.sims.edit', $sim->id) }}">Chỉnh sửa</a>
                        <form action="{{ route('admin.sims.destroy', $sim->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

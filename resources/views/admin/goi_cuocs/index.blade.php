@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Quản lý Gói Cước</h2>

    <!-- Nút Thêm Gói Cước -->
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalThemGoiCuoc">
        <i class="fas fa-plus"></i> Thêm Gói Cước
    </button>

    <!-- Danh sách Gói Cước -->
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên Gói Cước</th>
                    <th>Nhà Mạng</th>
                    <th>Giá</th>
                    <th>Thời Hạn</th>
                    <th>Cú pháp</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="danhSachGoiCuoc">
                @foreach ($goiCuocs as $goiCuoc)
                <tr id="goiCuoc_{{ $goiCuoc->id }}">
                    <td>{{ $goiCuoc->id }}</td>
                    <td>{{ $goiCuoc->ten_goi }}</td>
                    <td>{{ $goiCuoc->nha_mang }}</td>
                    <td>{{ number_format($goiCuoc->gia, 0, ',', '.') }} VND</td>
                    <td>{{ $goiCuoc->thoi_han }} ngày</td>
                    <td>{{ $goiCuoc->cu_phap }}</td>

                    <td>
                        <button class="btn btn-warning btn-sm"
                            onclick="moModalSuaGoiCuoc({{ $goiCuoc->id }}, '{{ $goiCuoc->ten_goi }}', '{{ $goiCuoc->nha_mang }}', {{ $goiCuoc->gia }}, {{ $goiCuoc->thoi_han }})">
                            <i class="fas fa-edit"></i> Sửa
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="xoaGoiCuoc({{ $goiCuoc->id }})">
                            <i class="fas fa-trash"></i> Xóa
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Thêm Gói Cước -->
<div class="modal fade" id="modalThemGoiCuoc" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm Gói Cước</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formThemGoiCuoc">
                    @csrf
                    <div class="mb-3">
                        <label>Tên Gói Cước</label>
                        <input type="text" class="form-control" name="ten_goi" required>
                    </div>
                    <div class="mb-3">
                        <label>Nhà Mạng</label>
                        <input type="text" class="form-control" name="nha_mang" required>
                    </div>
                    <div class="mb-3">
                        <label>Giá</label>
                        <input type="number" class="form-control" name="gia" required>
                    </div>
                    <div class="mb-3">
                        <label>Thời Hạn</label>
                        <input type="number" class="form-control" name="thoi_han" required>
                    </div>
                    <div class="mb-3">
                        <label>Cú pháp</label>
                        <input type="text" class="form-control" name="cu_phap" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sửa Gói Cước -->
<div class="modal fade" id="modalSuaGoiCuoc" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa Gói Cước</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formSuaGoiCuoc">
                    @csrf
                    <input type="hidden" id="goiCuoc_id_sua" name="goiCuoc_id">
                    <div class="mb-3">
                        <label class="form-label">Tên Gói Cước</label>
                        <input type="text" class="form-control" id="ten_goi_sua" name="ten_goi" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nhà Mạng</label>
                        <input type="text" class="form-control" id="nha_mang_sua" name="nha_mang" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giá</label>
                        <input type="number" class="form-control" id="gia_sua" name="gia" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thời Hạn</label>
                        <input type="number" class="form-control" id="thoi_han_sua" name="thoi_han" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cú pháp</label>
                        <input type="text" class="form-control" id="cu_phap_sua" name="cu_phap" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    // Thêm Gói Cước
    $('#formThemGoiCuoc').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: "{{ route('admin.goi-cuocs.store') }}",
            type: "POST",
            data: formData,
            success: function (response) {
                Swal.fire("Thành công!", response.message, "success");
                $('#modalThemGoiCuoc').modal('hide');
                setTimeout(() => location.reload(), 1000);
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                let msg = '';
                for (let field in errors) {
                    msg += errors[field].join('<br>') + '<br>';
                }
                Swal.fire("Lỗi!", msg, "error");
            }
        });
    });

    // Cập nhật Gói Cước
    $('#formSuaGoiCuoc').submit(function (event) {
        event.preventDefault();

        let goiCuoc_id = $('#goiCuoc_id_sua').val();
        let formData = $(this).serialize();

        $.ajax({
            url: "/admin/goi_cuoc/" + goiCuoc_id, 
            type: "POST",
            data: formData + "&_method=PUT",
            success: function () {
                Swal.fire("Thành công!", "Gói Cước đã được cập nhật.", "success");
                location.reload();
            },
            error: function (xhr) {
                Swal.fire("Lỗi!", "Không thể cập nhật Gói Cước: " + xhr.responseText, "error");
            }
        });
    });
});

// Mở modal sửa Gói Cước
function moModalSuaGoiCuoc(id, ten_goi, nha_mang, gia, thoi_han, cu_phap) {
    $('#goiCuoc_id_sua').val(id);
    $('#ten_goi_sua').val(ten_goi);
    $('#nha_mang_sua').val(nha_mang);
    $('#gia_sua').val(gia);
    $('#thoi_han_sua').val(thoi_han);
    $('#cu_phap_sua').val(cu_phap);
    $('#modalSuaGoiCuoc').modal('show');
}

// Xóa Gói Cước
function xoaGoiCuoc(id) {
    Swal.fire({
        title: "Bạn có chắc chắn muốn xóa?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Xóa",
        cancelButtonText: "Hủy"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/goi_cuoc/" + id,
                type: "POST",
                data: { _method: "DELETE", _token: "{{ csrf_token() }}" },
                success: function () {
                    Swal.fire("Đã xóa!", "Gói cước đã được xóa.", "success");
                    $('#goiCuoc_' + id).remove();
                },
                error: function () {
                    Swal.fire("Lỗi!", "Không thể xóa Gói Cước.", "error");
                }
            });
        }
    });
}
</script>
@endsection

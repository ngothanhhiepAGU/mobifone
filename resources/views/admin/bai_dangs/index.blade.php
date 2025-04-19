@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Quản lý Bài Đăng</h2>

    <!-- Nút Thêm Bài Đăng -->
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalThemBaiDang">
        <i class="fas fa-plus"></i> Thêm Bài Đăng
    </button>

    <!-- Danh sách Bài Đăng -->
    <div class="table-responsive mt-3">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Tác giả</th>
                    <th>Ngày đăng</th>
                    <th>Thể loại</th> <!-- Thêm cột thể loại -->
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="danhSachBaiDang">
                @foreach ($baiDangs as $baiDang)
                <tr id="baiDang_{{ $baiDang->id }}">
                    <td>{{ $baiDang->id }}</td>
                    <td>{{ $baiDang->tieu_de }}</td>
                    <td>{{ $baiDang->tac_gia }}</td>
                    <td>{{ $baiDang->ngay_dang }}</td>
                    <td>{{ $baiDang->the_loai ?? 'Chưa có' }}</td> <!-- Hiển thị thể loại -->
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="moModalSuaBaiDang({{ $baiDang->id }}, '{{ $baiDang->tieu_de }}', '{{ $baiDang->noi_dung }}', '{{ $baiDang->tac_gia }}', '{{ $baiDang->the_loai }}')">
                            <i class="fas fa-edit"></i> Sửa
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="xoaBaiDang({{ $baiDang->id }})">
                            <i class="fas fa-trash"></i> Xóa
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Thêm Bài Đăng -->
<div class="modal fade" id="modalThemBaiDang" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm Bài Đăng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formThemBaiDang">
                    @csrf
                    <div class="mb-3">
                        <label>Tiêu đề</label>
                        <input type="text" class="form-control" name="tieu_de" required>
                    </div>
                    <div class="mb-3">
                        <label>Nội dung</label>
                        <textarea class="form-control" name="noi_dung" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Tác giả</label>
                        <input type="text" class="form-control" name="tac_gia" required>
                    </div>
                    <div class="mb-3">
                        <label>Thể loại</label>
                        <input type="text" class="form-control" name="the_loai" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sửa Bài Đăng -->
<div class="modal fade" id="modalSuaBaiDang" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa Bài Đăng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formSuaBaiDang">
                    @csrf
                    <input type="hidden" id="baiDang_id_sua" name="baiDang_id">
                    <div class="mb-3">
                        <label class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="tieu_de_sua" name="tieu_de" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nội dung</label>
                        <textarea class="form-control" id="noi_dung_sua" name="noi_dung" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tác giả</label>
                        <input type="text" class="form-control" id="tac_gia_sua" name="tac_gia" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thể loại</label>
                        <input type="text" class="form-control" id="the_loai_sua" name="the_loai" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    // Thêm Bài Đăng
    $('#formThemBaiDang').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: "{{ route('admin.bai-dangs.store') }}",
            type: "POST",
            data: formData,
            success: function (response) {
                Swal.fire("Thành công!", response.message, "success");
                $('#modalThemBaiDang').modal('hide');
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

    // Sửa Bài Đăng
    $('#formSuaBaiDang').submit(function (e) {
        e.preventDefault();
        let id = $('#baiDang_id_sua').val();
        let formData = $(this).serialize();

        $.ajax({
            url: "/admin/bai-dangs/" + id,  // Đảm bảo đường dẫn đúng
            type: "POST",  // POST để Laravel xử lý PUT với method spoofing
            data: formData + "&_method=PUT",  // Đảm bảo có thêm method spoofing
            success: function () {
                Swal.fire("Thành công!", "Bài đăng đã được cập nhật.", "success");
                location.reload();  // Reload lại trang để cập nhật
            },
            error: function (xhr) {
                Swal.fire("Lỗi!", "Không thể cập nhật Bài đăng: " + xhr.responseText, "error");
            }
        });
    });
});

// Mở modal sửa
function moModalSuaBaiDang(id, tieu_de, noi_dung, tac_gia, the_loai) {
    $('#baiDang_id_sua').val(id);
    $('#tieu_de_sua').val(tieu_de);
    $('#noi_dung_sua').val(noi_dung);
    $('#tac_gia_sua').val(tac_gia);
    $('#the_loai_sua').val(the_loai);  // Thêm thể loại
    $('#modalSuaBaiDang').modal('show');
}

// Xóa bài đăng
function xoaBaiDang(id) {
    Swal.fire({
        title: "Bạn có chắc chắn muốn xóa?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Xóa",
        cancelButtonText: "Hủy"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/bai_dang/" + id,
                type: "POST",
                data: { _method: "DELETE", _token: "{{ csrf_token() }}" },
                success: function () {
                    Swal.fire("Đã xóa!", "Bài đăng đã được xóa.", "success");
                    $('#baiDang_' + id).remove();
                },
                error: function () {
                    Swal.fire("Lỗi!", "Không thể xóa bài đăng.", "error");
                }
            });
        }
    });
}
</script>
@endsection

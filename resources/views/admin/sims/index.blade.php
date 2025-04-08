@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Quản lý SIM</h2>

    <!-- Nút Thêm SIM -->
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalThem">
        <i class="fas fa-plus"></i> Thêm SIM
    </button>

    <!-- Danh sách SIM -->
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Số Thuê Bao</th>
                    <th>Nhà Mạng</th>
                    <th>Trạng Thái</th>
                    <th>Loại thuê bao</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody id="danhSachSim">
                @foreach ($sims as $sim)
                <tr id="sim_{{ $sim->id }}">
                    <td>{{ $sim->id }}</td>
                    <td>{{ $sim->so_sim }}</td>
                    <td>{{ $sim->nha_mang }}</td>
                    <td>{{ $sim->trang_thai }}</td>
                    <td>{{ $sim->loai_sim }}</td>

                    <td>
                        <button class="btn btn-warning btn-sm" onclick="moModalSua({{ $sim->id }}, '{{ $sim->so_sim }}', '{{ $sim->nha_mang }}', '{{ $sim->trang_thai }}', '{{ $sim->loai_sim }}')">
                            <i class="fas fa-edit"></i> Sửa
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="xoaSim({{ $sim->id }})">
                            <i class="fas fa-trash"></i> Xóa
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Thêm SIM -->
<div class="modal fade" id="modalThem" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm SIM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formThem">
                    @csrf
                    <div class="mb-3">
                        <label>Số SIM</label>
                        <input type="text" class="form-control" name="so_sim" required>
                    </div>
                    <div class="mb-3">
                        <label>Nhà Mạng</label>
                        <input type="text" class="form-control" name="nha_mang" required>
                    </div>
                    <div class="mb-3">
                        <label>Loại SIM</label>
                        <select name="loai_sim" class="form-control" required>
                            <option value="Tra Truoc">Trả Trước</option>
                            <option value="Tra Sau">Trả Sau</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Trạng Thái</label>
                        <select name="trang_thai" class="form-control" required>
                            <option value="kich hoat">Kích hoạt</option>
                            <option value="chua kich hoat">Chưa kích hoạt</option>
                            <option value="chan">Chặn</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Ngày kích hoạt</label>
                        <input type="date" class="form-control" name="ngay_kich_hoat">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Sửa SIM -->
<div class="modal fade" id="modalSua" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa SIM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="formSua">
                    @csrf
                    <input type="hidden" id="so_id_sua" name="so_id">
                    <div class="mb-3">
                        <label class="form-label">Số Thuê Bao</label>
                        <input type="text" class="form-control" id="sodt_sua" name="so_sim" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nhà Mạng</label>
                        <input type="text" class="form-control" id="network_provider_sua" name="nha_mang">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Trạng Thái</label>
                        <select class="form-control" id="status_sua" name="trang_thai">
                            <option value="kich hoat">Kích hoạt</option>
                            <option value="chua kich hoat">Chưa kích hoạt</option>
                            <option value="chan">Chặn</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Loại Thuê Bao</label>
                        <select class="form-control" name="loai_sim" required>
                            <option value="Tra Truoc">Trả Trước</option>
                            <option value="Tra Sau">Trả Sau</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    // Thêm SIM
    $('#formThem').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: "{{ route('admin.sims.store') }}",
            type: "POST",
            data: formData,
            success: function (response) {
                Swal.fire("Thành công!", response.message, "success");
                $('#modalThem').modal('hide');
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


    // Cập nhật SIM
    $('#formSua').submit(function (event) {
        event.preventDefault();

        let so_id = $('#so_id_sua').val();
        let formData = $(this).serialize();

        $.ajax({
            url: "/admin/sims/" + so_id, 
            type: "POST",
            data: formData + "&_method=PUT",
            success: function () {
                Swal.fire("Thành công!", "SIM đã được cập nhật.", "success");
                location.reload();
            },
            error: function (xhr) {
                Swal.fire("Lỗi!", "Không thể cập nhật SIM: " + xhr.responseText, "error");
            }
        });
    });
});

// Mở modal sửa SIM
function moModalSua(id, so_sim, nha_mang, trang_thai, loai_sim) {
    $('#so_id_sua').val(id);
    $('#sodt_sua').val(so_sim);
    $('#network_provider_sua').val(nha_mang);
    $('#status_sua').val(trang_thai);
    $('select[name="loai_thue_bao"]').val(loai_sim);
    $('#modalSua').modal('show');
}


// Xóa SIM
function xoaSim(id) {
    Swal.fire({
        title: "Bạn có chắc chắn muốn xóa?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Xóa",
        cancelButtonText: "Hủy"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/sims/" + id,
                type: "POST",
                data: { _method: "DELETE", _token: "{{ csrf_token() }}" },
                success: function () {
                    Swal.fire("Đã xóa!", "SIM đã được xóa.", "success");
                    $('#sim_' + id).remove();
                },
                error: function () {
                    Swal.fire("Lỗi!", "Không thể xóa SIM.", "error");
                }
            });
        }
    });
}
</script>
@endsection

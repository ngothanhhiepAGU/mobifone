@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Quản lý SIM</h2>

    <!-- Thêm SIM Button -->
    <div class="mb-3 text-end">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalThem">
            <i class="fas fa-plus"></i> Thêm SIM
        </button>
    </div>

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
                <tr id="sim_{{ $sim->so_id }}">
                    <td>{{ $sim->so_id }}</td>
                    <td>{{ $sim->sodt }}</td>
                    <td>{{ $sim->network_provider }}</td>
                    <td>{{ $sim->status }}</td>
                    <td>{{ $sim->loai_thue_bao }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" onclick="moModalSua({{ $sim->so_id }}, '{{ $sim->sodt }}', '{{ $sim->network_provider }}', '{{ $sim->status }}')">
                            <i class="fas fa-edit"></i> Sửa
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="xoaSim({{ $sim->so_id }})">
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
                        <label class="form-label">Số Thuê Bao</label>
                        <input type="text" class="form-control" id="sodt" name="sodt" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nhà Mạng</label>
                        <input type="text" class="form-control" id="network_provider" name="network_provider">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Trạng Thái</label>
                        <select class="form-control" id="status" name="status">
                            <option value="active">Hoạt động</option>
                            <option value="inactive">Chưa kích hoạt</option>
                            <option value="blocked">Bị khóa</option>
                        </select>
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
                        <input type="text" class="form-control" id="sodt_sua" name="sodt" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nhà Mạng</label>
                        <input type="text" class="form-control" id="network_provider_sua" name="network_provider">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Trạng Thái</label>
                        <select class="form-control" id="status_sua" name="status">
                            <option value="active">Hoạt động</option>
                            <option value="inactive">Chưa kích hoạt</option>
                            <option value="blocked">Bị khóa</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Loại Thuê Bao</label>
                        <select class="form-control" name="loai_thue_bao" required>
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
    $('#formThem').submit(function (event) {
        event.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: "{{ route('sims.store') }}",
            type: "POST",
            data: formData,
            success: function () {
                Swal.fire("Thành công!", "SIM đã được thêm.", "success");
                location.reload();
            },
            error: function (xhr, status, error) {
                Swal.fire("Lỗi!", "Không thể thêm SIM: " + xhr.responseText, "error");
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

function moModalSua(so_id, sodt, network_provider, status) {
    $('#so_id_sua').val(so_id);
    $('#sodt_sua').val(sodt);
    $('#network_provider_sua').val(network_provider);
    $('#status_sua').val(status);  // Đảm bảo status có giá trị đúng
    $('#modalSua').modal('show');
}

function xoaSim(so_id) {
    Swal.fire({
        title: "Bạn có chắc chắn muốn xóa?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Xóa",
        cancelButtonText: "Hủy"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/admin/sims/" + so_id,
                type: "POST",
                data: { _method: "DELETE", _token: "{{ csrf_token() }}" },
                success: function () {
                    Swal.fire("Đã xóa!", "SIM đã được xóa.", "success");
                    location.reload();
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

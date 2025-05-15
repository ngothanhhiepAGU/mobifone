@extends('layouts.admin')

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { background-color: #f8f9fa; }
        .table-hover tbody tr:hover { background-color: #f1f3f5; }
        .btn-gradient { background: linear-gradient(to right, #4facfe, #00f2fe); color: white; border: none; }
        .btn-gradient:hover { background: linear-gradient(to right, #00f2fe, #4facfe); }
    </style>
</head>

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Quản lý SIM</h2>

    <div class="mb-3 text-end">
        <button class="btn btn-gradient" data-bs-toggle="modal" data-bs-target="#modalThem">
            <i class="fas fa-plus"></i> Thêm SIM
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Số Thuê Bao</th>
                    <th>Nhà Mạng</th>
                    <th>Trạng Thái</th>
                    <th> Loại thuê bao</th>
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
                    <button class="btn btn-warning btn-sm btn-edit" 
                        data-id="{{ $sim->so_id }}"
                        data-so="{{ $sim->sodt }}"
                        data-loai="{{ $sim->loai_sim }}"
                        data-nha_mang="{{ $sim->network_provider }}"
                        data-trang_thai="{{ $sim->status }}"
                        data-ngay="{{ $sim->ngay_kich_hoat }}">
                        <i class="fas fa-edit"></i> Sửa
                    </button>

                    <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $sim->so_id }}">
                        <i class="fas fa-trash"></i> Xóa
                    </button>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

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
                    <div class="mb-3">
                        <label for="loai_thue_bao" class="form-label">Loại Thuê Bao</label>
                        <select class="form-control" id="loai_thue_bao" name="loai_thue_bao" required>
                            <option value="Tra Truoc">Trả Trước</option>
                            <option value="Tra Sau">Trả Sau</option>
                        </select>
                    </div>                 
                </form>
                </div>
                    <div class="modal-footer">
                        <button type="submit" form="formThem" class="btn btn-primary">Thêm</button>
                    </div>
             </div>
         </div>
    </div>
</div>

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

                        <div class="form-group">
                            <label for="loai_thue_bao">Loại Thuê Bao</label>
                            <select name="loai_thue_bao" class="form-control" required>
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

    // Xử lý thêm SIM
    $('#formThem').submit(function (event) {
        event.preventDefault();

        let formData = $(this).serialize();

        $.ajax({
            url: "{{ route('admin.sims.store') }}",
            type: "POST",
            data: formData,
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công!',
                    text: response.message,
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let newRow = `
                            <tr id="sim_${response.sim.id}">
                                <td>${response.sim.id}</td>
                                <td>${response.sim.so}</td>
                                <td>${response.sim.loai_sim}</td>
                                <td>${response.sim.network_provider}</td>
                                <td>${response.sim.status}</td>
                                <td>${response.sim.ngay_kich_hoat}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm btn-edit" 
                                        data-id="${response.sim.id}" 
                                        data-so="${response.sim.so}" 
                                        data-loai="${response.sim.loai_sim}" 
                                        data-nha_mang="${response.sim.network_provider}" 
                                        data-trang_thai="${response.sim.status}" 
                                        data-ngay="${response.sim.ngay_kich_hoat}">
                                        <i class="fas fa-edit"></i> Sửa
                                    </button>
                                    <button class="btn btn-danger btn-sm btn-delete" data-id="${response.sim.id}">
                                        <i class="fas fa-trash"></i> Xóa
                                    </button>
                                </td>
                            </tr>
                        `;
                        $('#danhSachSim').append(newRow);
                        $('#modalThem').modal('hide');
                        $('#formThem')[0].reset();
                    }
                });
            },
            error: function (xhr) {
                Swal.fire("Lỗi!", "Không thể thêm SIM: " + (xhr.responseJSON?.message || "Đã có lỗi xảy ra."), "error");
            }
        });
    });

    // Hiển thị modal sửa khi nhấn vào nút sửa
    $(document).on('click', '.btn-edit', function () {
        $('#so_id_sua').val($(this).data('id'));
        $('#sodt_sua').val($(this).data('so'));
        $('#loai_sim_sua').val($(this).data('loai'));
        $('#network_provider_sua').val($(this).data('nha_mang'));
        $('#status_sua').val($(this).data('trang_thai'));
        $('#ngay_kich_hoat_sua').val($(this).data('ngay'));
        $('#modalSua').modal('show');
    });

    // Xử lý cập nhật SIM
    $('#formSua').submit(function (event) {
        event.preventDefault();

        let so_id = $('#so_id_sua').val();
        let formData = $(this).serialize() + "&_method=PUT";

        $.ajax({
            url: "/admin/sims/" + so_id,
            type: "POST",
            data: formData,
            success: function (response) {
                Swal.fire("Cập nhật thành công!", response.message, "success");
                $('#modalSua').modal('hide');

                let updatedRow = `
                    <td>${response.sim.id}</td>
                    <td>${response.sim.so}</td>
                    <td>${response.sim.loai_sim}</td>
                    <td>${response.sim.network_provider}</td>
                    <td>${response.sim.status}</td>
                    <td>${response.sim.ngay_kich_hoat}</td>
                    <td>
                        <button class="btn btn-warning btn-sm btn-edit" 
                            data-id="${response.sim.id}" 
                            data-so="${response.sim.so}" 
                            data-loai="${response.sim.loai_sim}" 
                            data-nha_mang="${response.sim.network_provider}" 
                            data-trang_thai="${response.sim.status}" 
                            data-ngay="${response.sim.ngay_kich_hoat}">
                            <i class="fas fa-edit"></i> Sửa
                        </button>
                        <button class="btn btn-danger btn-sm btn-delete" data-id="${response.sim.id}">
                            <i class="fas fa-trash"></i> Xóa
                        </button>
                    </td>
                `;

                $(`#sim_${response.sim.id}`).html(updatedRow);
            },
            error: function (xhr) {
                Swal.fire("Lỗi!", "Không thể cập nhật SIM: " + (xhr.responseJSON?.message || "Đã có lỗi xảy ra."), "error");
            }
        });
    });

    // Xử lý xóa SIM
    $(document).on("click", ".btn-delete", function () {
        let so_id = $(this).data("id");

        Swal.fire({
            title: 'Bạn chắc chắn muốn xóa?',
            text: 'Dữ liệu SIM sẽ bị xóa và không thể khôi phục.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/admin/sims/" + so_id, // đúng URL resource
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "DELETE"
                    },
                    success: function (response) {
                        Swal.fire("Đã xóa!", response.message, "success");
                        $(`#sim_${so_id}`).remove();
                    },
                    error: function () {
                        Swal.fire("Có lỗi!", "Không thể xóa SIM.", "error");
                    }
                });
            }
        });
    });



});
</script>

</script>
@endsection
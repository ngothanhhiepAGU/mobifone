<?php

namespace App\Http\Controllers;

use App\Models\GoiCuoc;
use Illuminate\Http\Request;

class GoiCuocController extends Controller
{
    // Hiển thị danh sách gói cước
    public function index(Request $request)
    {
        $query = GoiCuoc::query();

        // Tìm kiếm theo tên gói hoặc nhà mạng
        if ($request->has('search')) {
            $query->where('ten_goi', 'like', '%' . $request->search . '%')
                  ->orWhere('nha_mang', 'like', '%' . $request->search . '%');
        }

        $goiCuocs = $query->paginate(10); // Phân trang 10 gói mỗi trang

        return view('admin.goi_cuocs.index', compact('goiCuocs'));
    }

    // Thêm gói cước mới (AJAX)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ten_goi' => 'required|string|max:255',
            'gia' => 'required|numeric|min:0',
            'nha_mang' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'thoi_han' => 'nullable|integer|min:1'
        ]);

        $goiCuoc = GoiCuoc::create($validated);

        return response()->json([
            'message' => 'Gói cước đã được tạo.',
            'goiCuoc' => $goiCuoc
        ]);
    }

    // Cập nhật gói cước (AJAX)
    public function update(Request $request, $id)
    {
        $request->validate([
            'ten_goi' => 'required|string|max:255',
            'gia' => 'required|numeric|min:0',
            'nha_mang' => 'required|string|max:255',
            'mo_ta' => 'nullable|string',
            'thoi_han' => 'nullable|integer|min:1'
        ]);

        $goiCuoc = GoiCuoc::find($id);

        if (!$goiCuoc) {
            return response()->json(['message' => 'Không tìm thấy gói cước.'], 404);
        }

        $goiCuoc->update($request->all());

        return response()->json(['message' => 'Gói cước đã được cập nhật.']);
    }

    // Xóa gói cước (AJAX)
    public function destroy($id)
    {
        $goiCuoc = GoiCuoc::find($id);

        if (!$goiCuoc) {
            return response()->json(['message' => 'Không tìm thấy gói cước.'], 404);
        }

        $goiCuoc->delete();

        return response()->json(['message' => 'Gói cước đã bị xóa.']);
    }
}

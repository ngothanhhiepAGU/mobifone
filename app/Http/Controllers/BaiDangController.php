<?php

namespace App\Http\Controllers;

use App\Models\BaiDang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BaiDangController extends Controller
{
    // Hiển thị danh sách bài đăng
    public function index(Request $request)
    {
        $query = BaiDang::query();

        // Tìm kiếm theo tiêu đề hoặc nội dung bài đăng
        if ($request->has('search')) {
            $query->where('tieu_de', 'like', '%' . $request->search . '%')
                  ->orWhere('noi_dung', 'like', '%' . $request->search . '%')
                  ->orWhere('tac_gia', 'like', '%' . $request->search . '%');  // Thêm tìm kiếm theo tác giả
        }

        $baiDangs = $query->paginate(10); // Phân trang 10 bài mỗi trang

        return view('admin.bai_dangs.index', compact('baiDangs'));
    }

    // Thêm bài đăng mới (AJAX)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tieu_de' => 'required|string|max:255',
            'noi_dung' => 'required|string',
            'tac_gia' => 'nullable|string|max:100',
            'ngay_dang' => 'nullable|date',
        ]);

        // Nếu không có ngày đăng, sử dụng ngày hiện tại
        $validated['ngay_dang'] = $validated['ngay_dang'] ?? Carbon::now();

        $baiDang = BaiDang::create($validated);

        return response()->json([
            'message' => 'Bài viết đã được tạo.',
            'baiDang' => $baiDang  // Trả về bài đăng mới được tạo
        ]);
    }

    // Cập nhật bài đăng (AJAX)
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tieu_de' => 'required|string|max:255',
            'noi_dung' => 'required|string',
            'tac_gia' => 'nullable|string|max:100',
            'ngay_dang' => 'nullable|date',
        ]);

        $baiDang = BaiDang::find($id);

        if (!$baiDang) {
            return response()->json(['message' => 'Không tìm thấy bài viết.'], 404);
        }

        // Nếu không có ngày đăng, sử dụng ngày hiện tại
        $validated['ngay_dang'] = $validated['ngay_dang'] ?? Carbon::now();

        $baiDang->update($validated);

        return response()->json([
            'message' => 'Bài viết đã được cập nhật.',
            'baiDang' => $baiDang  // Trả về bài đăng đã cập nhật
        ]);
    }

    // Xóa bài đăng (AJAX)
    public function destroy($id)
    {
        $baiDang = BaiDang::find($id);

        if (!$baiDang) {
            return response()->json(['message' => 'Không tìm thấy bài viết.'], 404);
        }

        $baiDang->delete();

        return response()->json(['message' => 'Bài viết đã bị xóa.']);
    }

    // Hiển thị các bài đăng trên frontend
    public function frontendIndex()
    {
        $tinChinh = BaiDang::latest('ngay_dang')->take(4)->get();
        $tinKhac = BaiDang::latest('ngay_dang')->skip(4)->take(8)->get();
        return view('frontend.bai_dang.index', compact('tinChinh', 'tinKhac'));
    }

    // Hiển thị chi tiết bài đăng trên frontend
    public function show($id)
    {
        $baiDang = BaiDang::findOrFail($id);
        return view('frontend.bai_dang.show', compact('baiDang'));
    }
}

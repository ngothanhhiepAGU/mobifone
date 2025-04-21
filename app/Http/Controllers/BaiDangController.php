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

        // Tìm kiếm theo tiêu đề, nội dung, tác giả hoặc thể loại
        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('tieu_de', 'like', '%' . $request->search . '%')
                  ->orWhere('noi_dung', 'like', '%' . $request->search . '%')
                  ->orWhere('tac_gia', 'like', '%' . $request->search . '%')
                  ->orWhere('the_loai', 'like', '%' . $request->search . '%'); // Thêm tìm theo thể loại
            });
        }

        $baiDangs = $query->paginate(10); // Phân trang 10 bài mỗi trang

        return view('admin.bai_dangs.index', compact('baiDangs'));
    }

    // Thêm bài đăng mới (AJAX)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tieu_de'   => 'required|string|max:255',
            'noi_dung'  => 'required|string',
            'tac_gia'   => 'nullable|string|max:100',
            'ngay_dang' => 'nullable|date',
            'the_loai'  => 'nullable|string|max:100',
            'hinh_anh'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // ảnh max 2MB
        ]);

        // Nếu không có ngày đăng, sử dụng ngày hiện tại
        $validated['ngay_dang'] = $validated['ngay_dang'] ?? Carbon::now();

        // Xử lý upload ảnh nếu có
        if ($request->hasFile('hinh_anh')) {
            $image = $request->file('hinh_anh');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/bai_dang'), $imageName);
            $validated['hinh_anh'] = 'uploads/bai_dang/' . $imageName;
        }

        $baiDang = BaiDang::create($validated);

        return response()->json([
            'message' => 'Bài viết đã được tạo.',
            'baiDang' => $baiDang
        ]);
    }


    // Cập nhật bài đăng (AJAX)
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tieu_de'   => 'required|string|max:255',
            'noi_dung'  => 'required|string',
            'tac_gia'   => 'nullable|string|max:100',
            'ngay_dang' => 'nullable|date',
            'the_loai'  => 'nullable|string|max:100',
            'hinh_anh'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $baiDang = BaiDang::find($id);
        if (!$baiDang) {
            return response()->json(['message' => 'Không tìm thấy bài viết.'], 404);
        }

        $validated['ngay_dang'] = $validated['ngay_dang'] ?? Carbon::now();

        // Nếu có ảnh mới, thay thế ảnh cũ
        if ($request->hasFile('hinh_anh')) {
            // Xoá ảnh cũ nếu tồn tại
            if ($baiDang->hinh_anh && file_exists(public_path($baiDang->hinh_anh))) {
                unlink(public_path($baiDang->hinh_anh));
            }

            $image = $request->file('hinh_anh');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/bai_dang'), $imageName);
            $validated['hinh_anh'] = 'uploads/bai_dang/' . $imageName;
        }

        $baiDang->update($validated);

        return response()->json([
            'message' => 'Bài viết đã được cập nhật.',
            'baiDang' => $baiDang
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

        // Chắc chắn rằng các trường ngay_dang được chuyển thành đối tượng Carbon
        foreach ($tinChinh as $tin) {
            $tin->ngay_dang = Carbon::parse($tin->ngay_dang);
        }
        foreach ($tinKhac as $tin) {
            $tin->ngay_dang = Carbon::parse($tin->ngay_dang);
        }
        return view('frontend.bai_dang.index', compact('tinChinh', 'tinKhac'));
    }

    // Hiển thị chi tiết bài đăng trên frontend
    public function show($id)
    {
        $baiDang = BaiDang::findOrFail($id);
        return view('frontend.bai_dang.show', compact('baiDang'));
    }
}

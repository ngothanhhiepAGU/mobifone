<?php

namespace App\Http\Controllers;

use App\Models\BaiDang;
use Illuminate\Http\Request;

class BaiDangController extends Controller
{
    public function index(Request $request)
    {
        $query = BaiDang::query();

        if ($request->has('search')) {
            $query->where('tieu_de', 'like', '%' . $request->search . '%')
                  ->orWhere('noi_dung', 'like', '%' . $request->search . '%');
        }

        $baiDangs = $query->paginate(10);
        
        return view('admin.bai_dangs.index', compact('baiDangs'));

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tieu_de' => 'required|string|max:255',
            'noi_dung' => 'required|string',
            'tac_gia' => 'nullable|string|max:100',
            'ngay_dang' => 'nullable|date',
        ]);

        $post = BaiDang::create($validated);

        return response()->json([
            'message' => 'Bài viết đã được tạo.',
            'post' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tieu_de' => 'required|string|max:255',
            'noi_dung' => 'required|string',
            'tac_gia' => 'nullable|string|max:100',
            'ngay_dang' => 'nullable|date',
        ]);

        $post = BaiDang::find($id);

        if (!$post) {
            return response()->json(['message' => 'Không tìm thấy bài viết.'], 404);
        }

        $post->update($request->all());

        return response()->json(['message' => 'Bài viết đã được cập nhật.']);
    }

    public function destroy($id)
    {
        $post = BaiDang::find($id);

        if (!$post) {
            return response()->json(['message' => 'Không tìm thấy bài viết.'], 404);
        }

        $post->delete();

        return response()->json(['message' => 'Bài viết đã bị xóa.']);
    }
}

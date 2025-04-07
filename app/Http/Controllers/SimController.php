<?php

namespace App\Http\Controllers;

use App\Models\Sim;
use Illuminate\Http\Request;

class SimController extends Controller
{
    // Hiển thị danh sách SIM
    public function index(Request $request)
    {
        $query = Sim::query();

        // Tìm kiếm SIM theo số SIM hoặc loại SIM
        if ($request->has('search')) {
            $query->where('so_sim', 'like', '%' . $request->search . '%')
                ->orWhere('loai_sim', 'like', '%' . $request->search . '%');
        }

        // Lấy danh sách SIM với phân trang
        $sims = $query->paginate(10); // 10 SIM mỗi trang

        return view('admin.sims.index', compact('sims'));
    }

    // Xử lý thêm SIM (AJAX)
    public function store(Request $request)
    {
        $request->validate([
            'so_sim' => 'required|unique:sims',
            'loai_sim' => 'required',
            'nha_mang' => 'required',
            'trang_thai' => 'required|in:kich hoat,chua kich hoat,chan',
            'ngay_kich_hoat' => 'nullable|date',
        ]);

        $sim = Sim::create($request->all());

        return response()->json([
            'message' => 'SIM được tạo thành công.',
            'sim' => $sim
        ]);
    }

    // Xử lý cập nhật SIM (AJAX)
    public function update(Request $request, $id)
    {
        $request->validate([
            'so_sim' => 'required|unique:sims,so_sim,' . $id,
            'loai_sim' => 'required',
            'nha_mang' => 'required',
            'trang_thai' => 'required|in:kich hoat,chua kich hoat,chan',
            'ngay_kich_hoat' => 'nullable|date',
        ]);

        $sim = Sim::find($id);
        if (!$sim) {
            return response()->json(['message' => 'SIM không tồn tại!'], 404);
        }

        $sim->update($request->all());

        return response()->json(['message' => 'SIM được cập nhật thành công!']);
    }

    // Xóa SIM (AJAX)
    public function destroy($id)
    {
        $sim = Sim::findOrFail($id);
        $sim->delete();

        return response()->json(['message' => 'SIM đã bị xóa.']);
    }
}

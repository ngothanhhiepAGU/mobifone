<?php

namespace App\Http\Controllers;

use App\Models\Sim;
use Illuminate\Http\Request;

class SimController extends Controller
{
    // Hiển thị danh sách SIM
    public function index()
    {
        $sims = Sim::all(); // Lấy tất cả dữ liệu SIM
        return view('admin.sims.index', compact('sims')); // Trả về view danh sách SIM
    }

    // Hiển thị form tạo mới SIM
    public function create()
    {
        return view('admin.sims.create');
    }

    // Lưu SIM mới
    public function store(Request $request)
    {
        $request->validate([
            'so_sim' => 'required|unique:sims',
            'loai_sim' => 'required',
            'nha_mang' => 'required',
            'trang_thai' => 'required|in:kich hoat,chua kich hoat,chan',
            'ngay_kich_hoat' => 'nullable|date',
        ]);

        Sim::create($request->all()); // Lưu dữ liệu SIM vào cơ sở dữ liệu

        return redirect()->route('admin.sims.index')->with('success', 'SIM được tạo thành công.');
    }

    // Hiển thị form sửa SIM
    public function edit($id)
    {
        $sim = Sim::findOrFail($id); // Lấy dữ liệu SIM theo ID
        return view('admin.sims.edit', compact('sim'));
    }

    // Cập nhật SIM
    public function update(Request $request, $id)
    {
        $request->validate([
            'so_sim' => 'required|unique:sims,so_sim,' . $id,
            'loai_sim' => 'required',
            'nha_mang' => 'required',
            'trang_thai' => 'required|in:kich hoat,chua kich hoat,chan',
            'ngay_kich_hoat' => 'nullable|date',
        ]);

        $sim = Sim::findOrFail($id); // Lấy SIM theo ID
        $sim->update($request->all()); // Cập nhật dữ liệu SIM

        return redirect()->route('admin.sims.index')->with('success', 'SIM được cập nhật thành công.');
    }

    // Xóa SIM
    public function destroy($id)
    {
        $sim = Sim::findOrFail($id);
        $sim->delete(); // Xóa SIM

        return redirect()->route('admin.sims.index')->with('success', 'SIM đã bị xóa.');
    }
}

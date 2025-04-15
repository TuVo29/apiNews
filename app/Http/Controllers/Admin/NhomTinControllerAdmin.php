<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NhomTin;
use Illuminate\Http\Request;
use App\Http\Resources\NhomTinResource;

class NhomTinControllerAdmin extends Controller
{
    // Xem toàn bộ nhóm tin
    public function index()
    {
        $nhomTin = NhomTin::latest()->get(); // Lấy tất cả nhóm tin, sắp xếp theo thứ tự mới nhất
        return NhomTinResource::collection($nhomTin); // Trả về các nhóm tin dưới dạng resource
    }

    // Xem chi tiết một nhóm tin
    public function show($id)
    {
        $nhomTin = NhomTin::findOrFail($id); // Tìm nhóm tin theo ID
        return new NhomTinResource($nhomTin); // Trả về nhóm tin chi tiết
    }

    // Sửa nhóm tin
    public function update(Request $request, $id)
    {
        // Validate dữ liệu từ request
        $request->validate([
            'Ten_nhomtin' => 'required|string|max:255',
            'Trangthai' => 'boolean'
        ]);

        // Tìm nhóm tin theo ID và cập nhật thông tin
        $nhomTin = NhomTin::findOrFail($id);
        $nhomTin->update($request->all()); // Cập nhật nhóm tin với dữ liệu từ request

        return new NhomTinResource($nhomTin); // Trả về nhóm tin đã cập nhật
    }

    // Xóa nhóm tin
    public function destroy($id)
    {
        // Tìm nhóm tin theo ID và xóa
        $nhomTin = NhomTin::findOrFail($id);
        $nhomTin->delete();

        // Trả về phản hồi sau khi xóa thành công
        return response()->json(['message' => 'Đã xóa nhóm tin'], 200);
    }
}
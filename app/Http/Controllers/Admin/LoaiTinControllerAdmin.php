<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoaiTin;
use Illuminate\Http\Request;
use App\Http\Resources\LoaiTinResource;

class LoaiTinControllerAdmin extends Controller
{
    // Lấy tất cả loại tin (kể cả chưa duyệt)
    public function index()
    {
        $loaiTin = LoaiTin::all();
        return LoaiTinResource::collection($loaiTin);
    }

    // Xem chi tiết 1 loại tin
    public function show($id)
    {
        $loaiTin = LoaiTin::findOrFail($id);
        return new LoaiTinResource($loaiTin);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Ten_loaitin' => 'required|string|max:255',
            'Trangthai' => 'boolean'
        ]);

        // Tạo mới loại tin
        $loaiTin = LoaiTin::create([
            'Ten_loaitin' => $request->Ten_loaitin,
            'Trangthai' => $request->Trangthai ?? true // Mặc định là true nếu không gửi
        ]);

        return new LoaiTinResource($loaiTin);
    }

    
    // Cập nhật loại tin
    public function update(Request $request, $id)
    {
        $request->validate([
            'Ten_loaitin' => 'required|string|max:255',
            'Trangthai' => 'boolean'
        ]);

        $loaiTin = LoaiTin::findOrFail($id);
        $loaiTin->update($request->all());

        return new LoaiTinResource($loaiTin);
    }

    // Xoá loại tin
    public function destroy($id)
    {
        $loaiTin = LoaiTin::findOrFail($id);
        $loaiTin->delete();

        return response()->json(['message' => 'Đã xoá loại tin'], 200);
    }
}
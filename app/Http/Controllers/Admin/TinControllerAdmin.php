<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tin;
use Illuminate\Http\Request;
use App\Http\Resources\TinResource;

class TinControllerAdmin extends Controller
{
    // Xem toàn bộ tin (cả chưa duyệt)
    public function index()
    {
        // return response()->json(['message' => 'API chay bth']);
        $tin = Tin::with(['loaiTin', 'binhLuan'])->orderBy('Id_tin', 'desc')->get();
        return TinResource::collection($tin);
    }

    // Xem chi tiết 1 tin
    public function show($id)
    {
        $tin = Tin::with(['loaiTin', 'binhLuan'])->findOrFail($id);
        return new TinResource($tin);
    }

    public function store(Request $request)
{
    // Validate input
    $request->validate([
        'Tieude' => 'required|string|max:255',
        'Mota' => 'required|string',
        'Noidung' => 'required|string',
        'Tacgia' => 'required|string|max:255',
        'Id_loaitin' => 'required|exists:loai_tin,Id_loaitin',
        'Tinhot' => 'boolean',
        'Trangthai' => 'boolean'
    ]);

    // Create new Tin
    $tin = Tin::create($request->all());

    // Return the created Tin
    return new TinResource($tin);
}


    // Sửa tin
    public function update(Request $request, $id)
    {
        $request->validate([
            'Tieude' => 'required|string|max:255',
            'Mota' => 'required|string',
            'Noidung' => 'required|string',
            'Tacgia' => 'required|string|max:255',
            'Id_loaitin' => 'required|exists:loai_tin,Id_loaitin',
            'Tinhot' => 'boolean',
            'Trangthai' => 'boolean'
        ]);

        $tin = Tin::findOrFail($id);
        $tin->update($request->all());

        return new TinResource($tin);
    }

    // Xoá tin
    public function destroy($id)
    {
        $tin = Tin::findOrFail($id);
        $tin->delete();

        return response()->json(['message' => 'Đã xoá tin tức'], 200);
    }
}
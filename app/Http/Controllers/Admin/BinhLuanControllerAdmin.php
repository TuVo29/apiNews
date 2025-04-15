<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BinhLuan;
use Illuminate\Http\Request;
use App\Http\Resources\BinhLuanResource;
use App\Http\Resources\TinResource;


class BinhLuanControllerAdmin extends Controller
{
    public function index()
    {
        $binhLuans = BinhLuan::with('tin')->orderBy('Id_tin', 'desc')->get();
        return BinhLuanResource::collection($binhLuans);
    }

    public function store(Request $request)
{
    $request->validate([
        'Id_tin' => 'required|exists:tin,Id_tin',  // Kiểm tra Id_tin có tồn tại trong bảng tin
        'email' => 'required|email',
        'Noidung' => 'required|string',
        'Trangthai' => 'required|boolean'
    ]);

    // Tạo bình luận mới
    $binhLuan = BinhLuan::create([
        'Id_tin' => $request->Id_tin,
        'email' => $request->email,
        'Noidung' => $request->Noidung,
        'Trangthai' => $request->Trangthai,
    ]);

    // Trả về bình luận mới đã tạo dưới dạng BinhLuanResource
    return new BinhLuanResource($binhLuan);
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'Trangthai' => 'nullable|boolean',
            'Noidung' => 'nullable|string',
        ]);

        $binhLuan = BinhLuan::findOrFail($id);
        $binhLuan->update($request->only(['Trangthai', 'Noidung']));

        return new BinhLuanResource($binhLuan);
    }

    public function destroy($id)
    {
        $binhLuan = BinhLuan::findOrFail($id);
        $binhLuan->delete();

        return response()->json(['message' => 'Đã xoá bình luận'], 200);
    }
}
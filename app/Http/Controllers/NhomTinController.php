<?php

namespace App\Http\Controllers;

use App\Models\NhomTin;
use Illuminate\Http\Request;
use App\Http\Resources\NhomTinResource;

class NhomTinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nhomTin = NhomTin::where('Trangthai', true)->get();
        return response()->json(NhomTinResource::collection($nhomTin));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'Ten_nhomtin' => 'required|string|max:255',
                'Trangthai' => 'boolean'
            ]);

            $nhomTin = new NhomTin();
            $nhomTin->Ten_nhomtin = $validated['Ten_nhomtin'];
            $nhomTin->Trangthai = $request->has('Trangthai') ? (bool) $request->Trangthai : true;
            $nhomTin->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Nhóm tin được tạo thành công',
                'data' => new NhomTinResource($nhomTin)
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không thể tạo nhóm tin: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(NhomTin $nhomTin)
    {
        return response()->json([
            'data' => new NhomTinResource($nhomTin)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NhomTin $nhomTin)
    {
        try {
            $validated = $request->validate([
                'Ten_nhomtin' => 'required|string|max:255',
                'Trangthai' => 'boolean'
            ]);

            $nhomTin->Ten_nhomtin = $validated['Ten_nhomtin'];
            $nhomTin->Trangthai = $request->has('Trangthai') ? (bool) $request->Trangthai : $nhomTin->Trangthai;
            $nhomTin->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Nhóm tin được cập nhật thành công',
                'data' => new NhomTinResource($nhomTin)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không thể cập nhật nhóm tin: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NhomTin $nhomTin)
    {
        try {
            $nhomTin->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Nhóm tin được xóa thành công'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không thể xóa nhóm tin: ' . $e->getMessage()
            ], 500);
        }
    }
}
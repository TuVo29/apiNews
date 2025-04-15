<?php

namespace App\Http\Controllers;

use App\Models\LoaiTin;
use Illuminate\Http\Request;
use App\Http\Resources\LoaiTinResource;
use App\Http\Resources\TinResource;

class LoaiTinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loaiTin = LoaiTin::where('Trangthai', true)->get();
        return LoaiTinResource::collection($loaiTin);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Ten_loaitin' => 'required|string|max:255',
            'Trangthai' => 'boolean'
        ]);

        $loaiTin = LoaiTin::create($request->all());
        return new LoaiTinResource($loaiTin);
    }

    /**
     * Display the specified resource.
     */
    public function show(LoaiTin $loaiTin)
    {
        return new LoaiTinResource($loaiTin);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LoaiTin $loaiTin)
    {
        $request->validate([
            'Ten_loaitin' => 'required|string|max:255',
            'Trangthai' => 'boolean'
        ]);

        $loaiTin->update($request->all());
        return new LoaiTinResource($loaiTin);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoaiTin $loaiTin)
    {
        $loaiTin->delete();
        return response()->json(null, 204);
    }

    public function getTinByLoaiTin(LoaiTin $loaiTin)
    {
        $tin = $loaiTin->tin()->where('Trangthai', true)->get();
        return TinResource::collection($tin);
    }
}

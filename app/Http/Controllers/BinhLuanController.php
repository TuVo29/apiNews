<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use App\Models\Tin;
use Illuminate\Http\Request;
use App\Http\Resources\BinhLuanResource;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $binhLuan = BinhLuan::where('Trangthai', true)->get();
        return BinhLuanResource::collection($binhLuan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'Noidung' => 'required|string',
            'Id_tin' => 'required|exists:tin,Id_tin',
            'Trangthai' => 'boolean'
        ]);

        $binhLuan = BinhLuan::create($request->all());
        return new BinhLuanResource($binhLuan);
    }

    /**
     * Display the specified resource.
     */
    public function show(BinhLuan $binhLuan)
    {
        return new BinhLuanResource($binhLuan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BinhLuan $binhLuan)
    {
        $request->validate([
            'email' => 'required|email',
            'Noidung' => 'required|string',
            'Id_tin' => 'required|exists:tin,Id_tin',
            'Trangthai' => 'boolean'
        ]);

        
        $binhLuan->update($request->all());
        return new BinhLuanResource($binhLuan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BinhLuan $binhLuan)
    {
        $binhLuan->delete();
        return response()->json(null, 204);
    }

    public function getBinhLuanByTin(Tin $tin)
    {
        $binhLuan = $tin->binhLuan()->where('Trangthai', true)->get();
        return BinhLuanResource::collection($binhLuan);
    }
}
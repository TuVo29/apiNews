<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tin;
use Illuminate\Http\Request;
use App\Http\Resources\TinResource;

class TinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tin = Tin::with('loaiTin')->where('Trangthai', true)->get();
        return TinResource::collection($tin);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        $tin = Tin::create($request->all());
        return new TinResource($tin);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tin $tin)
    {
        $tin->increment('Solanxem');
        return new TinResource($tin->load('loaiTin', 'binhLuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tin $tin)
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

        $tin->update($request->all());
        return new TinResource($tin);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tin $tin)
    {
        $tin->delete();
        return response()->json(null, 204);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $tin = Tin::where('Trangthai', true)
            ->where(function($q) use ($query) {
                $q->where('Tieude', 'like', "%{$query}%")
                  ->orWhere('Mota', 'like', "%{$query}%")
                  ->orWhere('Noidung', 'like', "%{$query}%");
            })
            ->get();
        return TinResource::collection($tin);
    }

    public function getTinHot()
    {
        $tin = Tin::where('Trangthai', true)
            ->where('Tinhot', true)
            ->get();
        return TinResource::collection($tin);
    }
}

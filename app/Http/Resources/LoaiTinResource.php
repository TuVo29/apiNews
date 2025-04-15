<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoaiTinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->Id_loaitin,
            'ten_loai_tin' => $this->Ten_loaitin,
            'trang_thai' => $this->Trangthai,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

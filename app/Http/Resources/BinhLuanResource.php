<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BinhLuanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->Id_binhluan,
            'email' => $this->email,
            'thoi_gian' => $this->Thoigian,
            'noi_dung' => $this->Noidung,
            'trang_thai' => $this->Trangthai,
            'tin' => new TinResource($this->whenLoaded('tin')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

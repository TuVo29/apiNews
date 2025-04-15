<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->Id_tin,
            'tieu_de' => $this->Tieude,
            'hinh_dai_dien' => $this->Hinhdaidien,
            'mo_ta' => $this->Mota,
            'noi_dung' => $this->Noidung,
            'ngay_dang_tin' => $this->Ngaydangtin,
            'tac_gia' => $this->Tacgia,
            'so_lan_xem' => $this->Solanxem,
            'tin_hot' => $this->Tinhot,
            'trang_thai' => $this->Trangthai,
            'loai_tin' => new LoaiTinResource($this->whenLoaded('loaiTin')),
            'binh_luan' => BinhLuanResource::collection($this->whenLoaded('binhLuan')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

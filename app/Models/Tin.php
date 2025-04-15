<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tin extends Model
{
    use HasFactory;

    protected $table = 'tin';
    protected $primaryKey = 'Id_tin';
    public $timestamps = false;

    protected $fillable = [
        'Tieude',
        'Hinhdaidien',
        'Mota',
        'Noidung',
        'Ngaydangtin',
        'Tacgia',
        'Solanxem',
        'Tinhot',
        'Trangthai',
        'Id_loaitin'
    ];

    protected $casts = [
        'Ngaydangtin' => 'datetime',
        'Solanxem' => 'integer',
        'Tinhot' => 'boolean',
        'Trangthai' => 'boolean'
    ];

    public function loaiTin()
    {
        return $this->belongsTo(\App\Models\LoaiTin::class, 'Id_loaitin', 'Id_loaitin');
    }

    public function binhLuan()
    {
        return $this->hasMany(\App\Models\BinhLuan::class, 'Id_tin', 'Id_tin');
    }
}
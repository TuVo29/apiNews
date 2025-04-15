<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoaiTin extends Model
{
    use HasFactory;

    protected $table = 'loai_tin';
    protected $primaryKey = 'Id_loaitin';
    public $timestamps = true;

    protected $fillable = [
        'Ten_loaitin',
        'Trangthai'
    ];

    protected $casts = [
        'Trangthai' => 'boolean'
    ];

    public function tin()
    {
        return $this->hasMany(Tin::class, 'Id_loaitin', 'Id_loaitin');
    }
}

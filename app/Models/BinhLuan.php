<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BinhLuan extends Model
{
    use HasFactory;

    protected $table = 'binh_luan';
    protected $primaryKey = 'Id_binhluan';
    public $timestamps = true;

    protected $fillable = [
        'Id_tin',
        'email',
        'Thoigian',
        'Noidung',
        'Trangthai'
    ];

    protected $casts = [
        'Thoigian' => 'datetime',
        'Trangthai' => 'boolean'
    ];

    public function tin()
    {
        return $this->belongsTo(\App\Models\Tin::class, 'Id_tin', 'Id_tin');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NhomTin extends Model
{
    use HasFactory;

    protected $table = 'nhom_tin';
    protected $primaryKey = 'Id_nhomtin';
    public $timestamps = true;

    protected $fillable = [
        'Ten_nhomtin',
        'Trangthai'
    ];

    protected $casts = [
        'Trangthai' => 'boolean',
        'Id_nhomtin' => 'integer'
    ];

    protected $attributes = [
        'Trangthai' => true
    ];
}

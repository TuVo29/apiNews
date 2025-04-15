<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LoaiTin;

class LoaiTinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $loaiTins = [
            [
                'Ten_loaitin' => 'Tin trong nước',
                'Trangthai' => true
            ],
            [
                'Ten_loaitin' => 'Tin quốc tế',
                'Trangthai' => true
            ],
            [
                'Ten_loaitin' => 'Tin tài chính',
                'Trangthai' => true
            ],
            [
                'Ten_loaitin' => 'Tin thị trường',
                'Trangthai' => true
            ],
            [
                'Ten_loaitin' => 'Tin giải trí',
                'Trangthai' => true
            ],
            [
                'Ten_loaitin' => 'Tin thể thao',
                'Trangthai' => true
            ],
            [
                'Ten_loaitin' => 'Tin công nghệ',
                'Trangthai' => true
            ],
            [
                'Ten_loaitin' => 'Tin đời sống',
                'Trangthai' => true
            ]
        ];

        foreach ($loaiTins as $loaiTin) {
            LoaiTin::create($loaiTin);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NhomTin;

class NhomTinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nhomTins = [
            [
                'Ten_nhomtin' => 'Tin tức',
                'Trangthai' => true
            ],
            [
                'Ten_nhomtin' => 'Thời sự',
                'Trangthai' => true
            ],
            [
                'Ten_nhomtin' => 'Thế giới',
                'Trangthai' => true
            ],
            [
                'Ten_nhomtin' => 'Kinh tế',
                'Trangthai' => true
            ],
            [
                'Ten_nhomtin' => 'Giải trí',
                'Trangthai' => true
            ]
        ];

        foreach ($nhomTins as $nhomTin) {
            NhomTin::create($nhomTin);
        }
    }
}

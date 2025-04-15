<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BinhLuan;

class BinhLuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $binhLuans = [
            [
                'email' => 'user1@example.com',
                'Noidung' => 'Tin tức rất hữu ích và cập nhật kịp thời',
                'Thoigian' => now(),
                'Trangthai' => true,
                'Id_tin' => 1
            ],
            [
                'email' => 'user2@example.com',
                'Noidung' => 'Thị trường chứng khoán đang có dấu hiệu tích cực',
                'Thoigian' => now(),
                'Trangthai' => true,
                'Id_tin' => 2
            ],
            [
                'email' => 'user3@example.com',
                'Noidung' => 'Chúc mừng đội tuyển Việt Nam!',
                'Thoigian' => now(),
                'Trangthai' => true,
                'Id_tin' => 3
            ],
            [
                'email' => 'user4@example.com',
                'Noidung' => 'iPhone 16 có vẻ là một sản phẩm rất hấp dẫn',
                'Thoigian' => now(),
                'Trangthai' => true,
                'Id_tin' => 4
            ],
            [
                'email' => 'user5@example.com',
                'Noidung' => 'Tự hào về ẩm thực Việt Nam!',
                'Thoigian' => now(),
                'Trangthai' => true,
                'Id_tin' => 5
            ]
        ];

        foreach ($binhLuans as $binhLuan) {
            BinhLuan::create($binhLuan);
        }
    }
}

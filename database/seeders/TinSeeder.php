<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tin;

class TinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tin = [
            [
                'Tieude' => 'Việt Nam đạt tăng trưởng GDP 6.8% trong quý 1/2024',
                'Hinhdaidien' => 'images/tin1.jpg',
                'Mota' => 'Nền kinh tế Việt Nam tiếp tục phát triển mạnh mẽ trong quý đầu tiên của năm 2024',
                'Noidung' => 'Theo báo cáo của Tổng cục Thống kê, GDP quý 1/2024 tăng 6.8% so với cùng kỳ năm trước. Các ngành kinh tế chủ chốt đều tăng trưởng tích cực, trong đó công nghiệp và xây dựng tăng 7.2%, dịch vụ tăng 6.5%, nông lâm thủy sản tăng 3.1%.',
                'Ngaydangtin' => now(),
                'Tacgia' => 'Admin',
                'Solanxem' => 0,
                'Tinhot' => true,
                'Trangthai' => true,
                'Id_loaitin' => 1
            ],
            [
                'Tieude' => 'Thị trường chứng khoán Việt Nam đạt đỉnh mới',
                'Hinhdaidien' => 'images/tin2.jpg',
                'Mota' => 'VN-Index vượt mốc 1.300 điểm lần đầu tiên trong lịch sử',
                'Noidung' => 'Thị trường chứng khoán Việt Nam đã có một phiên giao dịch sôi động với VN-Index đạt đỉnh mới 1.305 điểm. Các nhóm cổ phiếu ngân hàng, bất động sản và công nghệ dẫn dắt thị trường tăng điểm.',
                'Ngaydangtin' => now(),
                'Tacgia' => 'Admin',
                'Solanxem' => 0,
                'Tinhot' => true,
                'Trangthai' => true,
                'Id_loaitin' => 3
            ],
            [
                'Tieude' => 'Việt Nam vô địch AFF Cup 2024',
                'Hinhdaidien' => 'images/tin3.jpg',
                'Mota' => 'Đội tuyển Việt Nam đã xuất sắc đánh bại Thái Lan trong trận chung kết',
                'Noidung' => 'Với chiến thắng 2-0 trước Thái Lan trong trận chung kết, đội tuyển Việt Nam đã lần thứ 3 vô địch AFF Cup. Đây là thành tích xuất sắc của bóng đá Việt Nam trong kỷ nguyên mới.',
                'Ngaydangtin' => now(),
                'Tacgia' => 'Admin',
                'Solanxem' => 0,
                'Tinhot' => true,
                'Trangthai' => true,
                'Id_loaitin' => 6
            ],
            [
                'Tieude' => 'Apple ra mắt iPhone 16 với nhiều tính năng mới',
                'Hinhdaidien' => 'images/tin4.jpg',
                'Mota' => 'iPhone 16 được trang bị chip A18, camera 48MP và màn hình 6.7 inch',
                'Noidung' => 'Apple đã chính thức ra mắt iPhone 16 với nhiều cải tiến mới. Máy được trang bị chip A18 mới nhất, camera chính 48MP, màn hình 6.7 inch với tần số quét 120Hz. Ngoài ra, máy còn có khả năng sạc không dây 20W và pin 4500mAh.',
                'Ngaydangtin' => now(),
                'Tacgia' => 'Admin',
                'Solanxem' => 0,
                'Tinhot' => true,
                'Trangthai' => true,
                'Id_loaitin' => 7
            ],
            [
                'Tieude' => 'Các món ăn truyền thống Việt Nam được UNESCO công nhận',
                'Hinhdaidien' => 'images/tin5.jpg',
                'Mota' => 'Phở, bánh mì và bánh cuốn được vinh danh là di sản văn hóa phi vật thể',
                'Noidung' => 'UNESCO đã chính thức công nhận các món ăn truyền thống của Việt Nam là di sản văn hóa phi vật thể. Đây là niềm tự hào lớn của ẩm thực Việt Nam, góp phần quảng bá văn hóa ẩm thực nước nhà ra thế giới.',
                'Ngaydangtin' => now(),
                'Tacgia' => 'Admin',
                'Solanxem' => 0,
                'Tinhot' => true,
                'Trangthai' => true,
                'Id_loaitin' => 8
            ]
        ];

        foreach ($tin as $item) {
            Tin::create($item);
        }
    }
}

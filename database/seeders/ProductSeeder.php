<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::create([
            'name' => 'Giày Golf Nike Vapor Golf Wide ‘White’ AQ2301-100',
            'description' => 'Thông tin phát hành Nike Vapor Golf Wide ‘White’ Thương hiệu: Nike Thiết kế: Nike Vapor Mã sản phẩm: AQ2301-100 Xuất xứ : Mỹ Phân loại: Giày Golf',
            'price' => 350000,
            'image' => 'assets/images/products/product-1.jpg',
            'category_id' => '3',
        ]);

        Product::create([
            'name' => 'Giày Nike Air VaporMax 2023 Flyknit ‘Coconut Milk Olive’ DV1678-101',
            'description' => 'Giày Nike Air VaporMax 2023 Flyknit ‘Coconut Milk Olive’ DV1678-101 là một phiên bản mới của dòng Air',
            'price' => 420000,
            'image' => 'assets/images/products/product-2.jpg',
            'category_id' => '3',
        ]);

        Product::create([
            'name' => 'Áo Kangol T-Shirt White',
            'description' => 'Chiếc áo thun Kangol phối tone đen – trắng mang phong cách tối giản nhưng không hề đơn điệu, nổi bật với logo kangaroo dập nổi 3D ngay trước ngực – một điểm nhấn hiện đại vừa tinh tế vừa mang đậm dấu ấn thương hiệu. Phom áo regular fit dễ mặc, ôm nhẹ theo dáng người mà không quá bó sát, phù hợp với nhiều vóc dáng và hoàn cảnh sử dụng.',
            'price' => 700000,
            'image' => 'assets/images/products/1749744410_vn-11134207-7qukw-lii504766bwy6f.jpg',
            'category_id' => '1',
        ]);

        Product::create([
            'name' => 'Túi Kangol Shoulder Bag Khaki',
            'description' => 'Túi đeo vai Kangol là sự kết hợp hài hòa giữa phong cách và tính ứng dụng, chiếc túi đeo vai Kangol màu Khaki mang đến thiết kế tối giản, dễ phối nhưng không hề đơn điệu. Phom túi ngang bo góc mềm mại, kết hợp cùng quai xách bản to lót lưới thoáng khí vừa tạo điểm nhấn thị giác vừa đảm bảo êm vai khi mang lâu. Đây là lựa chọn lý tưởng cho những ngày cần sự linh hoạt, nhẹ nhàng nhưng vẫn giữ trọn thần thái thời trang.',
            'price' => 950000,
            'image' => 'assets/images/products/vn-11134207-7qukw-lf93nt7trp1m64.jpg',
            'category_id' => '2',
        ]);

        Product::create([
            'name' => 'Áo Kangol Baseball Jacket',
            'description' => 'Lấy cảm hứng từ những mẫu áo bóng chày cổ điển, Baseball Jacket Kangol màu xanh rêu mang đến một làn gió mới cho tủ đồ thường ngày. Thiết kế nổi bật với đường line trắng chạy dọc giữa ngực – chi tiết đặc trưng của phong cách varsity – kết hợp cùng logo “Kangol” in nổi dạng brush calligraphy, tạo điểm nhấn năng động và đậm chất đường phố. Mặt sau được giữ tối giản, tạo sự cân bằng và tinh tế trong tổng thể.',
            'price' => 1300000,
            'image' => 'assets/images/products/vn-11134275-7ra0g-ma3xjji58zkq91.jpg',
            'category_id' => '1',
        ]);

        Product::create([
            'name' => 'Balo Kangol Backpack Grey',
            'description' => 'Chiếc balo Kangol màu xám mang phong cách thiết kế tối giản, hiện đại nhưng vẫn giữ được chất riêng nhờ sự kết hợp hài hòa giữa tính thẩm mỹ và công năng sử dụng. Phom dáng cổ điển, dễ mang, phù hợp cho cả nam và nữ trong mọi hoàn cảnh – từ đi học, đi làm đến du lịch ngắn ngày. Logo Kangaroo in trắng nổi bật phía trước trở thành điểm nhấn đặc trưng, khẳng định tinh thần thương hiệu đầy năng động.',
            'price' => 1100000,
            'image' => 'assets/images/products/vn-11134207-7r98o-lprn5dcd9y5zee.jpg',
            'category_id' => '2',
        ]);

        Product::create([
            'name' => 'Giày Vans Upland',
            'description' => 'Vans Upland mang đậm nét retro với thiết kế chunky đặc trưng và logo Flying-V cổ điển, kết hợp màu sắc đen trắng đơn giản và tinh tế. Với 3 loại chất liệu được làm từ 54.11% da mịn mềm mại, kết hợp  20.87% vải chắc chắn, tạo nên sự bền bỉ và phong cách. Đế ngoài được thiết kế theo hình dạng bánh waffle retro thập niên 90, làm từ 25.02% cao su rubber plastic, mang lại sự hỗ trợ tối ưu và cảm giác thoải mái khi di chuyển. Upland nổi bật với lớp lót dày và đế giữa, mang lại cảm giác bao bọc chắc chắn và êm ái.',
            'price' => 2500000,
            'image' => 'assets/images/products/vn-11134207-7r98o-lyvmy2buahsx46.jpg',
            'category_id' => '3',
        ]);

        Product::create([
            'name' => 'Áo Kangol T-Shirt',
            'description' => 'Chiếc áo thun Kangol phối tone đen – trắng mang phong cách tối giản nhưng không hề đơn điệu, nổi bật với logo kangaroo dập nổi 3D ngay trước ngực – một điểm nhấn hiện đại vừa tinh tế vừa mang đậm dấu ấn thương hiệu. Phom áo regular fit dễ mặc, ôm nhẹ theo dáng người mà không quá bó sát, phù hợp với nhiều vóc dáng và hoàn cảnh sử dụng.',
            'price' => 500000,
            'image' => 'assets/images/products/1750763324_kangol_Tshirt1.png',
            'category_id' => '1',
        ]);
    }
}

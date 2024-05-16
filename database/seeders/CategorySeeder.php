<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Categories::create([
            'name' => 'Đồ công nghệ',
            'describe' => 'Công nghệ là một khái niệm quan trọng trong cuộc sống hiện đại, giúp chúng ta cải tiến chất lượng sản phẩm và quá trình sản xuất. Công nghệ còn là một giải pháp để biến đổi nguồn lực thành sản phẩm tốt hơn.'
        ]);

        \App\Models\Categories::create([
            'name' => 'Đồ điện máy',
            'describe' => 'Khí cụ điện là các thiết bị được sử dụng trong các hoạt động liên quan đến điện từ việc lắp đặt, bảo dưỡng cho đến sửa chữa hệ thống điện.'
        ]);

        \App\Models\Categories::create([
            'name' => 'Dụng cụ ăn uống',
            'describe' => 'là từ chỉ bộ đồ ăn và bát đĩa dùng để gọi và phục vụ đồ ăn, thức uống. Thông thường sẽ dao muỗng nĩa, thủy tinh và các dụng cụ dùng để rửa bát đĩa và các dụng cụ hữu ích cho các mục đích khác nhau.'
        ]);

        \App\Models\Categories::create([
            'name' => 'Đồ dùng nhà bếp',
            'describe' => 'Thiết bị nhà bếp hiểu đơn giản là những dòng sản phẩm, đồ dùng được sử dụng trong căn bếp để hỗ trợ người nội trợ trong quá trình nấu nướng, mang đến những món ăn ngon, hấp dẫn và mang lại sự tiện lợi cho người sử dụng.'
        ]);

        \App\Models\Categories::create([
            'name' => 'Đồ nội thất',
            'describe' => 'Đồ nội thất trong nhà thường đề cập đến đồ đạc trong nhà.'
        ]);
    }
}
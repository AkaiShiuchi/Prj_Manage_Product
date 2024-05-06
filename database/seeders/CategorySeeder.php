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
            'name' => 'Đồ gia dụng',
            'describe' => 'Đồ gia dụng (thiết bị gia dụng) được dùng để chỉ các mặt hàng, thiết bị, vật dụng được sử dụng để phục vụ cho các tiện ích, nhằm đáp ứng nhu cầu sử dụng cho sinh hoạt hàng ngày đối với cá nhân hoặc gia đình.'
        ]);

        \App\Models\Categories::create([
            'name' => 'Máy tính',
            'describe' => 'Máy tính là một thiết bị điện tử hoặc máy móc tuân theo các quy tắc cụ thể nhất định và hoàn thành một bộ tiêu chuẩn các chức năng.'
        ]);

        \App\Models\Categories::create([
            'name' => 'Phụ kiện',
            'describe' => 'Thiết bị phụ và các bộ phận, chi tiết không phải là thành phần của thiết bị, công trình chính, nhưng nhất thiết phải có để bảo đảm sự hoạt động bình thường.'
        ]);
    }
}

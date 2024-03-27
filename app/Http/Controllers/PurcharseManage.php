<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class PurcharseManage extends Controller
{
    /**
     * Hàm xem chi tiết sản phẩm trong modal
     *
     * @param [type] $id
     * @return void
     */
    public function view_detail($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Hàm hiển thị thể loại của sản phẩm trong modal
     *
     * @param [type] $id
     * @return void
     */
    public function get_category($id)
    {
        $category = Categories::findOrFail($id);
        return response()->json(['name' => $category->name]);
    }
}
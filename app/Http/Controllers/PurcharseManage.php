<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class PurcharseManage extends Controller
{
    public function view_detail($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function get_category($id)
    {
        $category = Categories::findOrFail($id);
        return response()->json(['name' => $category->name]);
    }
}

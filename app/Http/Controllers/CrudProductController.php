<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudProductController extends Controller
{
    public function add_product(Request $request)
    {
        $input = DB::table('products')->where('id', $request->id)->first();

        if (empty($input)) {
            $product = new Product();
            $product->fill([
                'id' => $request->id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category' => $request->category_id,
            ])->save();

            toastr()->success('Thêm sản phẩm mới thành công');
            return redirect()->route('product_manage');
        }

        return redirect()->back()->with('error', 'Sản phẩm này đã tồn tại');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudProductController extends Controller
{

    public function search(Request $request)
    {
        if ($request->has('product_name') || $request->has('category_id')) {
            $pro = $request->input('product_name');
            $cat = $request->input('categories');

            // Trường hợp: Tìm kiếm theo cả tên và thể loại
            if ($pro && $cat) {
                $results = Product::where('name', $pro)
                    ->where('category_id', $cat)
                    ->get();
            }
            // Trường hợp: Chỉ tìm kiếm theo thể loại
            elseif (!$pro && $cat) {
                $results = Product::where('category_id', $cat)->get();
            }
            // Trường hợp: Chỉ tìm kiếm theo tên
            elseif ($pro && !$cat) {
                $results = Product::where('name', $pro)->get();
            }
            // Trường hợp: Không có thông tin tìm kiếm
            else {
                $results = null;
            }
            return view('home.product_manage', compact('results'));
        } else {
            $products = Product::all();
            return view('home.product_manage', compact('products'));
        }
    }


    /**
     * Hàm thêm sản phẩm mới
     *
     * @param Request $request
     * @return void
     */
    public function add_product(Request $request)
    {
        $input = DB::table('products')->where('id', $request->id)->first();

        if (empty($input)) {
            $product = new Product();
            $product->fill([
                'id' => $request->id,
                'name' => $request->name,
                'describe' => $request->description,
                'price' => $request->price,
                'total' => $request->total,
                'category_id' => $request->category_id,
            ])->save();

            toastr()->success('Thêm sản phẩm mới thành công');
            return redirect()->route('product_manage');
        }

        return redirect()->back()->with('error', 'Sản phẩm này đã tồn tại');
    }
}

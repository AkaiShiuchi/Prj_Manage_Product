<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CrudProductController extends Controller
{

    /**
     * Hàm tìm kiếm sản phẩm
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        if ($request->has('product_name') || $request->has('category_id')) {
            $pro = $request->input('product_name');
            $cat = $request->input('category_id');

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
            return view('products.product_manage', compact('results'));
        } else {
            $products = Product::all();
            return view('products.product_manage', compact('products'));
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
            if ($request->has('image')) {

                $file = $request->image;
                $path = $file->store('public/uploads');
                // $url = Storage::url($path);
                // dd($url);

                $product->fill([
                    'id' => $request->id,
                    'name' => $request->name,
                    'describe' => $request->description,
                    'price' => $request->price,
                    'total' => $request->total,
                    'category_id' => $request->category_id,
                    'image' => basename($path),
                ])->save();

                toastr()->success('Thêm sản phẩm mới thành công');
                return redirect()->route('product_manage');
            }
            toastr()->warning('Vui lòng chọn ảnh cho sản phẩm');
            return redirect()->back();
        }

        return redirect()->back()->with('error', 'Sản phẩm này đã tồn tại');
    }

    public function view_detail($id)
    {
        $products = Product::findOrFail($id);
        return view('products.view_detail', compact('products'));
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function handle_edit(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update([
                'name' => $request->name,
                'total' => $request->total,
                'price' => $request->price,
                'describe' => $request->describe,
                'category_id' => $request->category_id,
            ]);

            toastr()->success('Product update successfully');
            return redirect()->route('product_manage');
        } else {
            toastr()->error('Product update failded!');
            return redirect()->back();
        }
    }
}

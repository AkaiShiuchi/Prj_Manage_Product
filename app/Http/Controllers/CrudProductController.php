<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateAddProduct;
use App\Http\Requests\ValidateEditProduct;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Purchase;
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

            $query = Product::query();

            if ($pro && $cat) {
                $query->where('name', 'LIKE', '%' . $pro . '%')
                    ->whereIn('category_id', $cat);
            } elseif (!$pro && $cat) {
                $query->whereIn('category_id', $cat);
            } elseif ($pro && !$cat) {
                $query->where('name', 'LIKE', '%' . $pro . '%');
            }

            $results = $query->get();
            session()->flashInput($request->input());
            return view('products.products_table', compact('results'))->render();
        } else {
            return redirect()->back();
        }
    }

    /**
     * Hàm thêm sản phẩm mới
     *
     * @param Request $request
     * @return void
     */
    public function add_product(ValidateAddProduct $request)
    {
        $input = DB::table('products')->where('name', $request->name)->first();

        if (empty($input)) {
            $product = new Product();
            if ($request->hasFile('image')) {

                $file = $request->image;
                $path = $file->store('public/uploads');
                // $url = Storage::url($path);
                // dd($url);

                $product->fill([
                    'name' => $request->name,
                    'describe' => $request->describe,
                    'price' => $request->price,
                    'total' => $request->total,
                    'category_id' => $request->category_id,
                    'image' => basename($path),
                ])->save();

                toastr()->success('Thêm sản phẩm mới thành công');
                return redirect()->route('product_manage');
            }
            session()->flashInput($request->input());
            toastr()->warning('Vui lòng chọn ảnh cho sản phẩm');
            return redirect()->back();
        }
        session()->flashInput($request->input());
        return redirect()->back()->with('error', 'Sản phẩm này đã tồn tại');
    }

    /**
     * Function product detail
     */
    public function view_detail($id)
    {
        $products = Product::findOrFail($id);
        $total_sold = 0;
        $purchases = Purchase::where('status', 'paid')->get();
        foreach ($purchases as $purchase) {
            foreach ($purchase->products as $product_item) {
                if ($product_item->id == $id) {
                    $total_sold += $product_item->pivot->quantity;
                }
            }
        }

        return view('products.view_detail', compact('products', 'total_sold'));
    }

    /**
     * function edit product
     *
     * @param [type] $id
     * @return void
     */
    public function edit_product($id)
    {
        $categories = Categories::all();
        $product = Product::find($id);
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * function handle edit product
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function handle_edit(ValidateEditProduct $request, $id)
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

            if ($request->hasFile('image')) {

                $old_image = $product->image;

                $image_path = $request->file('image')->store('public/uploads');
                $product->update(['image' => basename($image_path)]);

                if ($old_image && $old_image != $request->image) {
                    Storage::delete('public/uploads/' . $old_image);
                }
            }

            toastr()->success('Product update successfully');
            return redirect()->route('product_manage');
        } else {
            toastr()->error('Product update failded!');
            return redirect()->back();
        }
    }

    /**
     * funciton delete product
     *
     * @param [type] $id
     * @return void
     */
    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        toastr()->success('Product deleted');
        return redirect()->back();
    }
}

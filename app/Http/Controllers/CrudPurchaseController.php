<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateAddProductPurchase;
use App\Models\Product;
use App\Models\ProductPurchase;
use App\Models\Purchase;
use Illuminate\Http\Request;

class CrudPurchaseController extends Controller
{
    public function add_purchase(Request $request)
    {
        $input = Purchase::where('id', $request->id)->first();

        if (empty($input)) {
            $purchase = new Purchase();
            $purchase->fill([
                'user_created_id' => $request->session()->get('user_id'),
                'status' => $request->status,
            ])->save();

            toastr()->success('Tạo mới đơn hàng thành công.');
            return redirect()->route('purchase_manage');
        }

        toastr()->error('Đơn hàng này đã tồn tại');
        return redirect()->back();
    }

    public function detail_purchase($id)
    {
        $purchase = Purchase::find($id);
        $products = $purchase->products;
        $prod = Product::all();
        $product_purc = ProductPurchase::where('purchase_id', $purchase->id)->get();

        $sum_total = 0;
        foreach ($products as $product) {
            $sum_total += $product->pivot->total_amount;
        }
        return view('purchases.detail_purchase', compact('purchase', 'products', 'prod', 'sum_total', 'product_purc'));
    }

    public function add_product_to_purchase(ValidateAddProductPurchase $request, $purchase_id)
    {
        $product = Product::findOrFail($request->product_id);

        $exist_product = ProductPurchase::where('purchase_id', $purchase_id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($exist_product) {
            $exist_product->update([
                'quantity' => $exist_product->quantity + $request->quantity,
                'total_amount' => $exist_product->total_amount + ($product->price * $request->quantity),
            ]);
        } else {
            $product_pur = new Purchase();
            $product_pur->fill([
                'product_id' => $request->product_id,
                'purchase_id' => $purchase_id,
                'quantity' => $request->quantity,
                'total_amount' => $product->price * $request->quantity,
            ])->save();
        }

        toastr()->success('Product added to purchase successfully!');
        return redirect()->back();
    }

    public function delete_purchase($id)
    {
        $purchase = Purchase::find($id);
        dd($purchase);
        $purchase->delete();
        toastr()->success('Xóa đơn hàng thành công');
        return redirect()->back();
    }

    public function delete_product_to_purchase(Request $request, $id)
    {
        $productIds = $request->input('product_ids');

        if (!empty($productIds)) {
            ProductPurchase::whereIn('product_id', $productIds)->delete();

            toastr()->success('Deleted Product successfully!');
            return redirect()->route('detail_purchase');
        }

        toastr()->error('Deleted Product Failed.');
        return redirect()->back();
    }
}
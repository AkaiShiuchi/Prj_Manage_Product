<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateAddProductPurchase;
use App\Models\Product;
use App\Models\ProductPurchase;
use App\Models\Purchase;
use Illuminate\Http\Request;

class CrudPurchaseController extends Controller
{
    /**
     * Hàm thêm đơn hàng mới
     *
     * @param Request $request
     * @return void
     */
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

    /**
     * Hàm xem chi tiết đơn hàng
     *
     * @param [type] $id
     * @return void
     */
    public function detail_purchase($id)
    {
        $purchase = Purchase::find($id);
        $products = $purchase->products;
        $prod = Product::all();
        $product_purc = ProductPurchase::where('purchase_id', $purchase->id)->get();

        // foreach ($products as $pro) {
        //     $pro_total = $pro->total;
        // }

        $sum_total = 0;
        foreach ($products as $product) {
            $sum_total += $product->pivot->total_amount;
        }
        return view('purchases.detail_purchase', compact('purchase', 'products', 'prod', 'sum_total', 'product_purc'));
    }

    /**
     * Hàm thêm sản phẩm vào đơn hàng
     *
     * @param ValidateAddProductPurchase $request
     * @param [type] $purchase_id
     * @return void
     */
    public function add_product_to_purchase(ValidateAddProductPurchase $request, $purchase_id)
    {
        $product = Product::findOrFail($request->product_id);
        $purchas = Purchase::find($purchase_id);
        if ($purchas->status === 'paid') {
            toastr()->error('This purchase has been paid.');
            return redirect()->back();
        } else {
            if ($product->total < $request->quantity) {
                toastr()->warning('Not enough stock for this product!');
                return redirect()->back();
            }

            $exist_product = ProductPurchase::where('purchase_id', $purchase_id)
                ->where('product_id', $request->product_id)
                ->first();

            if ($exist_product) {
                $total_quantity = $exist_product->quantity + $request->quantity;
                if ($total_quantity > $product->total) {
                    toastr()->error('The total quantity exceeds the available stock!');
                    return redirect()->back();
                }

                $exist_product->update([
                    'quantity' => $exist_product->quantity + $request->quantity,
                    'total_amount' => $exist_product->total_amount + ($product->price * $request->quantity),
                ]);
            } else {
                $product_pur = new ProductPurchase();
                $product_pur->fill([
                    'product_id' => $request->product_id,
                    'purchase_id' => $purchase_id,
                    'quantity' => $request->quantity,
                    'total_amount' => $product->price * $request->quantity,
                ])->save();
            }

            toastr()->success('Product added to purchase successfully!');
            return redirect()->back();
            // return redirect()->route('detail_purchase', ['id' => $purchase_id]);
        }
    }

    /**
     * Hàm xóa đơn hàng
     *
     * @param [type] $id
     * @return void
     */
    public function delete_purchase($id)
    {
        $purchase = Purchase::find($id);

        $pro_pur = ProductPurchase::where('purchase_id', $id)->first();
        if (!$pro_pur) {
            $purchase->delete();
            toastr()->success('Delete order successfully!');
            return redirect()->back();
        } else {
            toastr()->warning('Please leave your order blank');
            return redirect()->back();
        }
    }

    /**
     * Hàm xóa sản phẩm ra khỏi đơn hàng
     *
     * @param Request $request
     * @param [type] $ids
     * @return void
     */
    public function delete_product_to_purchase(Request $request, $purchase_id)
    {
        $purcha_id = Purchase::find($purchase_id);
        $selected_ids = $request->input('selected_products');

        if ($purcha_id->status !== 'paid') {
            if (isset($selected_ids)) {
                $deleted = ProductPurchase::where('purchase_id', $purchase_id)->whereIn('product_id', $selected_ids);
                $deleted->delete();

                toastr()->success('Products deleted successfully.');
                return response()->json(['message' => 'Products deleted successfully.']);
            } else {
                toastr()->error('Failed to delete products.');
                return response()->json(['error' => 'Failed to delete products.']);
            }
        }
        toastr()->error('This purchase has been paid.');
        return response()->json(['error' => 'This purchase has been paid.'], 404);
    }

    /**
     * Hàm thanh toán đơn hàng
     *
     * @param [type] $id
     * @return void
     */
    public function payment($id)
    {
        $purchase = Purchase::find($id);
        $products = $purchase->products;

        if ($purchase->products()->count() === 0) {
            toastr()->warning('This purchase is empty.');
            return redirect()->back();
        } else {
            if ($purchase->status === 'paid') {
                toastr()->warning('This purchase already has been paid.');
                return redirect()->back();
            }

            foreach ($products as $product) {
                $availableQuantity = $product->total;

                $quantityInPurchase = ProductPurchase::where('purchase_id', $purchase->id)
                    ->where('product_id', $product->id)
                    ->sum('quantity');

                if ($quantityInPurchase > $availableQuantity) {
                    toastr()->warning('There is not enough stock for one or more products in this purchase.');
                    return redirect()->back();
                } else {
                    $product->update([
                        'total' => $availableQuantity - $quantityInPurchase
                    ]);
                }
            }

            $purchase->update([
                'status' => 'paid'
            ]);

            toastr()->success('Payment successfully');
            return redirect()->route('purchase_manage');
        }
    }
}

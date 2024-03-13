<?php

namespace App\Http\Controllers;

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

    public function detail_purchase()
    {
        return view('purchases.detail_purchase');
    }

    public function delete_purchase($id)
    {
        $purchase = Purchase::find($id);
        dd($purchase);
        $purchase->delete();
        toastr()->success('Xóa đơn hàng thành công');
        return redirect()->back();
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BarcodeController extends Controller
{
    /**
     * function print QRCode
     *
     * @param [type] $id
     * @return void
     */
    public function print_barcode($id)
    {
        $products = Product::find($id);
        if (!$products) {
            abort(404);
        }
        $total_sold = 0;
        $purchases = Purchase::where('status', 'paid')->get();
        foreach ($purchases as $purchase) {
            foreach ($purchase->products as $product_item) {
                if ($product_item->id == $id) {
                    $total_sold += $product_item->pivot->quantity;
                }
            }
        }
        $qrCode = QrCode::size(150)->generate($products->id);
        return view('products.view_detail', compact('products', 'total_sold', 'qrCode'));
    }
}

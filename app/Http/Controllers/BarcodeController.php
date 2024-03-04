<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        // $barcode = DNS1D::getBarcodeHTML($product->id, 'C128', 1.4, 22);
        $qrCode = QrCode::size(150)->generate($products->id);
        return view('products.view_detail', compact('products', 'qrCode'));
    }
}
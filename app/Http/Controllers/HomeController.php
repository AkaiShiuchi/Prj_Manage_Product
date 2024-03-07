<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPurchase;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Hàm điều hướng đến trang home
     *
     * @return void
     */
    public function display()
    {
        $user_count = User::count();
        $products = Product::all();
        $purchase_count = Purchase::count();

        $purchases = Purchase::all();
        $product_purchase = [];

        foreach ($purchases as $pur) {
            $product_purchase[$pur->id] = ProductPurchase::where('purchase_id', $pur->id)->get();
        }

        return view('home.home', compact('user_count', 'products', 'purchase_count', 'purchases', 'product_purchase'));
    }

    /**
     *Hàm điều hướng đến trang quản lý sản phẩm 
     *
     * @param Product $products
     * @return void
     */
    public function product_manage(Product $products)
    {
        $products = Product::paginate(6);
        return view('products.product_manage')->with('products', $products);
    }

    public function purchase_manage()
    {
        $user = User::all();
        $product = Product::all();
        $purchase = Purchase::all();
        return view('purchases.purchase_manage', compact('user', 'product', 'purchase'));
    }

    /**
     * Hàm đăng xuất
     *
     * @param Request $request
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng
        Session::flush();
        Session::regenerate();
        return redirect()->route('authentication.login'); // Điều hướng đến trang đăng nhập
    }
}
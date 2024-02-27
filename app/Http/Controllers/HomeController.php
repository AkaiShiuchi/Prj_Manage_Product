<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        return view('home.home');
    }

    /**
     *Hàm điều hướng đến trang quản lý sản phẩm 
     *
     * @param Product $products
     * @return void
     */
    public function product_manage(Product $products)
    {
        $products = Product::all();
        return view('products.product_manage')->with('products', $products);
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

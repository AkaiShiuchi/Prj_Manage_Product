<?php

namespace App\Http\Controllers;

use App\Models\Categories;
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
        $purchase_count = Purchase::where('status', 'Đã thanh toán')->count();

        $user = User::all();
        $products = Product::all();
        $product_quantities = [];

        $purchas = Purchase::where('status', 'Đã thanh toán')->get();
        $sum_purchas = $purchas->sum('total_price');
        $purchases = Purchase::where('status', 'Đã thanh toán')->paginate(6);
        foreach ($purchas as $purchase) {
            foreach ($purchase->products as $product) {
                $product_id = $product->id;
                $quantity = $product->pivot->quantity;
                if (!isset($product_quantities[$product_id])) {
                    $product_quantities[$product_id] = 0;
                }
                $product_quantities[$product_id] += $quantity;
            }
        }

        $top_product = [];
        foreach ($product_quantities as $product_id => $quantity) {
            $product = Product::find($product_id);
            if ($product) {
                $product->total = $quantity;
                $top_product[] = $product;
            }
        }

        usort($top_product, function ($a, $b) {
            return $b->total - $a->total;
        });

        $top_products = array_slice($top_product, 0, 5);

        return view('home.home', compact('user_count', 'user', 'purchases', 'purchase_count', 'top_products', 'sum_purchas'));
    }

    /**
     *Hàm điều hướng đến trang quản lý sản phẩm 
     *
     * @param Product $products
     * @return void
     */
    public function product_manage(Product $products)
    {
        $categories = Categories::all();
        $products = Product::paginate(6);
        return view('products.product_manage', compact('categories'))->with('products', $products);
    }

    public function purchase_manage()
    {
        $user = User::all();
        $product = Product::all();
        $purchase = Purchase::all();
        $purchases = Purchase::latest()->paginate(10);
        $user_view = User::where('id', session('user_id'))->first();
        $cus_purchase = Purchase::where('user_created_id', session('user_id'))->latest()->paginate(6);
        $customer_purchase = Purchase::where('user_created_id', session('user_id'))
            ->where('status', 'paid')->latest()->paginate(6);

        return view('purchases.purchase_manage', compact('user', 'product', 'purchase', 'purchases', 'user_view', 'cus_purchase', 'customer_purchase'));
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

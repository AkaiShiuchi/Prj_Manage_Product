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
     * hàm xử lý thống kê doanh số theo ngày
     *
     * @param Request $request
     * @return void
     */
    // public function getSalesByDate(Request $request)
    // {
    //     $date = $request->input('date');

    //     // Truy vấn dữ liệu doanh số theo giờ trong ngày cụ thể
    //     $salesData = Purchase::where('status', 'Đã thanh toán')
    //         ->whereDate('updated_at', $date)
    //         ->selectRaw('HOUR(updated_at) as hour, SUM(total_price) as total_sales')
    //         ->groupBy('hour')
    //         ->orderBy('hour')
    //         ->get();

    //     // Chuẩn bị dữ liệu cho các giờ trong ngày
    //     $categories = [];
    //     $sales = [];

    //     for ($i = 0; $i < 24; $i++) {
    //         $categories[] = sprintf('%02d:00', $i); // Thêm các giờ vào danh mục
    //         $sales[] = 0; // Mặc định giá trị doanh số là 0
    //     }

    //     // Cập nhật dữ liệu doanh số theo giờ thực tế
    //     foreach ($salesData as $data) {
    //         $sales[intval($data->hour)] = $data->total_sales;
    //     }

    //     return response()->json(['categories' => $categories, 'sales' => $sales]);
    // }

    public function getDailySalesByMonth(Request $request)
    {
        $month = $request->input('month'); // Định dạng 'YYYY-MM'

        // Truy vấn dữ liệu doanh số theo ngày trong tháng cụ thể
        $salesData = Purchase::where('status', 'Đã thanh toán')
            ->whereMonth('updated_at', '=', date('m', strtotime($month)))
            ->whereYear('updated_at', '=', date('Y', strtotime($month)))
            ->selectRaw('DAY(updated_at) as day, SUM(total_price) as total_sales')
            ->groupBy('day')
            ->orderBy('day')
            ->get();

        // Chuẩn bị dữ liệu cho các ngày trong tháng
        $daysInMonth = date('t', strtotime($month));
        $categories = [];
        $sales = [];

        for ($i = 1; $i <= $daysInMonth; $i++) {
            $categories[] = sprintf('%02d', $i); // Thêm các ngày vào danh mục
            $sales[] = 0; // Mặc định giá trị doanh số là 0
        }

        // Cập nhật dữ liệu doanh số theo ngày thực tế
        foreach ($salesData as $data) {
            $sales[intval($data->day) - 1] = $data->total_sales;
        }

        return response()->json(['categories' => $categories, 'sales' => $sales]);
    }

    // public function getMonthlySalesByYear(Request $request)
    // {
    //     $year = $request->input('year'); // Định dạng 'YYYY'

    //     // Truy vấn dữ liệu doanh số theo tháng trong năm cụ thể
    //     $salesData = Purchase::where('status', 'Đã thanh toán')
    //         ->whereYear('updated_at', '=', $year)
    //         ->selectRaw('MONTH(updated_at) as month, SUM(total_price) as total_sales')
    //         ->groupBy('month')
    //         ->orderBy('month')
    //         ->get();

    //     // Chuẩn bị dữ liệu cho các tháng trong năm
    //     $categories = [];
    //     $sales = [];

    //     for ($i = 1; $i <= 12; $i++) {
    //         $categories[] = sprintf('%02d', $i); // Thêm các tháng vào danh mục
    //         $sales[] = 0; // Mặc định giá trị doanh số là 0
    //     }

    //     // Cập nhật dữ liệu doanh số theo tháng thực tế
    //     foreach ($salesData as $data) {
    //         $sales[intval($data->month) - 1] = $data->total_sales;
    //     }

    //     return response()->json(['categories' => $categories, 'sales' => $sales]);
    // }


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

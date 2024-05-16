<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateLogin;
use App\Http\Requests\ValidateRegister;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CustomerInterface extends Controller
{
    /**
     * hàm điều hướng đến trang chủ khách hàng
     *
     * @return void
     */
    public function view_home()
    {
        $categories = Categories::all();
        $product_quantities = [];

        $purchas = Purchase::where('status', 'paid')->get();

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
        $top_products = array_slice($top_product, 0, 8);

        $sevenDaysAgo = Carbon::now()->subDays(7);
        $new_products = Product::where('created_at', '>=', $sevenDaysAgo)
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        return view('customer_design.dashboard.home_custom', compact('categories', 'top_products', 'new_products'));
    }

    /**
     * hàm xử lý tìm kiếm theo ký tự
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $categories = Categories::all();
        if ($request->has('search')) {
            $product = $request->input('search');

            $query = Product::query();
            $query->where('name', 'LIKE', '%' . $product . '%');

            $results = $query->paginate(24);
            return view('customer_design.product.search_page', compact('results', 'product', 'categories'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Hàm tìm kiếm theo danh mục sản phẩm
     *
     * @param [type] $id
     * @return void
     */
    public function search_category($id)
    {
        $categories = Categories::all();
        $categor = Categories::find($id);
        $products = Product::where('category_id', $id)->paginate(24);
        return view('customer_design.product.search_category', compact('products', 'categories', 'categor'));
    }

    /**
     * hàm điều hướng đến trang đăng nhập
     *
     * @return void
     */
    public function view_signin()
    {
        $categories = Categories::all();
        return view('customer_design.account.sign_in', compact(('categories')));
    }

    /**
     * hàm xử lý đăng nhập
     *
     * @param ValidateLogin $request
     * @return void
     */
    public function handle_signin(ValidateLogin $request)
    {
        $check = $request->only('email', 'password');

        $user = User::where('email', $request->email)->first();

        if (Auth::attempt($check)) {
            session(['user_id' => $user->id]);
            session(['user_name' => $user->name]);
            session(['user_email' => $user->email]);
            return redirect()->route('view_home');
        }

        toastr()->error('Đăng nhập thất bại');
        return redirect()->route('view_signin')->with('err', 'email hoặc mật khẩu không chính xác');
    }

    /**
     * hàm điều hướng đến trang đăng ký
     *
     * @return void
     */
    public function view_signup()
    {
        $categories = Categories::all();
        return view('customer_design.account.sign_up', compact('categories'));
    }

    /**
     * hàm xử lý đăng ký
     *
     * @param ValidateRegister $request
     * @return void
     */
    public function handle_signup(ValidateRegister $request)
    {
        $input = DB::table('users')->where('email', $request->email)
            ->first();

        if (!$input) {
            $user = new User();

            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                // 'remember_token' => Str::random('10'),
                'status' => 1
            ])->save();
            toastr()->success('Bạn đã đăng ký tài khoản thành công');
            return redirect()->route('view_signin');
        }

        toastr()->error('Tài khoản này đã tồn tại');
        return redirect()->back();
    }

    /**
     * hàm điều hướng đến trang quên mật khẩu
     *
     * @return void
     */
    public function getpassword()
    {
        $categories = Categories::all();
        return view('customer_design.account.getpassword', compact('categories'));
    }

    /**
     * hàm xử lý quên mật khẩu
     *
     * @param Request $request
     * @return void
     */
    public function handle_getpassword(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'exists:users'
            ]
        ], [
            'email.required' => 'Địa chỉ email không không được để trống',
            'email.exists' => 'Email này không tồn tại'
        ]);

        $remember_token = Str::random(10);
        $user = User::where('email', $request->email)->first();
        $user->update(['remember_token' => $remember_token]);

        Mail::send('customer_design.account.email_form', compact('user'), function ($email) use ($user) {
            $email->subject('Lấy lại mật khẩu');
            $email->to($user->email, $user->name);
        });
        toastr()->info('Vui lòng kiểm tra email để đặt lại mật khẩu');
        return redirect()->back();
    }

    /**
     * hàm điều hướng đến trang nhập mật khẩu mới
     *
     * @param User $user
     * @param [type] $remember_token
     * @return void
     */
    public function reset_password(User $user, $remember_token)
    {
        $categories = Categories::all();
        if ($user->remember_token === $remember_token) {
            return view('customer_design.account.reset_password', compact('user', 'remember_token', 'categories'));
        }

        return abort(404);
    }

    /**
     * hàm xử lý cập nhật mật khẩu mới
     *
     * @param User $user
     * @param [type] $remember_token
     * @param Request $request
     * @return void
     */
    public function handle_reset(User $user, $remember_token, Request $request)
    {
        $request->validate([
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'confirm_password' => 'required|same:password'
        ], [
            'password' => 'Mật khẩu bạn nhập không đúng định dạng',
            'confirm_password' => 'Mật khẩu xác nhận không khớp',
        ]);

        if ($user->remember_token === $remember_token) {
            $user->update([
                'password' => bcrypt($request->password),
                'remember_token' => null
            ]);
            toastr()->success('Đặt lại mật khẩu thành công, bạn có thể đăng nhập');
            return redirect()->route('view_signin');
        }

        return redirect()->back();
    }

    /**
     * hàm điều hướng đến trang sản phẩm
     *
     * @return void
     */
    public function view_product()
    {
        $categories = Categories::all();
        $products = Product::paginate(24);
        return view('customer_design.product.product_all', compact('products', 'categories'));
    }

    /**
     * hàm xem chi tiết giỏ hàng
     *
     * @return void
     */
    public function view_cart()
    {
        $categories = Categories::all();
        return view('customer_design.cart.cart', compact('categories'));
    }

    /**
     * hàm thanh toán
     *
     * @return void
     */
    public function order()
    {
        return view('customer_design.cart.order');
    }

    public function product_detail($id)
    {
        $categories = Categories::all();
        $product = Product::find($id);
        return view('customer_design.product.product_detail', compact('product', 'categories'));
    }

    /**
     * hàm xem trang cá nhân
     *
     * @return void
     */
    public function profile()
    {
        $categories = Categories::all();
        return view('customer_design.account.personal_page', compact('categories'));
    }

    /**
     * hàm đến trang thay đổi mật khẩu
     *
     * @return void
     */
    public function change_password()
    {
        $categories = Categories::all();
        return view('customer_design.account.change_password', compact('categories'));
    }

    public function handle_changePass(Request $request)
    {
        $id = session('user_id');
        // dd($id);
        $user = User::find($id);
        if (Hash::check($request->oldpassword, $user->password)) {
            $user->update([
                'password' => $request->newpassword,
            ]);
            toastr()->success('Đổi mật khẩu thành công');
            return redirect()->route('profile');
        }
        toastr()->error('Mật khẩu cũ không chính xác. Vui lòng nhập lại!');
        return redirect()->back();
    }

    /**
     * hàm đăng xuất
     *
     * @return void
     */
    public function signout()
    {
        Auth::logout();
        Session::flush();
        Session::regenerate();
        return redirect()->route('view_home');
    }
}

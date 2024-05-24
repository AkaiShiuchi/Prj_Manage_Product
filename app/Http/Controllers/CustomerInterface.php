<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateAddProductPurchase;
use App\Http\Requests\ValidateLogin;
use App\Http\Requests\ValidateRegister;
use App\Models\Categories;
use App\Models\Product;
use App\Models\ProductPurchase;
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

        $purchas = Purchase::where('status', 'Đã thanh toán')->get();

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
    public function search_category(Request $request, $id)
    {
        $categories = Categories::all();
        $categor = Categories::find($id);
        $sort = $request->query('show', 'default');
        $products = Product::query();

        switch ($sort) {
            case 'priceDesc':
                $products->orderBy('price', 'desc');
                break;
            case 'priceAsc':
                $products->orderBy('price', 'asc');
                break;
            default:
                break;
        }
        $products = $products->where('category_id', $id)->paginate(24);
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
    public function view_product(Request $request)
    {
        $sort = $request->query('show', 'default');
        $products = Product::query();

        switch ($sort) {
            case 'priceDesc':
                $products->orderBy('price', 'desc');
                break;
            case 'priceAsc':
                $products->orderBy('price', 'asc');
                break;
                // case 'discount':
                //     $products->where('discount', '>', 0)->orderBy('discount', 'desc');
                //     break;
            default:
                // $products->where('name', 'asc');
                break;
        }

        $products = $products->paginate(24);
        $categories = Categories::all();

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
        //lấy id đơn hàng khi đăng nhập
        $purchase_id = session('purchase_id');

        //mảng chứa các sản phẩm trong đơn hàng
        $item_cart = [];

        //tổng giá của đơn hàng
        $item_sum_total = 0;

        //tổng số lượng sản phẩm trong đơn hàng
        $item_sum_quantity = 0;

        if ($purchase_id) {
            $item_cart = ProductPurchase::with('product')->where('purchase_id', $purchase_id)->get();
            $item_sum_total = $item_cart->sum('total_amount');
            $item_sum_quantity = $item_cart->sum('quantity');
        }

        return view('customer_design.cart.cart', compact('categories', 'item_cart', 'item_sum_total', 'item_sum_quantity'));
    }

    /**
     * Hàm thêm sản phẩm vào giỏ hàng
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function add_item_cart(Request $request, $id)
    {
        $quantity = $request->input('quantity');
        $product = Product::find($id);

        if ($quantity > $product->total) {
            return response()->json([
                'success' => false,
                'message' => 'Số lượng sản phẩm không đủ!'
            ]);
        }

        $user = auth()->user();

        $purchaseId = session('purchase_id');
        if ($purchaseId) {
            $purchase = Purchase::find($purchaseId);
        } else {
            $purchase = $user->purchases->where('status', 'Chưa đặt hàng')->first();
        }

        if (!$purchase) {
            $purchase = new Purchase();
            $purchase->fill([
                'status' => 'Chưa đặt hàng',
                'user_created_id' => $user->id,
                'total_price' => 0
            ])->save();

            session(['purchase_id' => $purchase->id]);
        }

        $productPurchase = ProductPurchase::where('purchase_id', $purchase->id)
            ->where('product_id', $id)
            ->first();

        if ($productPurchase) {
            $productPurchase->quantity += $quantity;
            $productPurchase->total_amount = $productPurchase->quantity * $product->price;
            $productPurchase->save();
        } else {
            $productPurchase = new ProductPurchase();
            $productPurchase->fill([
                'product_id' => $id,
                'purchase_id' => $purchase->id,
                'quantity' => $quantity,
                'total_amount' => $product->price * $quantity,
                'price' => $product->price,
            ])->save();
        }

        $purchase->total_price += $product->price * $quantity;
        $purchase->save();

        session(['cart' => $purchase]);
        $cartItems = ProductPurchase::where('purchase_id', $purchase->id)->get();
        $total = $purchase->total_price;
        $totalItems = $cartItems->sum('quantity');

        $cartHtml = view('customer_design.cart.cart_items', ['products' => $cartItems])->render();

        return response()->json([
            'success' => true,
            'cartHtml' => $cartHtml,
            'total' => $total,
            'totalItems' => $totalItems,
        ]);
    }

    /**
     * Hàm lấy thông tin giỏ hàng khi đăng nhập
     *
     * @return void
     */
    public function get_cart()
    {
        $purchaseId = session('purchase_id');
        $cartItems = [];
        $total = 0;
        $totalItems = 0;

        if ($purchaseId) {
            $cartItems = ProductPurchase::with('product')->where('purchase_id', $purchaseId)->get();
            $total = $cartItems->sum('total_amount');
            $totalItems = $cartItems->sum('quantity');
        }

        $cartHtml = view('customer_design.cart.cart_items', ['products' => $cartItems])->render();

        return response()->json([
            'cartHtml' => $cartHtml,
            'total' => $total,
            'totalItems' => $totalItems
        ]);
    }

    /**
     * Hàm xóa sản phẩm ra khỏi giỏ hàng
     *
     * @param [type] $id
     * @return void
     */
    public function remove_item_cart($id)
    {
        // Lấy purchase_id từ session
        $purchaseId = session('purchase_id');

        $productPurchase = ProductPurchase::where('purchase_id', $purchaseId)
            ->where('product_id', $id)
            ->first();

        if ($productPurchase) {
            // Cập nhật tổng giá tiền của đơn hàng
            $purchase = Purchase::find($purchaseId);
            $purchase->total_price -= $productPurchase->total_amount;
            $purchase->save();

            // Xóa sản phẩm khỏi giỏ hàng
            $productPurchase->delete();

            // Lấy thông tin cập nhật của giỏ hàng
            $cartItems = ProductPurchase::with('product')->where('purchase_id', $purchase->id)->get();
            $total = $purchase->total_price;
            $totalItems = $cartItems->sum('quantity');

            // Render lại view giỏ hàng
            $cartHtml = view('customer_design.cart.cart_items', ['products' => $cartItems])->render();

            return response()->json([
                'success' => true,
                'cartHtml' => $cartHtml,
                'total' => $total,
                'totalItems' => $totalItems
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sản phẩm không tồn tại trong giỏ hàng.'
            ]);
        }
    }


    /**
     * hàm thanh toán
     *
     * @return void
     */
    public function order()
    {
        $purchase_id = session('purchase_id');
        $item_cart = [];
        $item_sum_total = 0;
        $item_sum_quantity = 0;

        if ($purchase_id) {
            $item_cart = ProductPurchase::with('product')->where('purchase_id', $purchase_id)->get();
            $item_sum_total = $item_cart->sum('total_amount');
            $item_sum_quantity = $item_cart->sum('quantity');
        }
        return view('customer_design.cart.order', compact('item_cart', 'item_sum_total', 'item_sum_quantity', 'purchase_id'));
    }

    /**
     * hàm xử lý nút mua ngay
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function buynow_order(Request $request, $id)
    {
        $quantity = $request->input('quantity');
        $product = Product::find($id);
        $purchase_id = session('purchase_id');

        if ($quantity > $product->total) {
            return redirect()->back();
        }

        $user = auth()->user();

        if ($purchase_id) {
            $purchase = Purchase::find($purchase_id);
        } else {
            $purchase = $user->purchases->where('status', 'Chưa đặt hàng')->first();
        }

        if (!$purchase) {
            $purchase = new Purchase();
            $purchase->fill([
                'status' => 'Chưa đặt hàng',
                'user_created_id' => $user->id,
                'total_price' => 0
            ])->save();

            session(['purchase_id' => $purchase->id]);
        }

        $product_purchase = ProductPurchase::where('purchase_id', $purchase->id)
            ->where('product_id', $id)
            ->first();

        if ($product_purchase) {
            $product_purchase->quantity += $quantity;
            $product_purchase->total_amount = $product_purchase->quantity * $product->price;
            $product_purchase->save();
        } else {
            $product_purchase = new ProductPurchase();
            $product_purchase->fill([
                'product_id' => $id,
                'purchase_id' => $purchase->id,
                'quantity' => $quantity,
                'total_amount' => $product->price * $quantity,
                'price' => $product->price,
            ])->save();
        }

        $purchase->total_price += $product->price * $quantity;
        $purchase->save();

        session(['cart' => $purchase]);
        $item_cart = ProductPurchase::where('purchase_id', $purchase->id)->get();
        $item_sum_total = $purchase->total_price;
        $item_sum_quantity = $item_cart->sum('quantity');
        $purchase_id = $purchase->id;

        return view('customer_design.cart.order', compact('item_cart', 'item_sum_total', 'item_sum_quantity', 'purchase_id'));
    }

    /**
     * hàm cập nhật số lượng sản phẩm khi bấm nút tăng giảm
     *
     * @param Request $request
     * @return void
     */
    public function update_cart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $purchaseId = session('purchase_id');
        if (!$purchaseId) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy giỏ hàng.'
            ]);
        }

        $productPurchase = ProductPurchase::where('purchase_id', $purchaseId)
            ->where('product_id', $productId)
            ->first();

        if ($productPurchase) {
            $productPurchase->quantity = $quantity;
            $productPurchase->total_amount = $productPurchase->price * $quantity;
            $productPurchase->save();

            $purchase = Purchase::find($purchaseId);
            $purchase->total_price = ProductPurchase::where('purchase_id', $purchaseId)
                ->sum('total_amount');
            $purchase->save();

            $sum_total_price = $purchase->total_price;

            return response()->json([
                'success' => true,
                'message' => 'Số lượng cập nhật thành công.',
                'sum_total_price' => number_format($sum_total_price, 0, ',', '.')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Sản phẩm không tìm thấy trong giỏ hàng.'
        ]);
    }

    /**
     * hàm đặt hàng
     *
     * @param [type] $id
     * @return void
     */
    public function pay_order(Request $request, $id)
    {
        if (!Auth::check()) {
            toastr()->warning('Bạn cần đăng nhập để thanh toán.');
            return redirect()->back();
        }

        $purchase = Purchase::find($id);

        if (!$purchase) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
        }

        $productPurchases = ProductPurchase::where('purchase_id', $purchase->id)->get();
        if ($productPurchases->isEmpty()) {
            return redirect()->route('view_cart')->with('error', 'Đơn hàng không có sản phẩm.');
        }

        foreach ($productPurchases as $productPurchase) {
            $product = Product::find($productPurchase->product_id);
            if ($product->total < $productPurchase->quantity) {
                return redirect()->back()->with('error', 'Số lượng sản phẩm không đủ.');
            }

            $product->total -= $productPurchase->quantity;
            $product->save();
        }

        $user = User::find($purchase->user_created_id);
        $user->update([
            'phone_number' => $request->phone_number,
        ]);

        $purchase->update([
            'address' => $request->address,
            'status' => 'Chờ xác nhận',
            'note' => $request->input('note1') . ', ' . $request->input('note2'),
        ]);

        session()->forget('purchase_id');
        session()->forget('cart');

        return redirect()->route('order_success')->with('success', 'Đơn hàng đã được đặt hàng thành công.');
    }

    /**
     * hàm điều hướng đến trang khi đặt hàng thành công
     *
     * @return void
     */
    public function order_success()
    {
        $categories = Categories::all();
        return view('customer_design.cart.order_success', compact('categories'));
    }

    /**
     * hàm xem lịch sử các đơn hàng
     *
     * @return void
     */
    public function history_order()
    {
        $categories = Categories::all();
        $user = auth()->user();
        $purchases = Purchase::where('status', '!=', 'Chưa đặt hàng')
            ->where('user_created_id', $user->id)
            ->with('product_purchases.product')
            ->latest()
            ->get();

        return view('customer_design.cart.history_order', compact('categories', 'purchases'));
    }

    /**
     * hàm hủy đặt hàng
     *
     * @param [type] $id
     * @return void
     */
    public function cancel_order($id)
    {
        $purchase = Purchase::find($id);
        $item_purchases = ProductPurchase::where('purchase_id', $id)->get();

        foreach ($item_purchases as $item_purchase) {
            $item = Product::find($item_purchase->product_id);
            $item->update([
                'total' => $item->total + $item_purchase->quantity,
            ]);
        }

        $purchase->update([
            'status' => 'Đã hủy',
            'note' => 'Khách hàng đã hủy',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Bạn đã hủy đơn hàng thành công'
        ]);
    }

    /**
     * hàm xử lý mua lại đơn hàng
     *
     * @param [type] $id
     * @return void
     */
    public function buyback($id)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Bạn cần đăng nhập để mua lại đơn hàng.'
            ]);
        }

        $current_purchaseId = session('purchase_id');
        if ($current_purchaseId) {
            $current_purchase = Purchase::find($current_purchaseId);
            if ($current_purchase && $current_purchase->products()->count() > 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Giỏ hàng của bạn đã có sản phẩm. Không thể mua lại.'
                ]);
            }
        }

        $purchase = Purchase::find($id);

        if (!$purchase || $purchase->status == 'Chưa đặt hàng') {
            return response()->json([
                'success' => false,
                'message' => 'Đơn hàng không hợp lệ.'
            ]);
        }

        $new_purchase = new Purchase();
        $new_purchase->fill([
            'status' => 'Chưa đặt hàng',
            'user_created_id' => auth()->id(),
            'total_price' => 0
        ])->save();

        $cart_items = [];

        foreach ($purchase->product_purchases as $item) {
            $product_purchase = new ProductPurchase();
            $product_purchase->fill([
                'product_id' => $item->product_id,
                'purchase_id' => $new_purchase->id,
                'quantity' => $item->quantity,
                'total_amount' => $item->total_amount,
                'price' => $item->price,
            ])->save();

            $new_purchase->total_price += $item->total_amount;
            $cart_items[] = $product_purchase;
        }
        $new_purchase->save();

        session(['purchase_id' => $new_purchase->id]);
        $cartHtml = view('customer_design.cart.cart_items', ['products' => $cart_items])->render();

        return response()->json([
            'success' => true,
            'message' => 'Mua lại đơn hàng thành công.',
            'purchase_id' => $new_purchase->id,
            'cartHtml' => $cartHtml,
            'total' => $new_purchase->total_price,
            'totalItems' => count($cart_items)
        ]);
    }

    /**
     * hàm điều hướng đến trang xem chi tiết sản phẩm
     *
     * @param [type] $id
     * @return void
     */
    public function product_detail($id)
    {
        $categories = Categories::all();
        $product = Product::find($id);
        return view('customer_design.product.product_detail', compact('product', 'categories'));
    }

    /**
     * hàm mở modal xem chi tiết sản phẩm
     *
     * @param Request $request
     * @return void
     */
    public function get_product_detail(Request $request)
    {
        $product = Product::find($request->id);
        return response()->json($product);
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

    public function edit_profile()
    {
        $categories = Categories::all();
        $user = User::find(auth()->id());
        return view('customer_design.account.edit_profile', compact('categories', 'user'));
    }

    public function handle_edit(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            toastr()->error('Tài khoản của bạn không tồn tại.');
            return redirect()->back();
        }

        $user->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'birthday' => $request->birthday,
            'city' => $request->cityId . ', ' . $request->districtId,
        ]);

        toastr()->success('Thông tin tài khoản đã được sửa thành công.');
        return redirect()->route('profile');
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
        return redirect()->back();
    }
}

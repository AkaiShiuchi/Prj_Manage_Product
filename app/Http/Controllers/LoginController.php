<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateLogin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function display()
    {
        return view('authentication.login');
    }

    public function handle_login(ValidateLogin $request)
    {
        $check = $request->only('email', 'password');

        $user = User::where('email', $request->email)->first();

        if (Auth::attempt($check)) {
            if (Auth::user()->status === 1) {
                return redirect()->route('home');
            }
            return redirect()->back()->with('mess', 'Tài khoản của bạn chưa được kích hoạt, 
        click vào <a href="' . route('get_actived') . '">đây để tiến hành kích hoạt</a>');
        }

        toastr()->error('Đăng nhập thất bại');
        return redirect()->route('authentication.login')->with('err', 'email hoặc mật khẩu không chính xác');
    }

    public function forget_pass()
    {
        return view('authentication.forget_pass');
    }

    public function handle_forget(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users'
        ], [
            'email.required' => 'Địa chỉ email không hợp lệ',
            'email.exists' => 'Email này không tồn tại'
        ]);

        $token = Str::random(10);
        $user = User::where('email', $request->email)->first();
        $user->update(['token' => $token]);

        Mail::send('authentication.check_email', compact('user'), function ($email) use ($user) {
            $email->subject('Lấy lại mật khẩu');
            $email->to($user->email, $user->name);
        });
        return redirect()->back()->with('message', 'Vui lòng kiểm tra email để đặt lại mật khẩu');
    }

    public function get_pass(User $user, $token)
    {
        if ($user->token === $token) {
            return view('authentication.get_password', compact('user', 'token'));
        }

        return abort(404);
    }

    public function handle_get(User $user, $token, Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if ($user->token === $token) {
            $user->update([
                'password' => bcrypt($request->password),
                'token' => null
            ]);
            return redirect()->route('authentication.login')->with('message', 'Đặt lại mật khẩu thành công, bạn có thể đăng nhập');
        }

        return redirect()->back();
    }
}

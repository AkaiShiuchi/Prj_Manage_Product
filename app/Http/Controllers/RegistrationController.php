<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRegister;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    /**
     * function display view register
     *
     * @return void
     */
    public function display()
    {
        return view('authentication.register');
    }

    /**
     * function handle form submit register
     *
     * @param ValidateRegister $request
     * @return void
     */
    public function store(ValidateRegister $request)
    {
        $input = DB::table('users')->where('email', $request->email)
            ->first();

        if (!$input) {
            $user = new User();

            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'remember_token' => Str::random('10'),
            ])->save();

            if ($user) {
                Mail::send('authentication.active_account', compact('user'), function ($email) use ($user) {
                    $email->subject('xác nhận tài khoản');
                    $email->to($user->email, $user->name);
                });
                // dispatch(new SendEmailJob($user));
                // Queue::push(new SendEmailJob($user));
                // dd(dispatch(new SendEmailJob($user)));
                toastr()->success('You create account successful');
                return redirect()->route('authentication.login')->with('message', 'Đăng kí thành công, vui lòng kiểm tra email để xác nhận tài khoản');
            }
        }

        toastr()->error('Account already exists');
        return redirect()->route('authentication.register');
    }

    /**
     * function button in message check account gmail
     *
     * @param User $user
     * @param [type] $remember_token
     * @return void
     */
    public function actived($id)
    {
        // dd($id);
        $user = User::find($id);
        // $user = User::where('remember_token', $remember_token)->first();
        if ($user) {
            $user->update([
                'status' => 1,
                'remember_token' => null
            ]);

            toastr()->success('Xác nhận tài khoản thành công');
            return redirect()->route('authentication.login');
        } else {
            return redirect()->route('authentication.register')->with('no', 'Mã xác nhận bạn gửi không hợp lệ');
        }
    }

    /**
     * function display view form check account
     *
     * @return void
     */
    public function get_actived()
    {
        return view('authentication.get_actived');
    }

    /**
     * function handle check account in gmail
     *
     * @param Request $request
     * @return void
     */
    public function post_get(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users'
        ], [
            'email.required' => 'Địa chỉ email không hợp lệ',
            'email.exists' => 'Email này không tồn tại'
        ]);

        $remember_token = Str::random(10);
        $user = User::where('email', $request->email)->first();
        $user->update(['remember_token' => $remember_token]);

        Mail::send('authentication.active_account', compact('user'), function ($email) use ($user) {
            $email->subject('xác nhận tài khoản');
            $email->to($user->email, $user->name);
        });
        return redirect()->back()->with('message', 'Vui lòng kiểm tra email để kích hoạt tài khoản');
    }
}
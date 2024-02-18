<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function display()
    {
        return view('authentication.register');
    }

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
                'token' => Str::random('10'),
            ])->save();

            if ($user) {
                Mail::send('authentication.active_account', compact('user'), function ($email) use ($user) {
                    $email->subject('xác nhận tài khoản');
                    $email->to($user->email, $user->name);
                });
                toastr()->success('You create account successful');
                return redirect()->route('authentication.login');
            }
        }

        toastr()->error('Account already exists');
        return redirect()->route('authentication.register');
    }

    public function actived(User $user, $token)
    {
        if ($user->token === $token) {
            $user->update(['status' => 1, 'token' => null]);

            toastr()->success('Xác nhận tài khoản thành công');
            return redirect()->route('authentication.login');
        } else {
            return redirect()->route('authentication.register')->with('no', 'Mã xác nhận bạn gửi không hợp lệ');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RegistrationController extends Controller
{
    public function display()
    {
        return view('authentication.register');
    }

    public function store(Request $request)
    {
        $input = DB::table('users')->where('email', $request->email)
            ->first();

        if (!$input) {
            $user = new User();

            $user->fill([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ])->save();

            toastr()->success('You create account successful');
            return redirect()->route('login');
        }

        toastr()->error('Account already exists');
        return redirect()->route('authentication.register');
    }
}

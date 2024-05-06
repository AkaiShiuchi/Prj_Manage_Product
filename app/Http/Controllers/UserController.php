<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateNewUser;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * hàm hiển thị trang user manage
     *
     * @return void
     */
    public function user_manage()
    {
        $users = User::paginate(10);
        return view('users.user_manage', compact('users'));
    }

    /**
     * Hàm thêm mới user
     *
     * @param ValidateNewUser $request
     * @return void
     */
    public function add_user(ValidateNewUser $request)
    {
        $input = User::where('email', $request->email)->first();

        if (!$input) {
            $newUser = new User();

            $newUser->fill([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'status' => 1
            ]);
            if ($request->user_role === 'Administrator') {
                $newUser->fill(['role_id' => 1]);
            } else {
                $newUser->fill(['role_id' => 2]);
            }
            $newUser->save();
            session()->flashInput($request->input());
            toastr()->success('User added successfully.');
            return redirect()->back();
        }
        toastr()->error('This user already exists.');
        return redirect()->back();
    }


    public function detail_user($id)
    {
        $user = User::find($id);
        $cus_purchase = Purchase::where('user_created_id', $id)->latest()->paginate(6);
        // dd($cus_purchase);
        $customer_purchase = Purchase::where('user_created_id', $id)
            ->where('status', 'paid')->latest()->paginate(6);

        return view('users.user_detail', compact('user', 'cus_purchase', 'customer_purchase'));
    }

    /**
     * Hàm phân quyền người dùng
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update_role(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            if ($request->role === 'Administrator') {
                $user->update([
                    'role_id' => 1,
                ]);
            } else {
                $user->update([
                    'role_id' => 2,
                ]);
            }
            toastr()->success('Update role user successfully.');
            return response()->json(['message' => 'success'], 200);
            // return redirect()->back();
        }
        toastr()->error('User does not found.');
        return response()->json(['message' => 'error'], 404);
        // return redirect()->back();
    }

    /**
     * Hàm xóa tài khoản
     *
     * @param [type] $id
     * @return void
     */
    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();
        toastr()->success('Delete user successfully.');
        return redirect()->back();
    }
}

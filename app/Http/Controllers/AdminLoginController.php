<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function adminLoginForm()
    {
        return view('auth.loginadmin');
    }

    public function adminLogin(Request $request)
    {
            $this->validate($request, [
                'username'   => 'required',
                'password' => 'required|min:6'
            ]);

            if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {

                return redirect()->intended('/admin');
            }
            return back()->withInput($request->only('username', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login/admin');
    }
}

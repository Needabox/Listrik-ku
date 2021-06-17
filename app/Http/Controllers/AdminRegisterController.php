<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class AdminRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function adminRegisterForm()
    {
        return view('auth.registeradmin', ['url' => 'admin']);
    }

    protected function createAdmin(Request $request)
    {
        //$this->validator($request->all())->validate();
        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_admin' => $request->nama_admin,
        ]);
        return redirect()->intended('login/admin');
    }
}

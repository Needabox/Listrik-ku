<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Tarif;
use App\Models\Pelanggan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/pelanggan';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:pelanggan'],
            'password' => ['required', 'string', 'min:8'],
            'nomor_kwh' => ['required', 'string', 'min:5'],
            'nama_pelanggan' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'id_tarif' => ['required'],
        ]);
    }

    protected function create(array $data)
    {
        //dd($data);

        //$tarif = Tarif::find($request->id_tarif);

        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nomor_kwh' => $data['nomor_kwh'],
            'nama_pelanggan' => $data['nama_pelanggan'],
            'alamat' => $data['alamat'],
            'id_tarif' => $data['id_tarif'],
        ]);
    }
}

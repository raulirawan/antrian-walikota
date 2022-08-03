<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use RealRashid\SweetAlert\Facades\Alert;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'email' => ['required', 'unique:users,email'],
                'username' => ['required', 'unique:users,username'],
                'nik' => ['required', 'unique:users,nik'],
            ],
            [
                'password.confirmed' => 'Konfirmasi Password Tidak Sama!',
                'email.unique' => 'Email Sudah Terdaftar!',
                'username.unique' => 'Username Sudah Terdaftar',
                'nik.unique' => 'NIK Sudah Terdaftar',
            ]
        );
        $data = new User();
        $data->nik = $request->nik;
        $data->name = $request->nama;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->nomor_handphone = $request->nomor_handphone;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->provinsi = Province::where('id', $request->provinsi)->first()->name ?? '';
        $data->kota = Regency::where('id', $request->kota)->first()->name ?? '';
        $data->kecamatan = District::where('id', $request->kecamatan)->first()->name ?? '';
        $data->kelurahan = Village::where('id', $request->kelurahan)->first()->name ?? '';
        $data->alamat = $request->alamat;
        $data->roles = 'PEMOHON';
        $data->save();

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            Alert::success('success','Berhasil Register!');
            return redirect()->route('dashboard.index');
        } else {
            Alert::error('error','Gagal Register Cobal Lagi Ya!');
            return redirect()->route('register');
        }
    }
}

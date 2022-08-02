<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use RealRashid\SweetAlert\Facades\Alert;

class PemohonController extends Controller
{
    public function index()
    {
        $data = User::where('roles', 'PEMOHON')->orderBy('created_at', 'DESC')->get();
        return view('admin.pemohon.index', compact('data'));
    }

    public function create()
    {
        return view('admin.pemohon.create');
    }

    public function store(Request $request)
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

        if ($data) {
            Alert::success('Success', 'Berhasil Tambah Data!');
            return redirect()->route('admin.pemohon.index');
        } else {
            Alert::error('Error', 'Gagal Tambah Data!');
            return redirect()->route('admin.pemohon.index');
        }
    }

    public function edit($id)
    {
        $item = User::findOrFail($id);
        return view('admin.pemohon.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'email' => ['required', 'unique:users,email,'.$id],
                'username' => ['required', 'unique:users,username,'.$id],
                'nik' => ['required', 'unique:users,nik,'.$id],
            ],
            [
                'email.unique' => 'Email Sudah Terdaftar!',
                'username.unique' => 'Username Sudah Terdaftar',
                'nik.unique' => 'NIK Sudah Terdaftar',
            ]
        );
        $data = User::findOrFail($id);
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

        if ($data) {
            Alert::success('Success', 'Berhasil Update Data!');
            return redirect()->route('admin.pemohon.index');
        } else {
            Alert::error('Error', 'Gagal Update Data!');
            return redirect()->route('admin.pemohon.index');
        }
    }

    public function delete($id)
    {
        $data = User::findOrFail($id);

        if ($data) {
            try {
                $data->delete();
                Alert::success('Success', 'Berhasil Hapus Data!');
                return redirect()->route('admin.pemohon.index');
            } catch (\Throwable $e) {
                Alert::error('Error', 'Gagal Hapus Data Karena Berelasi Dengan Tabel Lain!');
                return redirect()->route('admin.pemohon.index');
            }
        } else {
            Alert::error('Error', 'Gagal Hapus Data!');
            return redirect()->route('admin.pemohon.index');
        }
    }
}

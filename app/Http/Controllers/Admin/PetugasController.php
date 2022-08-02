<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    public function index()
    {
        $data = User::where('roles','PETUGAS')->orderBy('created_at', 'DESC')->get();
        return view('admin.petugas.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'unique:users,email'],
                'username' => ['required', 'unique:users,username'],
            ],
            [
                'email.unique' => 'Email Sudah Terdaftar!',
                'username.unique' => 'Username Sudah Terdaftar',
            ]
        );
        $data = new User();
        $data->name = $request->nama_petugas;
        $data->username = $request->username;
        $data->kantor_id = $request->kantor_id;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->roles = 'PETUGAS';
        $data->save();

        if ($data) {
            Alert::success('Success', 'Berhasil Tambah Data!');
            return redirect()->route('admin.petugas.index');
        } else {
            Alert::error('Error', 'Gagal Tambah Data!');
            return redirect()->route('admin.petugas.index');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'email_edit' => ['required', 'unique:users,email,'.$id],
                'username_edit' => ['required', 'unique:users,username,'.$id],
            ],
            [
                'email_edit.unique' => 'Email Sudah Terdaftar!',
                'username_edit.unique' => 'Username Sudah Terdaftar',
            ]
        );

        $data = User::findOrFail($id);
        $data->name = $request->nama_petugas;
        $data->username = $request->username_edit;
        $data->kantor_id = $request->kantor_id;
        $data->email = $request->email_edit;
        $data->save();


        if ($data) {
            Alert::success('Success', 'Berhasil Update Data!');
            return redirect()->route('admin.petugas.index');
        } else {
            Alert::error('Error', 'Gagal Update Data!');
            return redirect()->route('admin.petugas.index');
        }
    }

    public function delete($id)
    {
        $data = User::findOrFail($id);

        if ($data) {
            try {
                $data->delete();
                Alert::success('Success', 'Berhasil Hapus Data!');
                return redirect()->route('admin.petugas.index');
            } catch (\Throwable $e) {
                Alert::error('Error', 'Gagal Hapus Data Karena Berelasi Dengan Tabel Lain!');
                return redirect()->route('admin.petugas.index');
            }
        } else {
            Alert::error('Error', 'Gagal Hapus Data!');
            return redirect()->route('admin.petugas.index');
        }
    }
}

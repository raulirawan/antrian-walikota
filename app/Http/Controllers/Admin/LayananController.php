<?php

namespace App\Http\Controllers\Admin;

use App\Layanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LayananController extends Controller
{
    public function index()
    {
        $data = Layanan::orderBy('created_at', 'DESC')->get();
        return view('admin.layanan.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Layanan();
        $data->nama_layanan = $request->nama_layanan;
        $data->save();

        if ($data) {
            Alert::success('Success', 'Berhasil Tambah Data!');
            return redirect()->route('admin.layanan.index');
        } else {
            Alert::error('Error', 'Gagal Tambah Data!');
            return redirect()->route('admin.layanan.index');
        }
    }

    public function update(Request $request, $id)
    {
        $data = Layanan::findOrFail($id);
        $data->nama_layanan = $request->nama_layanan;
        $data->save();

        if ($data) {
            Alert::success('Success', 'Berhasil Update Data!');
            return redirect()->route('admin.layanan.index');
        } else {
            Alert::error('Error', 'Gagal Update Data!');
            return redirect()->route('admin.layanan.index');
        }
    }

    public function delete($id)
    {
        $data = Layanan::findOrFail($id);

        if ($data) {
            try {
                $data->delete();
                Alert::success('Success', 'Berhasil Hapus Data!');
                return redirect()->route('admin.layanan.index');
            } catch (\Throwable $e) {
                Alert::error('Error', 'Gagal Hapus Data Karena Berelasi Dengan Tabel Lain!');
                return redirect()->route('admin.layanan.index');
            }
        } else {
            Alert::error('Error', 'Gagal Hapus Data!');
            return redirect()->route('admin.layanan.index');
        }
    }
}

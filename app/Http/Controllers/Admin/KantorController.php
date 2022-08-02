<?php

namespace App\Http\Controllers\Admin;

use App\Kantor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class KantorController extends Controller
{
    public function index()
    {
        $data = Kantor::orderBy('created_at', 'DESC')->get();
        return view('admin.kantor.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Kantor();
        $data->nama_kantor = $request->nama_kantor;
        $data->alamat = $request->alamat;
        $data->link_maps = $request->link_maps;
        $data->save();

        if ($data) {
            Alert::success('Success', 'Berhasil Tambah Data!');
            return redirect()->route('admin.kantor.index');
        } else {
            Alert::error('Error', 'Gagal Tambah Data!');
            return redirect()->route('admin.kantor.index');
        }
    }

    public function update(Request $request, $id)
    {
        $data = Kantor::findOrFail($id);
        $data->nama_kantor = $request->nama_kantor;
        $data->alamat = $request->alamat;
        $data->link_maps = $request->link_maps;
        $data->save();

        if ($data) {
            Alert::success('Success', 'Berhasil Update Data!');
            return redirect()->route('admin.kantor.index');
        } else {
            Alert::error('Error', 'Gagal Update Data!');
            return redirect()->route('admin.kantor.index');
        }
    }

    public function delete($id)
    {
        $data = Kantor::findOrFail($id);

        if ($data) {
            try {
                $data->delete();
                Alert::success('Success', 'Berhasil Hapus Data!');
                return redirect()->route('admin.kantor.index');
            } catch (\Throwable $e) {
                Alert::error('Error', 'Gagal Hapus Data Karena Berelasi Dengan Tabel Lain!');
                return redirect()->route('admin.kantor.index');
            }
        } else {
            Alert::error('Error', 'Gagal Hapus Data!');
            return redirect()->route('admin.kantor.index');
        }
    }
}

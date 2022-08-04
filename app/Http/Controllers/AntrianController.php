<?php

namespace App\Http\Controllers;

use App\Antrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AntrianController extends Controller
{
    public function index()
    {
        return view('pages.form-antrian-new');
    }

    public function store(Request $request)
    {
        $kode_booking = 'JB-'.mt_rand(00000,99999);
        $antrian = new Antrian();
        $antrian->user_id = Auth::user()->id;
        $antrian->layanan_id = $request->layanan_id;
        $antrian->kantor_id = $request->kantor_id;
        $antrian->kode_booking = $kode_booking;
        $antrian->tanggal_kedatangan = $request->tanggal_kedatangan;
        $antrian->waktu_kedatangan = $request->waktu_kedatangan;
        $antrian->jumlah_pemohon = $request->jumlah_pemohon;
        $antrian->status = 'PENDING';
        $antrian->save();

        if($antrian) {
            Alert::success('success','Data Antrian Berhasil di Buat '.$kode_booking);
            return redirect()->route('antrian.data');
        } else {
            Alert::error('error','Data Antrian Gagal di Buat '.$kode_booking);
            return redirect()->back();
        }
    }
    public function dataAntrian()
    {
        return view('pages.data-antrian');
    }

    public function detailAntrian($id)
    {
        $antrian = Antrian::where(['id' => $id, 'user_id' => Auth::user()->id])->firstOrFail();

        return view('pages.detail-antrian', compact('antrian'));
    }
}

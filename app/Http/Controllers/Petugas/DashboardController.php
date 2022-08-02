<?php

namespace App\Http\Controllers\Petugas;

use App\Antrian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                if ($request->from_date === $request->to_date) {
                    $query  = Antrian::query();
                    if ($request->status != 'SEMUA') {
                        $query->with(['layanan', 'kantor', 'user'])
                            ->whereDate('created_at', $request->from_date)
                            ->where('status', $request->status)
                            ->where('kantor_id', Auth::user()->kantor_id);
                    } else {
                        $query->with(['layanan', 'kantor', 'user'])
                            ->whereDate('created_at', $request->from_date);
                    }
                } else {
                    $query  = Antrian::query();
                    if ($request->status != 'SEMUA') {
                        $query->with(['layanan', 'kantor', 'user'])
                            ->whereBetween('created_at', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59'])
                            ->where('status', $request->status)
                            ->where('kantor_id', Auth::user()->kantor_id);
                    } else {
                        $query->with(['layanan', 'kantor', 'user'])
                            ->whereBetween('created_at', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59'])
                            ->where('kantor_id', Auth::user()->kantor_id);;
                    }
                }
            } else {
                $today = date('Y-m-d');
                $query  = Antrian::query();
                if ($request->status != 'SEMUA') {
                    $query->with(['layanan', 'kantor', 'user'])
                        ->whereDate('created_at', $today)
                        ->where('status', $request->status)
                        ->where('kantor_id', Auth::user()->kantor_id);
                } else {
                    $query->with(['layanan', 'kantor', 'user'])
                        ->whereDate('created_at', $today)
                        ->where('kantor_id', Auth::user()->kantor_id);
                }
            }

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    if($item->status == 'PENDING') {
                        return '
                    <a
                    href="'.route('petugas.terima.antrian', $item->id).'"
                    class="btn btn-success btn-sm"
                    onclick="return confirm(' . "'Yakin ?'" . ')"
                    >Terima</a>
                    <a
                    href="'.route('petugas.tolak.antrian', $item->id).'"
                    class="btn btn-danger btn-sm" onclick="return confirm(' . "'Yakin ?'" . ')">Tolak</>
                    ';
                    }
                })
                ->editColumn('status', function ($item) {
                    if ($item->status == 'PENDING') {
                        return '<span class="badge badge-warning">PENDING</span>';
                    } elseif ($item->status == 'BATAL') {
                        return '<span class="badge badge-danger">BATAL</span>';
                    } elseif ($item->status == 'SELESAI') {
                        return '<span class="badge badge-success">SELESAI</span>';
                    } else {
                        return '<span class="badge badge-danger">NOTHING</span>';
                    }
                })
                ->editColumn('created_at', function ($item) {
                    $date = Carbon::parse($item->created_at)->locale('id');
                    $date->settings(['formatFunction' => 'translatedFormat']);
                    return $date->format('l, j F Y  h:i'); // Selasa, 16 Maret 2021 ; 08:27 pagi
                })
                ->rawColumns(['action', 'status'])
                ->make();
        }

        return view('petugas.dashboard');
    }

    public function terima($id)
    {
        $antrian = Antrian::findOrFail($id);

        $antrian->status = 'SELESAI';
        $antrian->save();

        if ($antrian) {
            Alert::success('Success', 'Berhasil Update Data!');
            return redirect()->route('petugas.dashboard.index');
        } else {
            Alert::error('Error', 'Gagal Update Data!');
            return redirect()->route('petugas.dashboard.index');
        }
    }

    public function tolak($id)
    {
        $antrian = Antrian::findOrFail($id);

        $antrian->status = 'BATAL';
        $antrian->save();

        if ($antrian) {
            Alert::success('Success', 'Berhasil Update Data!');
            return redirect()->route('petugas.dashboard.index');
        } else {
            Alert::error('Error', 'Gagal Update Data!');
            return redirect()->route('petugas.dashboard.index');
        }
    }
}

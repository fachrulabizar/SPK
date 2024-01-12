<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_pegawai = Pegawai::count();
        $ranking1 = DB::table('t_nilai_akhir')
        ->select('m_pegawai.nama', 't_nilai_akhir.nilai_akhir')
        ->join('m_pegawai', 'm_pegawai.id', '=', 't_nilai_akhir.pegawai_id')
        ->orderBy('t_nilai_akhir.nilai_akhir', 'DESC')
        ->first();
        $sepuluhTerbesarNama = DB::table('t_nilai_akhir')
        ->select('m_pegawai.nama', 't_nilai_akhir.nilai_akhir')
        ->join('m_pegawai', 'm_pegawai.id', '=', 't_nilai_akhir.pegawai_id')
        ->orderBy('t_nilai_akhir.nilai_akhir', 'DESC')
        ->take(10)
        ->pluck('nama');
        $sepuluhTerbesarData = DB::table('t_nilai_akhir')
        ->select('m_pegawai.nama', 't_nilai_akhir.nilai_akhir')
        ->join('m_pegawai', 'm_pegawai.id', '=', 't_nilai_akhir.pegawai_id')
        ->orderBy('t_nilai_akhir.nilai_akhir', 'DESC')
        ->take(10)
        ->pluck('nilai_akhir');
        // dd($sepuluhTerbesarData);
        return view('dashboard.dashboard', compact(['jumlah_pegawai', 'ranking1', 'sepuluhTerbesarNama', 'sepuluhTerbesarData']));
    }
}

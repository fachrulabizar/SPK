<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $dataAlternatifNama = DB::table('t_nilai_akhir')
        ->select('m_pegawai.nama', 't_nilai_akhir.nilai_akhir')
        ->join('m_pegawai', 'm_pegawai.id', '=', 't_nilai_akhir.pegawai_id')
        ->pluck('nama');
        $dataAlternatifData = DB::table('t_nilai_akhir')
        ->select('m_pegawai.nama', 't_nilai_akhir.nilai_akhir')
        ->join('m_pegawai', 'm_pegawai.id', '=', 't_nilai_akhir.pegawai_id')
        ->pluck('nilai_akhir');

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
        // dd($dataAlternatifNama);
        return view('calculation', compact(['dataAlternatifNama', 'dataAlternatifData', 'sepuluhTerbesarNama', 'sepuluhTerbesarData']));
    }
}

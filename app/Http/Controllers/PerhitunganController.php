<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerhitunganController extends Controller
{
    public function indexAlternatif()
    {
        $data = DB::table('t_data_alternatif')
        ->select('t_data_alternatif.*', 'm_pegawai.nama as nama_pegawai')
        ->join('m_pegawai', 't_data_alternatif.pegawai_id', '=', 'm_pegawai.id')
        ->orderBy('m_pegawai.nama', 'ASC')
        ->get();
        return view('dashboard.data-alternatif.index', compact('data'));
    }
    public function indexRanking()
    {
        $data = DB::table('t_nilai_akhir')
        ->select('t_nilai_akhir.*', 'm_pegawai.nama as nama_pegawai')
        ->join('m_pegawai', 't_nilai_akhir.pegawai_id', '=', 'm_pegawai.id')
        ->orderBy('t_nilai_akhir.nilai_akhir', 'DESC')
        ->get();
        return view('dashboard.data-ranking.index', compact(['data']));
    }
}

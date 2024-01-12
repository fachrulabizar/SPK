<?php

namespace App\Http\Controllers;

use App\Models\Usia;
use App\Models\Keahlian;
use App\Models\Kriteria;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use Illuminate\Http\Request;
use App\Models\PosisiJabatan;

class KriteriaController extends Controller
{
    public function indexBobot()
    {
        $data = Kriteria::all();
        return view('dashboard.bobot.index', compact('data'));
    }
    public function indexPengalaman()
    {
        $data = Pengalaman::all();
        return view('dashboard.pengalaman.index', compact('data'));
    }
    public function indexKeahlian()
    {
        $data = Keahlian::all();
        return view('dashboard.keahlian.index', compact('data'));
    }
    public function indexPendidikan()
    {
        $data = Pendidikan::all();
        return view('dashboard.pendidikan.index', compact('data'));
    }
    public function indexPosisiJabatan()
    {
        $data = PosisiJabatan::all();
        return view('dashboard.posisi-jabatan.index', compact('data'));
    }
    public function indexUsia()
    {
        $data = Usia::all();
        return view('dashboard.usia.index', compact('data'));
    }
}

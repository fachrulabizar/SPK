<?php

namespace App\Http\Controllers;

use App\Models\Usia;
use App\Models\Pegawai;
use App\Models\Keahlian;
use App\Models\Kriteria;
use App\Models\NilaiAkhir;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use Illuminate\Http\Request;
use App\Models\PosisiJabatan;
use App\Models\DataAlternatif;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = DB::table('m_pegawai')
        ->select('m_pegawai.*', 'm_pengalaman.range as range_pengalaman', 'm_keahlian.range as range_keahlian', 'm_pendidikan.range as range_pendidikan', 'm_posisi_jabatan.range as range_posisi_jabatan', 'm_usia.range as range_usia')
        ->join('m_pengalaman', 'm_pegawai.pengalaman_id', '=', 'm_pengalaman.id')
        ->join('m_keahlian', 'm_pegawai.bidang_keahlian_id', '=', 'm_keahlian.id')
        ->join('m_pendidikan', 'm_pegawai.pendidikan_id', '=', 'm_pendidikan.id')
        ->join('m_posisi_jabatan', 'm_pegawai.posisi_jabatan_id', '=', 'm_posisi_jabatan.id')
        ->join('m_usia', 'm_pegawai.usia_id', '=', 'm_usia.id')
        ->orderBy('m_pegawai.nama', 'ASC')
        ->get();
        // dd($data);
        $pengalaman = Pengalaman::all();
        $bidang_keahlian = Keahlian::all();
        $pendidikan = Pendidikan::all();
        $posisi_jabatan = PosisiJabatan::all();
        $usia = Usia::all();
        return view('dashboard.pegawai.index', compact(['data', 'pengalaman', 'bidang_keahlian', 'pendidikan', 'posisi_jabatan', 'usia']));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date'
        ]);

        $pengalaman = Pengalaman::where('id', $request->pengalaman)->pluck('nilai')->first();
        $bidang_keahlian = Keahlian::where('id', $request->bidang_keahlian)->pluck('nilai')->first();
        $pendidikan = Pendidikan::where('id', $request->pendidikan)->pluck('nilai')->first();
        $posisi_jabatan = PosisiJabatan::where('id', $request->posisi_jabatan)->pluck('nilai')->first();
        $usia = Usia::where('id', $request->usia)->pluck('nilai')->first();

        $max_pengalaman = Pengalaman::max('nilai');
        $min_pengalaman = Pengalaman::min('nilai');

        $max_bidang_keahlian = Keahlian::max('nilai');
        $min_bidang_keahlian = Keahlian::min('nilai');
        
        $max_pendidikan = Pendidikan::max('nilai');
        $min_pendidikan = Pendidikan::min('nilai');

        $max_posisi_jabatan = PosisiJabatan::max('nilai');
        $min_posisi_jabatan = PosisiJabatan::min('nilai');;

        $max_usia = Usia::max('nilai');
        $min_usia = Usia::min('nilai');

        $da_pengalaman = ($pengalaman - $min_pengalaman)/($max_pengalaman - $min_pengalaman);
        $da_bidang_keahlian = ($bidang_keahlian - $min_bidang_keahlian)/($max_bidang_keahlian - $min_bidang_keahlian);
        $da_pendidikan = ($pendidikan - $min_pendidikan)/($max_pendidikan - $min_pendidikan);
        $da_posisi_jabatan = ($max_posisi_jabatan - $posisi_jabatan)/($max_posisi_jabatan - $min_posisi_jabatan);
        $da_usia = ($usia - $min_usia)/($max_usia-$min_usia);

        $n_pengalaman = Kriteria::where('kode', 'C1')->pluck('normalisasi')->first();
        $n_bidang_keahlian = Kriteria::where('kode', 'C2')->pluck('normalisasi')->first();
        $n_pendidikan = Kriteria::where('kode', 'C3')->pluck('normalisasi')->first();
        $n_posisi_jabatan = Kriteria::where('kode', 'C4')->pluck('normalisasi')->first();
        $n_usia = Kriteria::where('kode', 'C5')->pluck('normalisasi')->first();

        $na_pengalaman = $da_pengalaman*$n_pengalaman;
        $na_bidang_keahlian = $da_bidang_keahlian*$n_bidang_keahlian;
        $na_pendidikan = $da_pendidikan*$n_pendidikan;
        $na_posisi_jabatan = $da_posisi_jabatan*$n_posisi_jabatan;
        $na_usia = $da_usia*$n_usia;
        $na_nilai_akhir = $na_pengalaman+$na_bidang_keahlian+$na_pendidikan+$na_posisi_jabatan+$na_usia;
        // dd($na_pengalaman);
        
        // return response()->json([
        //     $n_pengalaman,
        //     $n_bidang_keahlian,
        //     $n_pendidikan,
        //     $n_posisi_jabatan,
        //     $n_usia
            
        // ]);
        
        $pegawai = Pegawai::create([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pengalaman_id' => $request->pengalaman,
            'bidang_keahlian_id' => $request->bidang_keahlian,
            'pendidikan_id' => $request->pendidikan,
            'posisi_jabatan_id' => $request->posisi_jabatan,
            'usia_id' => $request->usia,
        ]);

        $pegawaii = Pegawai::orderBy('id', 'DESC')->first();
        $data_alternatif = DataAlternatif::create([
            'pegawai_id' => $pegawaii->id,
            'pengalaman' => $da_pengalaman,
            'bidang_keahlian' => $da_bidang_keahlian,
            'pendidikan' => $da_pendidikan,
            'posisi_jabatan' => $da_posisi_jabatan,
            'usia' => $da_usia
        ]);
        $data_nilai_akhir = NilaiAkhir::create([
            'pegawai_id' => $pegawaii->id,
            'pengalaman' => $na_pengalaman,
            'bidang_keahlian' => $na_bidang_keahlian,
            'pendidikan' => $na_pendidikan,
            'posisi_jabatan' => $na_posisi_jabatan,
            'usia' => $na_usia,
            'nilai_akhir' => $na_nilai_akhir

        ]);

        return redirect('/pegawai')->with('message', 'Data Berhasil Disimpan');
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date'
        ]);

        $pengalaman = Pengalaman::where('id', $request->pengalaman)->pluck('nilai')->first();
        $bidang_keahlian = Keahlian::where('id', $request->bidang_keahlian)->pluck('nilai')->first();
        $pendidikan = Pendidikan::where('id', $request->pendidikan)->pluck('nilai')->first();
        $posisi_jabatan = PosisiJabatan::where('id', $request->posisi_jabatan)->pluck('nilai')->first();
        $usia = Usia::where('id', $request->usia)->pluck('nilai')->first();

        $max_pengalaman = Pengalaman::max('nilai');
        $min_pengalaman = Pengalaman::min('nilai');

        $max_bidang_keahlian = Keahlian::max('nilai');
        $min_bidang_keahlian = Keahlian::min('nilai');
        
        $max_pendidikan = Pendidikan::max('nilai');
        $min_pendidikan = Pendidikan::min('nilai');

        $max_posisi_jabatan = PosisiJabatan::max('nilai');
        $min_posisi_jabatan = PosisiJabatan::min('nilai');;

        $max_usia = Usia::max('nilai');
        $min_usia = Usia::min('nilai');

        $da_pengalaman = ($pengalaman - $min_pengalaman)/($max_pengalaman - $min_pengalaman);
        $da_bidang_keahlian = ($bidang_keahlian - $min_bidang_keahlian)/($max_bidang_keahlian - $min_bidang_keahlian);
        $da_pendidikan = ($pendidikan - $min_pendidikan)/($max_pendidikan - $min_pendidikan);
        $da_posisi_jabatan = ($max_posisi_jabatan - $posisi_jabatan)/($max_posisi_jabatan - $min_posisi_jabatan);
        $da_usia = ($usia - $min_usia)/($max_usia-$min_usia);

        $n_pengalaman = Kriteria::where('kode', 'C1')->pluck('normalisasi')->first();
        $n_bidang_keahlian = Kriteria::where('kode', 'C2')->pluck('normalisasi')->first();
        $n_pendidikan = Kriteria::where('kode', 'C3')->pluck('normalisasi')->first();
        $n_posisi_jabatan = Kriteria::where('kode', 'C4')->pluck('normalisasi')->first();
        $n_usia = Kriteria::where('kode', 'C5')->pluck('normalisasi')->first();

        $na_pengalaman = $da_pengalaman*$n_pengalaman;
        $na_bidang_keahlian = $da_bidang_keahlian*$n_bidang_keahlian;
        $na_pendidikan = $da_pendidikan*$n_pendidikan;
        $na_posisi_jabatan = $da_posisi_jabatan*$n_posisi_jabatan;
        $na_usia = $da_usia*$n_usia;
        $na_nilai_akhir = $na_pengalaman+$na_bidang_keahlian+$na_pendidikan+$na_posisi_jabatan+$na_usia;
        // return response()->json([
        //     $da_pengalaman,
        //     $da_bidang_keahlian,
        //     $da_pendidikan,
        //     $da_posisi_jabatan,
        //     $da_usia
            
        // ]);
        $pegawai = Pegawai::find($id);
        $pegawai->update([
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pengalaman_id' => $request->pengalaman,
            'bidang_keahlian_id' => $request->bidang_keahlian,
            'pendidikan_id' => $request->pendidikan,
            'posisi_jabatan_id' => $request->posisi_jabatan,
            'usia_id' => $request->usia,
        ]);

        $data_alternatif = DataAlternatif::where('pegawai_id', $id)->first();
        $data_alternatif->update([
            'pengalaman' => $da_pengalaman,
            'bidang_keahlian' => $da_bidang_keahlian,
            'pendidikan' => $da_pendidikan,
            'posisi_jabatan' => $da_posisi_jabatan,
            'usia' => $da_usia
        ]);
        $data_nilai_akhir = NilaiAkhir::where('pegawai_id', $id)->first();
        $data_nilai_akhir->update([
            'pengalaman' => $na_pengalaman,
            'bidang_keahlian' => $na_bidang_keahlian,
            'pendidikan' => $na_pendidikan,
            'posisi_jabatan' => $na_posisi_jabatan,
            'usia' => $na_usia,
            'nilai_akhir' => $na_nilai_akhir

        ]);

        return redirect('/pegawai')->with('message', 'Data Berhasil Diubah');
    }
    public function delete($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();

        $data_alternatif = DataAlternatif::where('pegawai_id', $id)->first();
        $data_alternatif->delete();

        $data_nilai_akhir = NilaiAkhir::where('pegawai_id', $id)->first();
        $data_nilai_akhir->delete();

        return redirect('/pegawai')->with('message', 'Data Berhasil Dihapus');
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_kriteria')->insert([
            [
                'kode' => 'C1',
                'nama' => 'Kriteria Pengalaman',
                'bobot' => 90,
                'normalisasi' => 0.24,
            ],
            [
                'kode' => 'C2',
                'nama' => 'Kriteria Bidang keahlian',
                'bobot' => 80,
                'normalisasi' => 0.2133,
            ],
            [
                'kode' => 'C3',
                'nama' => 'Kriteria Pendidikan',
                'bobot' => 75,
                'normalisasi' => 0.2,
            ],
            [
                'kode' => 'C4',
                'nama' => 'Kriteria Posisi Jabatan',
                'bobot' => 70,
                'normalisasi' => 0.1866,
            ],
            [
                'kode' => 'C5',
                'nama' => 'Kriteria Usia',
                'bobot' => 60,
                'normalisasi' => 0.16,
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PosisiJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_posisi_jabatan')->insert([
            [
                'range' => 'Karyawan non-staff',
                'nilai' => 10,
            ],
            [
                'range' => 'Karyawan Senior non-staff',
                'nilai' => 20,
            ],
            [
                'range' => 'Karyawan Staff',
                'nilai' => 30,
            ],
            [
                'range' => 'Karyawan Senior Staff',
                'nilai' => 40,
            ],
            [
                'range' => 'Junior Manager',
                'nilai' => 50,
            ],
            [
                'range' => 'Manager',
                'nilai' => 60,
            ],
            [
                'range' => 'Senior Manager',
                'nilai' => 70,
            ],
            [
                'range' => 'General Manager',
                'nilai' => 80,
            ],
            [
                'range' => 'Direktor',
                'nilai' => 90,
            ]
        ]);
    }
}

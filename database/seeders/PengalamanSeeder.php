<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengalamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_pengalaman')->insert([
            [
                'range' => '> 25 Pengalaman',
                'nilai' => 100,
            ],
            [
                'range' => '21 – 25 Pengalaman',
                'nilai' => 90,
            ],
            [
                'range' => '16 - 20 Pengalaman',
                'nilai' => 85,
            ],
            [
                'range' => '14 - 15 Pengalaman',
                'nilai' => 80,
            ],
            [
                'range' => '13 Pengalaman',
                'nilai' => 75,
            ],
            [
                'range' => '11 – 12 Pengalaman',
                'nilai' => 70,
            ],
            [
                'range' => '6 - 10 Pengalaman',
                'nilai' => 60,
            ],
            [
                'range' => '4 – 5 Pengalaman',
                'nilai' => 55,
            ],
            [
                'range' => '1 - 3 Pengalaman',
                'nilai' => 30,
            ]
        ]);
    }
}

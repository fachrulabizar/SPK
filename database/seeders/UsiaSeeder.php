<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_usia')->insert([
            [
                'range' => '41 – 45 Tahun',
                'nilai' => 100,
            ],
            [
                'range' => '35 – 40 Tahun',
                'nilai' => 95,
            ],
            [
                'range' => '31 – 34 Tahun',
                'nilai' => 85,
            ],
            [
                'range' => '28 – 30 Tahun',
                'nilai' => 75,
            ],
            [
                'range' => '24 – 27 Tahun',
                'nilai' => 65,
            ],
            [
                'range' => '21 - 23 Tahun',
                'nilai' => 60,
            ]
        ]);
    }
}

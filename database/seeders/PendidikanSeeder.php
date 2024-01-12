<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_pendidikan')->insert([
            [
                'range' => 'S2',
                'nilai' => 100,
            ],
            [
                'range' => 'S1',
                'nilai' => 85,
            ],
            [
                'range' => 'D3',
                'nilai' => 70,
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_keahlian')->insert([
            [
                'range' => 'Ahli Utama',
                'nilai' => 100,
            ],
            [
                'range' => 'Ahli Madya',
                'nilai' => 85,
            ],
            [
                'range' => 'Ahli Muda',
                'nilai' => 70,
            ]
        ]);
    }
}

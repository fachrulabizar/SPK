<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\UsiaSeeder;
use Database\Seeders\KeahlianSeeder;
use Database\Seeders\KriteriaSeeder;
use Database\Seeders\PendidikanSeeder;
use Database\Seeders\PengalamanSeeder;
use Database\Seeders\PosisiJabatanSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            KriteriaSeeder::class,
            KeahlianSeeder::class,
            PendidikanSeeder::class,
            PengalamanSeeder::class,
            UsiaSeeder::class,
            UserSeeder::class,
            PosisiJabatanSeeder::class,
            // Tambahkan Seeder lainnya di sini
        ]);
    }
}

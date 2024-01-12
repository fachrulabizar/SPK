<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_nilai_akhir', function (Blueprint $table) {
            $table->id();
            $table->integer('pegawai_id');
            $table->float('pengalaman', 5, 3);
            $table->float('bidang_keahlian', 5, 3);
            $table->float('pendidikan', 5, 3);
            $table->float('posisi_jabatan', 5, 3);
            $table->float('usia', 5, 3);
            $table->float('nilai_akhir', 5, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_nilai_akhir');
    }
};

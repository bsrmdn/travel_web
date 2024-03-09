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
        Schema::create('course_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kelas');
            $table->foreignId('id_mapel');
            $table->foreignId('id_hari');
            $table->string("kode_rombel");
            $table->string("pelajaran");
            $table->string('hari');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string("ruang");
            $table->string("keterangan")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_schedules');
    }
};

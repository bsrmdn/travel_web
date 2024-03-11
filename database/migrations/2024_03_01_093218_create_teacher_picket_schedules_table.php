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
        Schema::create('teacher_picket_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_hari');
            $table->foreignId('id_guru');
            $table->string('hari');
            $table->string('nama_guru');
            $table->enum('tugas', ['Petugas Piket', 'Petugas 3S']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_picket_schedules');
    }
};

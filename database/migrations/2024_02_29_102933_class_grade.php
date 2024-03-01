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
        Schema::create('class_grades', function (Blueprint $table) {
            $table->id();
            $table->enum('tingkatan', ['VII', 'VIII', 'IX']);
            $kelas = [];
            for ($i = ord('A'); $i <= ord('J'); $i++) {
                $kelas[] = chr($i);
            }
            $table->enum('kelas', $kelas);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_grades');
    }
};

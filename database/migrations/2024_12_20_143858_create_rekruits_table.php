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
        Schema::create('rekruits', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('kelas');
            $table->string('semester');
            $table->string('angkatan');
            $table->string('no_telepon')->unique();
            $table->string('email');
            $table->string('tentor_matkul');
            $table->string('nilai_matkul');
            $table->string('IPK');
            $table->text('pengalaman_tentor');
            $table->text('alasan');
            $table->text('program');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekruits');
    }
};

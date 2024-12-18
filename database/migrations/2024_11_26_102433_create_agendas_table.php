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
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->string('nama_kegiatan');
            $table->foreignId('ketua_id')->references('id')->on('users')->cascadeOnUpdate();
            $table->foreignId('kategori_agenda_id')->references('id')->on('kategori_agenda')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};

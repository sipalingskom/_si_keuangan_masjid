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
        Schema::create('infaq', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 70);
            $table->enum('kategori',['masjid', 'sosial']);
            $table->double('jumlah');
            $table->date('tanggal');
            $table->text('keterangan');
            $table->foreignId('bendahara_id')->references('id')->on('users')->cascadeOnUpdate();
            $table->string('bukti');
            $table->enum('status',['0','1','2']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infaqs');
    }
};

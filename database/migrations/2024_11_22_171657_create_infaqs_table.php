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
            $table->string('kode', 6)->unique();
            $table->string('nama', 70);
            $table->string('wa', 16)->nullable();
            $table->enum('kategori', ['masjid', 'sosial']);
            $table->enum('type', ['pemasukan', 'pengeluaran'])->default('pemasukan');
            $table->double('jumlah');
            $table->date('tanggal');
            $table->text('keterangan');
            $table->foreignId('bendahara_id')->references('id')->on('users')->cascadeOnUpdate()->nullable();
            $table->string('bukti');
            $table->enum('status', ['0', '1', '2']);
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

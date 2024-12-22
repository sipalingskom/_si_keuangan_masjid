<?php

use App\Livewire;
use Illuminate\Support\Facades\Route;


/* Open New Tab Image Infaq */

Route::get('/storage/{infaq}', function ($infaq) {
    return $infaq;
})->name('infaq.show');


/* Landing Page */
Route::get('/', Livewire\LandingPage::class);
Route::post('/cari-kode', [Livewire\LandingPage\CariKode::class, 'show'])->name('cari-kode.show');

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Open New Tab Image Infaq
Route::get('/storage/{infaq}', function ($infaq) {
    return $infaq;
})->name('infaq.show');

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAgenda extends Model
{
    use HasFactory;
    protected $table = 'kategori_agenda';
    protected $fillable = [
        'kategori'
    ];
}

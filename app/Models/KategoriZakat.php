<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriZakat extends Model
{
    use HasFactory;

    protected $table = 'kategori_zakat';

    protected $fillable = [
        'nama_zakat'
    ];
}

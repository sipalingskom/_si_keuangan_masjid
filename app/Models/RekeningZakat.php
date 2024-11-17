<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekeningZakat extends Model
{
    use HasFactory;

    protected $table = 'rekening_zakat';
    protected $fillable = [
        'no_rek',
        'jenis_bank'
    ];
}

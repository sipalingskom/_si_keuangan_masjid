<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zakat extends Model
{
    use HasFactory;

    protected $table = 'zakat';
    protected $fillable = [
        'kode',
        'nama',
        'wa',
        'kategori_id',
        'petugas_id',
        'type',
        'jumlah',
        'tanggal',
        'keterangan',
        'bukti',
        'status',
    ];

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id', 'id');
    }

    public function kategoriZakat()
    {
        return $this->belongsTo(KategoriZakat::class, 'kategori_id', 'id');
    }
}

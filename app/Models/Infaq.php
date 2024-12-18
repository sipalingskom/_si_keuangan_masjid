<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infaq extends Model
{
    use HasFactory;

    protected $table = 'infaq';
    protected $fillable = [
        'kode',
        'nama',
        'wa',
        'kategori',
        'type',
        'jumlah',
        'tanggal',
        'keterangan',
        'bendahara_id',
        'bukti',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'bendahara_id', 'id');
    }
}

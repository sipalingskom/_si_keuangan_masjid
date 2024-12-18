<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agenda';
    protected $fillable = [
        'waktu_mulai',
        'waktu_selesai',
        'nama_kegiatan',
        'ketua_id',
        'kategori_agenda_id',
    ];

    public function ketua()
    {
        return $this->belongsTo(User::class, 'ketua_id', 'id');
    }

    public function kategoriAgenda()
    {
        return $this->belongsTo(KategoriAgenda::class, 'kategori_agenda_id', 'id');
    }
}

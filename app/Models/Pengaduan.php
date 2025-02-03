<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';  // Menentukan tabel yang digunakan oleh model

    protected $fillable = [
        'user_nik',     // NIK user yang mengajukan pengaduan
        'kategori',     // Kategori dari pengaduan
        'urgensi',      // Tingkat urgensi pengaduan
        'isi_aduan',    // Isi detail dari pengaduan
        'tindak_lanjut' // Keterangan tindak lanjut untuk pengaduan
    ];
}

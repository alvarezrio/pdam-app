<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'tagihan'; // Menentukan nama tabel secara eksplisit

    protected $fillable = [
        'tagihan_nik', 'tagihan_tglTagihan', 'tagihan_tglJatuhTempo',
        'tagihan_jmlMeteran', 'tagihan_jmlTagihan', 'tagihan_tglPembayaran',
        'tagihan_jmlDibayar', 'tagihan_metodePembayaran',
        'tagihan_statusPembayaran', 'tagihan_noKwitansi', 'tagihan_masaTagihan'
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'tagihan_nik', 'nik');
    }

    public function user()
    {
        // Replace 'user_id' with the actual column name you have for the user reference
        return $this->belongsTo(User::class, 'tagihan_nik', 'nik'); // Assuming 'nik' in both User and Tagihan models
    }

}

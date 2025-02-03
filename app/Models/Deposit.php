<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $table = 'deposit';  // Menentukan nama tabel yang digunakan oleh model

    protected $fillable = [
        'user_nik',  // Menentukan bahwa kolom user_nik dapat diisi massal
        'saldo'      // Menentukan bahwa kolom saldo juga dapat diisi massal
    ];


    // di dalam file Deposit.php
    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'user_nik');
    }


    public $timestamps = true;  // Mengaktifkan penggunaan timestamps (created_at dan updated_at)

    // Menentukan bahwa 'saldo' harus dikelola sebagai tipe data decimal dalam Eloquent
    protected $casts = [
        'saldo' => 'decimal:2',
    ];
}

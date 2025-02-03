<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Tentukan tabel jika nama tabel tidak jamak dari nama model
    protected $table = 'pelanggan';

    // Mass assignment protection
    protected $fillable = ['nama', 'nik', 'alamat', 'noHp', 'email'];


    // Jika Anda ingin menyertakan timestamp (created_at dan updated_at)
    public $timestamps = true;
}

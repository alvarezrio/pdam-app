<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihanTable extends Migration
{
    public function up()
    {
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->string('tagihan_nik'); // Menggunakan NIK sebagai pengenal
            $table->foreign('tagihan_nik')->references('nik')->on('pelanggan'); // Referensi ke tabel pelanggan
            $table->date('tagihan_tglTagihan');
            $table->date('tagihan_tglJatuhTempo');
            $table->integer('tagihan_jmlMeteran'); // Menambahkan jumlah meteran
            $table->decimal('tagihan_jmlTagihan', 10, 2);
            $table->date('tagihan_tglPembayaran')->nullable();
            $table->decimal('tagihan_jmlDibayar', 10, 2)->nullable();
            $table->string('tagihan_metodePembayaran')->nullable();
            $table->string('tagihan_statusPembayaran')->default('belum_dibayar');
            $table->string('tagihan_noKwitansi')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tagihan');
    }
}

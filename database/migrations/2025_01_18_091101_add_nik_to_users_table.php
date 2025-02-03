<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNikToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nik')->nullable()->after('phone'); // Menambahkan kolom 'nik' setelah kolom 'phone'
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nik'); // Menghapus kolom 'nik' jika migration dirollback
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRoleTable extends Migration
{
    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->id();
            $table->string('user_nik'); // Tipe data string
            $table->foreign('user_nik')->references('nik')->on('users')->onDelete('cascade'); // Menetapkan foreign key
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade'); // Konstraint role_id
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_role');
    }
}

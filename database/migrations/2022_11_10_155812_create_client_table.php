<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string('status', 20);
            $table->string('nama', 50);
            $table->string('marga', 50);
            $table->string('tempat_lahir', 50);
            $table->date('tgl_lahir');
            $table->string('agama', 15);
            $table->string('pendidikan', 15);
            $table->string('pekerjaan', 25);
            $table->text('alamat');
            $table->string('kel', 25);
            $table->string('kec', 25);
            $table->string('kab', 25);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('client');
    }
}

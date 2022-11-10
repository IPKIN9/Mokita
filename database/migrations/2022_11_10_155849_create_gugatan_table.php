<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGugatanTable extends Migration
{
    public function up()
    {
        Schema::create('gugatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penggugat')->constrained('client');
            $table->foreignId('id_tergugat')->constrained('client');
            $table->date('tgl_pernikahan');
            $table->string('kec', 25);
            $table->string('kab', 25);
            $table->string('akta_nikah', 25);
            $table->string('tinggal1', 150);
            $table->string('tinggal2', 150); 
            $table->date('tgl_tidak_rukun');
            $table->string('penyebab', 50);
            $table->date('puncak_konflik');
            $table->string('lama_pisah', 10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gugatan');
    }
}

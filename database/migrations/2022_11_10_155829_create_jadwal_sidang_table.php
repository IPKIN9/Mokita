<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalSidangTable extends Migration
{
    public function up()
    {
        Schema::create('jadwal_sidang', function (Blueprint $table) {
            $table->id();
            $table->dateTimeTz('tgl_waktu_mulai');
            $table->dateTimeTz('tgl_waktu_berakhir');
            $table->text('ket');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_sidang');
    }
}

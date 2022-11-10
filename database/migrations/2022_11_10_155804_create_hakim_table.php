<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHakimTable extends Migration
{
    public function up()
    {
        Schema::create('hakim', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('nip', 15);
            $table->string('tempat_lahir', 150);
            $table->date('tgl_lahir');
            $table->string('jabatan', 100);
            $table->text('s1');
            $table->text('s2')->nullable();
            $table->text('s3')->nullable();
            $table->string('sertifikat', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hakim');
    }
}

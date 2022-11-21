<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerkaraTable extends Migration
{
    public function up()
    {
        Schema::create('perkara', function (Blueprint $table) {
            $table->id();
            $table->string('no_perkara', 15);
            $table->foreignId('id_hakim')->constrained('hakim');
            $table->string('pengacara', 100);
            $table->string('penitra', 100);
            $table->foreignId('id_gugatan')->constrained('gugatan');
            $table->string('status', 50);
            $table->foreignId('id_jadwal')->constrained('jadwal_sidang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perkara');
    }
}

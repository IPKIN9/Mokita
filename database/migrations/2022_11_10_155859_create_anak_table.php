<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnakTable extends Migration
{
    public function up()
    {
        Schema::create('anak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_gugatan')->constrained('gugatan');
            $table->string('nama', 100);
            $table->string('tempat_lahir', 150);
            $table->date('tgl_lahir');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anak');
    }
}

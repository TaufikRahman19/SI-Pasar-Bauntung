<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedagangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedagangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_register', 255);
            $table->string('nama', 50);
            $table->string('nik', 20);
            $table->string('jenis_dagang', 35);
            $table->string('alamat', 100);
            $table->string('notelpon', 15);
            $table->string('massa_kontrak');
            $table->string('pasfoto', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedagangs');
    }
}

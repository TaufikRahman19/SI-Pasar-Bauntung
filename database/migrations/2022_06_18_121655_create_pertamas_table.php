<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertamasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertamas', function (Blueprint $table) {
            $table->id();
            $table->string('pegawai_id');
            $table->string('pedagang_id');
            $table->string('perbulan');
            $table->string('pajak_id');
            $table->string('total');
            $table->string('bayar');
            $table->string('kembali');
            $table->string('bukti');
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
        Schema::dropIfExists('pertamas');
    }
}

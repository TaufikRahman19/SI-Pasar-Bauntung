<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengujiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengujians', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama_petugas');
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->string('fotopengujian');
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
        Schema::dropIfExists('pengujians');
    }
}

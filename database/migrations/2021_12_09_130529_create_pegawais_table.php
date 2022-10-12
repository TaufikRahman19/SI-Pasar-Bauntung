<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nik_pegawai');
            $table->string('nama_pegawai');
            $table->string('jabatan');
            $table->enum('jeniskelamin',['Laki-laki','Perempuan']);
            $table->string('notelpon', 20);
            $table->string('status');
            $table->date('tmt');
            $table->string('sk_pegawai', 255);
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
        Schema::dropIfExists('pegawais');
    }
}

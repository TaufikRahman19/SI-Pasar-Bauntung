<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePajaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pajaks', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_toko')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('ukuran')->nullable();
            $table->string('per_meter')->nullable();
            $table->string('harga_pajak')->nullable();
            $table->string('per_hari')->nullable();
            $table->string('bulan')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('pajaks');
    }
}

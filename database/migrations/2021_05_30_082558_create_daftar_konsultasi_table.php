<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarKonsultasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_konsultasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl_konsultasi')->nullable();
            $table->string('problema');
            $table->longText('analisis_ahli');
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
        Schema::dropIfExists('daftar_konsultasi');
    }
}

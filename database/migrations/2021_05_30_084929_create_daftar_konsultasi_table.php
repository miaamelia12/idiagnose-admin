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
            $table->unsignedBigInteger('anak_id')->index();
            $table->foreign('anak_id')->references('id')->on('anak')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('konsultan_id')->index();
            $table->foreign('konsultan_id')->references('id')->on('konsultan')->onUpdate('cascade')->onDelete('cascade');
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

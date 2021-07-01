<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendampingKonsultasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendamping_konsultasi', function (Blueprint $table) {
            $table->unsignedBigInteger('konsultasi_id')->index();
            $table->foreign('konsultasi_id')->references('id')->on('jadwal_konsultasi')->onDelete('cascade');
            $table->unsignedBigInteger('pendamping_id')->index();
            $table->foreign('pendamping_id')->references('id')->on('pendamping')->onDelete('cascade');
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
        Schema::dropIfExists('pendamping_konsultasi');
    }
}

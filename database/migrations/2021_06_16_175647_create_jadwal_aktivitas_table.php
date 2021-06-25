<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalAktivitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_aktivitas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('jam_mulai');
            $table->time('jam_selesai')->nullable();
            $table->string('kegiatan');
            $table->string('keterangan')->nullable();
            $table->enum('kategori_aktivitas', ['Batita', 'Balita', 'Anak']);
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
        Schema::dropIfExists('jadwal_aktivitas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anak', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->integer('usia');
            $table->float('berat_badan');
            $table->float('tinggi_badan');
            $table->date('tgl_lahir');
            $table->date('tgl_masuk_ysi');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->integer('IQ')->nullable();
            $table->string('kesehatan');
            $table->string('pendidikan');
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
        Schema::dropIfExists('anak');
    }
}

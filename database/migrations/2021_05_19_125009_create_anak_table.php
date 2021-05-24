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
            $table->date('tgl_lahir')->nullable();
            $table->date('tgl_masuk_ysi')->nullable();
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->integer('IQ');
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

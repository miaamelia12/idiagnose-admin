<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosaAnakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosa_anak', function (Blueprint $table) {
            $table->unsignedBigInteger('anak_id');
            $table->foreign('anak_id')->references('id')->on('anak')->onDelete('cascade');
            $table->unsignedBigInteger('diagnosa_id');
            $table->foreign('diagnosa_id')->references('id')->on('diagnosa')->onDelete('cascade');
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
        Schema::dropIfExists('diagnosa_anak');
    }
}

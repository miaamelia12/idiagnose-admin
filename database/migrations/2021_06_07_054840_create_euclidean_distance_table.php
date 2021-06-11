<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEuclideanDistanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('euclidean_distance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('distance', 10, 8);
            $table->unsignedBigInteger('training_id');
            $table->foreign('training_id')->references('id')->on('data_training')->onDelete('cascade');
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
        Schema::dropIfExists('euclidean_distance');
    }
}

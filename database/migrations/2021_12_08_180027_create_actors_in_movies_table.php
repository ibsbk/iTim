<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorsInMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actors_in_movies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actor_id');
            $table->foreign('actor_id')->references('id')->on('actors');
            $table->foreignId('film_id');
            $table->foreign('film_id')->references('id')->on('films');
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
        Schema::dropIfExists('_actors_in_movies');
    }
}

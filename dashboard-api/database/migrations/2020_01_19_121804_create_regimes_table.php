<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regimes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('description');
            $table->integer('sets');
            $table->longText('traineeComment');
            $table->longText('coachComment');
            $table->double('completion');
            $table->date('execution_date');

            $table->unsignedBigInteger('trainee_id');
            $table->foreign('trainee_id')->references('id')->on('coach_has_trainees');

            $table->unsignedBigInteger('exercises_id');
            $table->foreign('exercises_id')->references('id')->on('exercises');

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
        Schema::dropIfExists('regimes');
    }
}

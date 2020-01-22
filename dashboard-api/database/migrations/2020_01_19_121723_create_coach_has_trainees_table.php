<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachHasTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coach_has_trainees', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('trainee_id');
            $table->foreign('trainee_id')->references('id')->on('users');

            $table->unsignedBigInteger('coach_id');
            $table->foreign('coach_id')->references('id')->on('users');

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
        Schema::dropIfExists('coach_has_trainees');
    }
}

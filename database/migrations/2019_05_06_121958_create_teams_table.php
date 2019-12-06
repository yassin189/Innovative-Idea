<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('prof_id')->unsigned()->nullable();
            $table->bigInteger('project_id')->unsigned()->nullable();
            $table->bigInteger('leader_id')->unsigned()->nullable();

            $table->foreign('prof_id')
            ->references('id')
            ->on('professors')
            ->onDelete('cascade');

            $table->foreign('project_id')
            ->references('id')
            ->on('projects')
            ->onDelete('cascade');

            $table->foreign('leader_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');



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
        Schema::dropIfExists('teams');
    }
}

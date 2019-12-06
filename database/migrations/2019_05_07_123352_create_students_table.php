<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('student_id');
            $table->bigInteger('faculty_id')->unsigned()->nullable();
            $table->bigInteger('dept_id')->unsigned()->nullable();
            $table->bigInteger('team_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('team_id')
            ->references('id')
            ->on('teams')
            ->onDelete('cascade');

            $table->foreign('faculty_id')
            ->references('id')
            ->on('faculties')
            ->onDelete('cascade');

            $table->foreign('dept_id')
            ->references('id')
            ->on('departments')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}

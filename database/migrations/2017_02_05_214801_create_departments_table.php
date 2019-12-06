<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fac_id')->unsigned();
            $table->foreign('fac_id')
            ->references('id')
            ->on('faculties')
            ->onDelete('cascade');
            $table->string('name');
            $table->string('short_name');
            $table->string('number_of_students');
            $table->string('number_of_doctors');
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
        Schema::dropIfExists('departments');
    }
}

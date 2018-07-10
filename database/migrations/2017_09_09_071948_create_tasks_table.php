<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('matkul_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('days')->unsigned()->nullable();
            $table->integer('hours')->unsigned()->nullable();

            $table->integer('jadwal_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('matkul_id')->references('id')->on('matkuls');
            $table->foreign('jadwal_id')->references('id')->on('jadwals');
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
        Schema::dropIfExists('tasks');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_mhs')->unsigned();
            $table->foreign('id_mhs')->references('id')->on('users');
            $table->integer('semester')->unsigned();
            $table->integer('sks')->unsigned();

            $table->integer('id_matkul')->unsigned();
            $table->foreign('id_matkul')->references('id')->on('matkuls');
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
        Schema::dropIfExists('jadwals');
    }
}

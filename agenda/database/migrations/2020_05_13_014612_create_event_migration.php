<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('data');
            $table->string('hora_incio');
            $table->string('hora_fim');
            $table->string('local');
            $table->string('url');
            $table->string('description');
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('events', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}

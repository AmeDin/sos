<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{

    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('origin');
            $table->string('action');
            $table->integer('user_id');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('id');
        });
    }

    public function down()
    {
        Schema::drop('logs');
    }

}
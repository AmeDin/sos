<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('stall_id');
            $table->integer('image_id');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dishs');
    }
}

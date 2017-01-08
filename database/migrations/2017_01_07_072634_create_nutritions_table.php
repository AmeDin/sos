<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNutritionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutritions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('calories');
            $table->decimal('carbohydrate');
            $table->decimal('saturate_fat');
            $table->decimal('trans_fat');
            $table->decimal('fibre');
            $table->decimal('sugar');
            $table->decimal('protein');
            $table->integer('ingredient_id');
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
        Schema::drop('nutritions');
    }
}

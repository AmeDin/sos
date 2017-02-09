<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomizeOrderIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customize_order_ingredient', function (Blueprint $table) {
            $table->integer('customize_order_id');
            $table->integer('ingredient_id');
            $table->integer('portion');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    public function down()
    {
        Schema::drop('customize_order_ingredient');
    }
}

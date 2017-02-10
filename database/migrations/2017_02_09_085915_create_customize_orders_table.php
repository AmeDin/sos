<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomizeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customize_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stall_id');

            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('id');
        });
    }

    public function down()
    {
        Schema::drop('customize_orders');
    }
}

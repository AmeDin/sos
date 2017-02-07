<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->decimal('price')->nullable();
            $table->integer('stall_id');
            $table->integer('image_id');

            $table->date('start_date');
            $table->date('end_date');
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
        Schema::drop('promotions');

    }
}

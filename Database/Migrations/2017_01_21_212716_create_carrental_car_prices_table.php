<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrentalCarPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('car__prices', function (Blueprint $table) {
            $table->engine = "INNODB";

            $table->integer('car_id')->unsigned();
            $table->unique(['car_id']);
            $table->foreign('car_id')->references('id')->on('car__cars')->onDelete('cascade');

            $table->decimal('price1', 8,2);
            $table->decimal('price2', 8,2);
            $table->decimal('price3', 8,2);
            $table->decimal('price4', 8,2);
            $table->decimal('price5', 8,2);
            $table->decimal('price6', 8,2);

            $table->timestamps();
        });
        Schema::disableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('car__prices');
        Schema::enableForeignKeyConstraints();
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrentalCarSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('car__series', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your fields
            $table->string('name');
            $table->tinyInteger('person');
            $table->tinyInteger('baggage');

            $table->integer('model_id')->unsigned()->nullable();
            $table->foreign('model_id')->references('id')->on('car__models')->onDelete('cascade');

            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('car__series', function (Blueprint $table) {
            $table->dropForeign(['model_id']);
        });
        Schema::dropIfExists('car__series');
        Schema::enableForeignKeyConstraints();
    }
}

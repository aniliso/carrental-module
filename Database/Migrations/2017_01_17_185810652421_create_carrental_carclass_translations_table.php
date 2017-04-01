<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarRentalCarClassTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car__class_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            // Your translatable fields
            $table->string('name', 100);
            $table->string('slug', 100);
            $table->string('description', 255);
            $table->text('content');

            $table->integer('car_class_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['car_class_id', 'locale']);
            $table->foreign('car_class_id')->references('id')->on('car__classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('car__class_translations', function (Blueprint $table) {
            $table->dropForeign(['class_id']);
        });
        Schema::dropIfExists('car__class_translations');
        Schema::enableForeignKeyConstraints();
    }
}

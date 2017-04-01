<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarRentalCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('car__cars', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            // Your fields

            // Car Information's
            $table->smallInteger('model_year')->nullable();

            $table->string('plate_no', 20);
            $table->string('chassis_no', 30);
            $table->string('motor_no', 30);

            $table->mediumInteger('current_km');
            $table->mediumInteger('max_km');
            $table->mediumInteger('period_km');
            $table->tinyInteger('current_fuel');

            $table->string('description', 255);
            $table->tinyInteger('available_status')->default(1);
            $table->boolean('status')->default(1);

            // Who has Car?
            $table->string('identity_no', 20);
            $table->string('tax_no', 20);

            $table->string('license_key', 20);
            $table->string('license_no', 20);
            $table->date('licensed_at');

            // Car Features
            $table->tinyInteger('fuel_type');
            $table->tinyInteger('transmission');
            $table->tinyInteger('body_type');
            $table->tinyInteger('color');
            $table->tinyInteger('engine_capacity');
            $table->tinyInteger('horsepower');

            // Table Relations
            $table->integer('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('car__brands')->onDelete('SET NULL');

            // Table Relations
            $table->integer('model_id')->unsigned()->nullable();
            $table->foreign('model_id')->references('id')->on('car__models')->onDelete('SET NULL');

            // Table Relations
            $table->integer('series_id')->unsigned()->nullable();
            $table->foreign('series_id')->references('id')->on('car__series')->onDelete('SET NULL');

            // Table Relations
            $table->integer('class_id')->unsigned()->nullable();
            $table->foreign('class_id')->references('id')->on('car__classes')->onDelete('SET NULL');

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
        Schema::dropIfExists('car__cars');
        Schema::enableForeignKeyConstraints();
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarRentalReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car__reservations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your fields
            // Reservation Info
            $table->integer('tc_no');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 100);
            $table->string('phone', 20);
            $table->string('mobile_phone', 20);

            $table->string('flight_name');
            $table->string('flight_no');

            $table->string('requests', 255);

            $table->integer('start_location');
            $table->integer('return_location');

            $table->dateTime('pick_at');
            $table->dateTime('drop_at');

            $table->integer('total_days');
            $table->decimal('daily_price', 8, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car__reservations');
    }
}

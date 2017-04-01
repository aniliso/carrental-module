<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCarIdColumnToCarrentalReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car__reservations', function (Blueprint $table) {
            $table->integer('car_id')->nullable();
            $table->decimal('total_price', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car__reservations', function (Blueprint $table) {
            $table->dropColumn(['car_id','total_price']);
        });
    }
}

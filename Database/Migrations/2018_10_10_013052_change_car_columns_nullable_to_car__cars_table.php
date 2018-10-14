<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCarColumnsNullableToCarCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car__cars', function (Blueprint $table) {
            $table->string('plate_no', 20)->nullable()->change();
            $table->string('chassis_no', 30)->nullable()->change();
            $table->string('motor_no', 30)->nullable()->change();
            $table->integer('current_km')->nullable()->change();
            $table->integer('max_km')->nullable()->change();
            $table->integer('period_km')->nullable()->change();
            $table->integer('current_fuel')->nullable()->change();
            $table->string('description', 255)->nullable()->change();
            $table->string('identity_no', 20)->nullable()->change();
            $table->string('tax_no', 20)->nullable()->change();
            $table->string('license_key', 20)->nullable()->change();
            $table->string('license_no', 20)->nullable()->change();
            $table->date('licensed_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car__cars', function (Blueprint $table) {
            $table->string('plate_no', 20)->change();
            $table->string('chassis_no', 30)->change();
            $table->string('motor_no', 30)->change();
            $table->mediumInteger('current_km')->change();
            $table->mediumInteger('max_km')->change();
            $table->mediumInteger('period_km')->change();
            $table->tinyInteger('current_fuel')->change();
            $table->string('description', 255)->change();
            $table->string('identity_no', 20)->change();
            $table->string('tax_no', 20)->change();
            $table->string('license_key', 20)->change();
            $table->string('license_no', 20)->change();
            $table->date('licensed_at')->change();
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartureScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departure_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number_departure')->nullable();
            $table->string('date');
            $table->string('data_delivery');
            $table->string('receipt_data')->nullable();
            $table->string('departure_city');
            $table->string('city_receipt');
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
        Schema::dropIfExists('departure_schedule');
    }
}

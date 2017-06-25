<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->increments('id');
            $table->string('consignment_number')->nullable();
            $table->string('departure_city');
            $table->string('city_receipt');
            $table->string('date_delivery');
            $table->string('recipient', 300);
            $table->string('address', 600);
            $table->string('phone');
            $table->integer('bid_status_id')->unsigned();
            $table->foreign('bid_status_id')->references('id')->on('bid_statuses');
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
        Schema::dropIfExists('bids');
    }
}

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
            $table->string('sender_name', 300)->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('sender_address', 600)->nullable();
            $table->string('recipient_name', 300)->nullable();
            $table->string('recipient_phone')->nullable();
            $table->string('recipient_address', 600)->nullable();
            $table->integer('bid_status_id')->unsigned();
            $table->foreign('bid_status_id')->references('id')->on('bid_statuses');
            $table->string('user_id')->nullable();
            $table->string('date_receiving')->nullable();
            $table->string('recipient_comments', 600)->nullable();
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

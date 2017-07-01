<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaceBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_bids', function (Blueprint $table) {
            $table->increments('id');
            $table->double('weight', 9, 3)->default(0)->nullable();
            $table->double('scope', 9, 3)->default(0)->nullable();
            $table->float('rate')->default(0)->nullable();
            $table->double('assessed_value', 15 ,4)->default(0)->nullable();
            $table->integer('packing_type_id')->unsigned();
            $table->foreign('packing_type_id')->references('id')->on('packing_types');
            $table->integer('bid_id')->unsigned();
            $table->foreign('bid_id')->references('id')->on('bids');
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
        //
    }
}

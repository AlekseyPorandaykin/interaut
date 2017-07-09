<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('departure_city', 300);
            $table->string('city_destination', 100);
            $table->string('type_transport')->comment('Тип транспорта');
            $table->double('cost_mass', 10, 2)->default(0)->comment('Стоимость за 1 кг.');
            $table->double('cost_volume', 10, 2)->default(0)->comment('Стоимость за 1 куб.');
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
        Schema::dropIfExists('tariffs');
    }
}

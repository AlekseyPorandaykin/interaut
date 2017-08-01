<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_legal_entity')->nullable()->comment('Наименование юридического лица');
            $table->string('legal_address')->nullable()->comment('Юридический адрес (адрес места нахождения)');
            $table->string('actual_address')->nullable()->comment('Фактический адрес (адрес места нахождения)');
            $table->string('ogrn')->nullable()->comment('ОГРН');
            $table->string('inn')->nullable()->comment('ИНН');
            $table->string('kpp')->nullable()->comment('КПП');
            $table->string('okpo')->nullable()->comment('ОКПО');
            $table->string('okved')->nullable()->comment('ОКВЭД');
            $table->string('payment_account')->nullable()->comment('Расчетный счет');
            $table->string('correspondent_account')->nullable()->comment('Корреспондентский счет');
            $table->string('bank')->nullable()->comment('Банк');
            $table->string('bik')->nullable()->comment('БИК');
            $table->string('general_director')->nullable()->comment('Генеральный директор, на основании Устава');
            $table->string('manager')->nullable()->comment('Менеджер');
            $table->string('phone')->nullable()->comment('Телефон');
            $table->string('contract_number')->nullable()->comment('Договор №');
            $table->string('date')->nullable()->comment('Дата');
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
        Schema::dropIfExists('clients');
    }
}

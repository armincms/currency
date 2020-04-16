<?php

use Illuminate\Database\Migrations\Migration;
use Armincms\Currency\Currency;

class CreateCurrencyTable extends Migration
{ 

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('code', 10)->index();
            $table->string('symbol', 25);
            $table->string('format', 50);
            $table->string('exchange_rate')->default(1);
            $table->boolean('active')->default(false);
            $table->timestamps();
        });

        Currency::insert($this->currencies());

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('currencies');
    }

    public function currencies()
    {
        $currencies = require __DIR__.'/currencies.php'; 

        return collect($currencies)->map(function($currency, $code) {
            $active = in_array($code, ['IRT', 'IRR']);
            $exchange_rate = $code === 'IRT' ? 0.1 : 1;
 

            return array_merge($currency, compact('code', 'active', 'exchange_rate'));
        })->all();
    }
}

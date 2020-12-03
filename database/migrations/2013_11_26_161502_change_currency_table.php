<?php

use Illuminate\Database\Migrations\Migration;
use Armincms\Currency\Currency;

class ChangeCurrencyTable extends Migration
{ 

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('currencies', function ($table) { 
            $table->tinyInteger('decimal')->default(0); 
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('currencies', function ($table) { 
            $table->dropColumn(['decimal']);
        }); 
    } 
}

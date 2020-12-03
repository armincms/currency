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

        Currency::where('decimal', 0)->update(['decimal' => 2]);

        Currency::get()->map(function($currency) {
            preg_match('/.([0-9]+)/', $currency->format, $matches);

            if(strlen($matches[0]) !== 2) { 
                $currency->forceFill([
                    'decimal' => strlen($matches[0])
                ]);

                $currency->save(); 
            }
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

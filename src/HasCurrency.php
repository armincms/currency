<?php 

namespace Armincms\Currency;


/**
 * summary
 */
trait HasCurrency
{
    /**
     * summary
     */
    public function currencyRelation()
    {
        return $this->belongsTo(Currency::class, 'currency', 'code');
    }
    

    public function currencyLable()
    {
        $currency = currency()->getCurrency($this->currency);

        return $currency['symbol'] ?? 'IRR';
    }
}

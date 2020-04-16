<?php

namespace Armincms\Currency\Nova\Lenses;

use Laravel\Nova\Http\Requests\LensRequest;
use Illuminate\Http\Request; 
use Laravel\Nova\Lenses\Lens;

class ActiveCurrencies extends Lens
{
    /**
     * Get the query builder / paginator for the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\LensRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return mixed
     */
    public static function query(LensRequest $request, $query)
    {
        return $request->withOrdering($request->withFilters(
            $query->whereActive(1)
        ));
    }

    /**
     * Get the fields available to the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return $request->newResource()->fields($request);
    } 

    /**
     * Get the URI key for the lens.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'active-currencies';
    }
}

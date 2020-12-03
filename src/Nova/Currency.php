<?php

namespace Armincms\Currency\Nova;

use Illuminate\Support\Str; 
use Illuminate\Http\Request; 
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\{ID, Text, Number, Boolean};

class Currency extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'Armincms\Currency\Currency';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name', 'symbol', 'code'
    ];  

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make(__('Name'), 'name')
                ->sortable()
                ->required(),

            Text::make(__('Code'), 'code')
                ->sortable()
                ->required(),

            Text::make(__('Symbol'), 'symbol')
                ->sortable()
                ->required(), 

            Number::make(__('Minor Unit'), 'decimal')
                ->required()
                ->rules('required', 'min:0')
                ->min(0), 

            Text::make(__('Example 50000.500500'), function() {
                return currency()->format(50000.500500, $this->code);
            }),

            Text::make(__('Exchange Rate'), 'exchange_rate')
                ->withMeta([
                    'extraAttributes' => [
                        'pattern' => '^[0-9]+(\.[0-9]+)?$'
                    ]
                ])
                ->rules('regex:/^[0-9]+(\.[0-9]+)?$/')
                ->sortable()
                ->required(),

            Boolean::make(__("Active"), 'active')
                ->sortable(),
        ];
    } 

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [
            new Lenses\ActiveCurrencies
        ];
    }

    /**
     * Build a "relatable" query for the given resource.
     *
     * This query determines which instances of the model may be attached to other resources.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function relatableQuery(NovaRequest $request, $query)
    { 
        return $query->whereActive(1); 
    }
 
}

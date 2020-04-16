<?php

namespace Armincms\Currency\Nova;

use Laravel\Nova\Resource as NovaResource;
use Laravel\Nova\Http\Requests\NovaRequest; 
use Inspheric\NovaDefaultable\HasDefaultableFields;  
use Illuminate\Support\Str; 

abstract class Resource extends NovaResource
{
    use HasDefaultableFields; 
   
    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __(static::pluralLabel());
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __(Str::singular(static::pluralLabel()));
    } 

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function pluralLabel()
    {
        return Str::plural(Str::title(Str::snake(class_basename(get_called_class()), ' ')));
    }  
}

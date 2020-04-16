<?php  
namespace Armincms\Currency; 

use Illuminate\Database\Eloquent\Model;    
use Illuminate\Support\Str;

class Currency extends Model 
{   
    static public function boot()
    {
    	parent::boot();

    	self::saved(function() {
    		currency()->clearCache();
    	});
    } 

    /**
     * Get the default foreign key name for the model.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return Str::snake(class_basename($this)).'_code';
    }
}


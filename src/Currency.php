<?php  
namespace Armincms\Currency; 

use Illuminate\Database\Eloquent\Model;    
use Illuminate\Support\Str;

class Currency extends Model 
{   
    static public function boot()
    {
    	parent::boot();

    	self::saving(function($model) {
    		$model->reviewFormat();
    	});

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

    /**
     * Review the currency format string.
     * 
     * @return $this
     */
    public function reviewFormat()
    {
        $minor = intval($this->decimal) ? '.'.str_repeat(0, $this->decimal) : null;

        $this->setAttribute('format', "1,0{$minor} {$this->symbol}");

        return $this;
    }
}


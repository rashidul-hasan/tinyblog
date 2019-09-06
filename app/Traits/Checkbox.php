<?php

namespace App\Traits;


use Illuminate\Http\Request;

trait Checkbox
{

    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            self::handleCheckboxInput($model);
        });

        static::updating(function($model) {
            self::handleCheckboxInput($model);
        });
    }

    public static function handleCheckboxInput($model)
    {
        $request = app(Request::class);

        if (property_exists(self::class, 'checkboxes')){
            foreach (self::$checkboxes as $item) {

                $value = $request->has($item) ? true : false;
                $model->{$item} = $value;
            }
        }
    }
}
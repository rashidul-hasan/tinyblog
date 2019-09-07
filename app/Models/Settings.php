<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Settings extends Model
{
    protected $fillable = ['settings_key', 'settings_value'];

    public static function getCached($key, $default)
    {
        return Cache::get($key, function () use ($key, $default) {

            $s = Settings::where('settings_key', $key)->first();
            if ($s){
                return $s->settings_value;
            } else {
                return $default;
            }
        });
    }
}

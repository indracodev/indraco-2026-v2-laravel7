<?php

namespace App\Models;

//
use Illuminate\Database\Eloquent\Model;

class MasterSetting extends Model
{
    //

    protected $table = 'master_settings';
    protected $fillable = ['key', 'value', 'group'];

    /**
     * Get a setting value by key with fallback default
     */
    public static function get($key, $default = null)
    {
        try {
            $setting = static::where('key', $key)->first();
            return ($setting && !empty($setting->value)) ? $setting->value : $default;
        } catch (\Exception $e) {
            return $default;
        }
    }

    /**
     * Set a setting value by key
     */
    public static function set($key, $value, $group = 'general')
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );
    }
}

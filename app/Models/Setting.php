<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'settings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'setting', 'type', 'value',
    ];

    protected $attributes = ['other', 'expedition', 'trip', 'mine', 'mission'];

    public $timestamps = false;

    /**
     * Get decoded setting values by provided name if value is json
     *
     * @return array
     */

    public static function getSettingByName($name)
    {
        return json_decode(self::where('setting', $name)->value('value'), true);
    }

    public static function setSettingByName($setting, $value)
    {
        self::where('setting', $setting)->update([
            'setting' => $setting, 'value' => $value
        ]);
    }
}

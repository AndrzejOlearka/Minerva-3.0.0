<?php

namespace App\Lib\Traits;

use App\Models\Setting;

trait SettingsTrait
{
    public function getSettings($settingName)
    {
        $data = json_decode(Setting::where('setting', $settingName)->value('value'), true);
        if(!empty($data)){
            return $data; 
        }
        return false;
    }
}
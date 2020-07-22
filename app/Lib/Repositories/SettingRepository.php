<?php

namespace App\Lib\Repositories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SettingRepository
{
    public function all()
    {
        $settings =  Setting::all();
        $settingsCollection = [];
        foreach($settings as $setting){
            $type = $setting->type;
            is_null($type) ? $type = 'other' : $type;
            $settingsCollection[$type][] = $setting;
       }
       return $settingsCollection;
    }
}
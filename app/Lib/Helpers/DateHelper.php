<?php

namespace App\Lib\Helpers;

class DateHelper
{
    public static function currentDate()
    {
        return date('Y-m-d H:i:s');
    }

    public static function setDate($seconds)
    {
        return date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s')." + $seconds SECONDS"));
    }
}
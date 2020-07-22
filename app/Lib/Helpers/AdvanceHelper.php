<?php

namespace App\Lib\Helpers;

class AdvanceHelper
{
    public static function setLevel($userExp)
    {
        if($userExp < 5000){
            $i = 1;
            return $i;
        }
        $exp = 0;
        for ($i = 2; $i < 100; $i++) {
            $currentExp = $exp;
            if ($i >= 2 && $i < 4) {
                $expAdd = 5000;
            } elseif ($i >= 4 && $i < 8) {
                $expAdd = 10000;
            } elseif ($i >= 8 && $i < 10) {
                $expAdd = 25000;
            } else {
                $expAdd = 100000;
            }
            $exp += $expAdd;
            if($userExp >= $currentExp && $userExp < $exp){
                break;
            }
        }
        return $i;
    }
}

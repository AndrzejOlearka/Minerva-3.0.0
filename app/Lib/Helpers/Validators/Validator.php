<?php

namespace App\Lib\Helpers\Validators;

class Validator
{
    public static function file($name, $optional = false)
    {   
        if($file = request()->hasFile($name)) {
           $file = request()->file($name);
           $fileName = $file->getClientOriginalName();
           $destinationPath = public_path().'/img/';
           $file->move($destinationPath, $fileName);
           return $fileName;
        } else {
            if($optional){
                return $optional;
            }
        }
    }
}
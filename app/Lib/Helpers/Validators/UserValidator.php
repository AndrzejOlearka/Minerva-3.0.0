<?php

namespace App\Lib\Helpers\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserValidator
{
    public static function nicknameRequestValidator(Request $request, $user)
    {
        if(empty($user)){
            Validator::make($request->all(), [
                'user' => ['required', 'string', 'min:8', 'max:20'],
            ])->validate();
            $user = $request->user;
        }
        return $user;
    }

    public static function passwordRequestValidator(Request $request, $password)
    {
        if(empty($password)){
            Validator::make($request->all(), [
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ])->validate();
            $password = $request->password;
        }
        return $password;
    }

    public static function premiumRequestValidator(Request $request, $premium)
    {
        if(empty($premium)){
            Validator::make($request->all(), [
                'premium' => ['required']
            ]);
            $premium = $request->premium;
        }
        return $premium;
    }

    public static function coinsRequestValidator(Request $request, $coins)
    {
        if(empty($coins)){
            Validator::make($request->all(), [
                'coins' => ['required', 'int']
            ]);
            $coins = $request->coins;
        }
        return $coins;
    }
}





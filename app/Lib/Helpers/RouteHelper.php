<?php

namespace App\Lib\Helpers;

use Illuminate\Http\Request;
use App\Lib\Repositories\UserRepository;

class RouteHelper
{
    public static function accountRoute($requestPath)
    {
        switch($requestPath){
            case "account/edit/nick":
                return view('account-change-nick');
            break;
            case "account/edit/password":
                return view('account-change-password');
            break;
            case "account/edit/removal":
                return view('account-delete');
            break;
            case "account/edit/loan":
                return view('account-loan');
            break;
            case "account/edit/credit":
                return view('account-credit');
            break;
            default:
                return view('account');
            break;
        }
    }
    
    public static function accountDebtRoute($requestPath)
    {
        switch($requestPath){
            case "account/debt/loan":
                return view('account-loan');
            break;
            case "account/debt/credit":
                return view('account-credit');
            break;
            default:
                return view('account');
            break;
        }
    }

    public static function accountUpdateRoute(Request $request)
    {
        switch($request->path()){
            case "account/update/nick":
                return (new UserRepository)->updateUserNickame($request);
            break;
            case "account/update/password":
                return (new UserRepository)->updateUserPassword($request);
            break;
            case "account/update/premium":
                return (new UserRepository)->updateUserPremium($request);
            break;
            case "account/update/coins":
                return (new UserRepository)->updateUserCoins($request);
            break;
        }
    }
}
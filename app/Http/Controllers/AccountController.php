<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\Helpers\RouteHelper;
use App\Lib\Repositories\UserRepository;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('advance');
    }
    
    public function index()
    {
        $userRepository = new UserRepository();
        $userData = $userRepository->find();
        $premiumData = $userRepository->getSettings('premiumOfferDays');
        $coinsData = $userRepository->getSettings('coinsOfferAmount');
        return view('account', compact('userData', 'premiumData', 'coinsData'));
    }

    public function edit(Request $request)
    {
        return RouteHelper::accountRoute($request->path());
    }

    public function debt(Request $request)
    {
        return RouteHelper::accountDebtRoute($request->path());
    }

    public function update(Request $request)
    {
        return RouteHelper::accountUpdateRoute($request);
    }

    public function delete(Request $request)
    {
        return (new UserRepository)->deleteUser($request);
    }

    public function checkPassword(Request $request)
    {
        return (new UserRepository)->checkPassword($request);
    }
}

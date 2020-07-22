<?php

namespace App\Http\Controllers;

use App\Lib\Debts\Bank;
use App\Lib\Debts\Decision;
use Illuminate\Http\Request;
use App\Lib\Helpers\RouteHelper;

class DebtsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('advance');
    }
    
    public function index()
    {
        $creditWorthiness = [
            'loan' => (new Bank)->getLoanWorthiness(),
            'credit' => (new Bank)->getCreditWorthiness()
        ];
        return view('debt', compact('creditWorthiness'));
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

    public function attempt(Request $request)
    {
        return (new Decision($request))->getDecision();
    }
}

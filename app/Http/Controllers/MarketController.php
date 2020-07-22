<?php

namespace App\Http\Controllers;

use App\Models\MarketOffer;
use Illuminate\Http\Request;
use App\Lib\Transactions\Offer;
use App\Lib\Transactions\Transaction;
use App\Lib\Repositories\UserRepository;
use App\Lib\Repositories\MarketRepository;

class MarketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('market');
    }

    public function list(Request $request)
    {
        if($request->getRequestUri() == '/market/offers/yours'){
            $minerals = (new MarketRepository)->getMinerals();
            $userData = (new UserRepository)->getUserWithMinerals();
            $offers = (new MarketRepository)->getOwnOffers();
            $transactions = (new MarketRepository)->getLastTransactions();
            return view('market-offers-yours', compact('minerals', 'userData', 'offers', 'transactions'));
            
        }
        if(strpos($request->getRequestUri(), '/market/offers/all') !== false){
            $userData = (new UserRepository)->getUserWithMinerals();
            $offers = (new MarketRepository)->getOthersOffers();
            return view('market-offers-all', compact('offers', 'userData'));
        }
    }

    public function add(Request $request)
    {
        (new Offer($request))->finalizeOffer();
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        (new Offer($request))->deleteOwnOffer();
        return redirect()->back();
    }

    public function show(Request $request)
    {
        return (new Offer($request))->getOffer();
    }

    public function addTransaction(Request $request)
    {
        return (new Transaction($request))->add();
    }
}

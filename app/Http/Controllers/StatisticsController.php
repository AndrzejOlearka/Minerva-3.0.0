<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\Searchers\Searcher;
use App\Lib\Repositories\UserRepository;
use App\Lib\Repositories\GuildRepository;

class StatisticsController extends Controller
{
    public function index()
    {
        $expStats = (new UserRepository)->getBestUserByExp();
        $wealthStats = (new UserRepository)->getBestUserByCoins();
        $guildStats = (new GuildRepository)->getBestGuilds();
        return view('statistics', compact('expStats', 'wealthStats', 'guildStats'));
    }

    public function search(Request $request)
    {
        $searchResult = new Searcher();
        return $searchResult->setQuery($request->search)
            ->UserResearch
            ->process()
            ->responseByResult()
            ->getResultJSON();
    }

    public function show($id)
    {
        $user = (new UserRepository)->find($id);
        return view('statistics-users', compact('user'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Lib\Repositories\GuildRepository;

class GuildsController extends Controller
{
    public function __construct(GuildRepository $guildRepository)
    {
        $this->middleware('auth');
        $this->guildRepository = $guildRepository;
    }
    
    public function index()
    {
        $this->guildRepository->getBestGuilds();
        $userGuildData = $this->guildRepository->findByAuthId();
        return view('guilds', compact('userGuildData'));
    }

    public function list(Request $request)
    {
        $guildData = $this->guildRepository->all();
        return view('guilds-list', compact('guildData'));
    }

    public function show(Request $request)
    {
        $guildData = $this->guildRepository->findByGuildId($request->guildid);
        return view('guilds-single', compact('guildData'));
    }

    public function create(Request $request)
    {  
        if($request->isMethod('post')){
            $name = $this->guildRepository->create();
            return Redirect::route('guilds')->with(['name' => $name]);
        }
        return view('guilds-create');
    }
}

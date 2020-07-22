<?php

namespace App\Lib\Repositories;

use App\Models\User;
use App\Models\Guild;
use App\Lib\Traits\UserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Lib\Helpers\Validators\Validator as ValidatorHelper;

class GuildRepository
{
    use UserData;

    public function all()
    {
        $guilds = Guild::with('users')->paginate(2);
        foreach($guilds as &$guild){
            $guild->guildExp = $guild->users->sum('exp');
            $guild->members = $guild->users->count();
            $guild->guildLeader = User::where('id', $guild->leader_id)->first();
        }
        return $guilds;
    }

    public function getBestGuilds()
    {
        return DB::table('guilds')
            ->join('users', 'users.id_guild', '=', 'guilds.id')
            ->select('guilds.name', DB::raw("sum(exp) as guildExp"))
            ->orderBy(DB::raw("sum('exp')"))
            ->groupBy('users.id_guild')
            ->take(10)
            ->get();
    }

    public function findByAuthId()
    {
        $this->setUserId()
             ->setUserDataModel();

        return Guild::join('users', 'users.id_guild', '=', 'guilds.id')
            ->select('guilds.id as guildid')
            ->where('id_guild', $this->userDataModel->id_guild)
            ->first();
    }

    public function findByGuildId($guildId)
    {
        $guilds = Guild::where('id', $guildId)
            ->with('users')
            ->get()
            ->map(function ($guild){
            $users = User::where('id_guild', $guild->id);
                return [
                    'name' => $guild->name,
                    'description' => $guild->description,
                    'exp' => $users->sum('exp'),
                    'avatar' => $guild->avatar,
                    'members' => $users->count(),
                    'leaderModel' => User::find($guild->leader_id),
                    'users' => $guild->users
                ];
            });
        
        return $guilds->first();
    }

    public function create()
    { 
        $data = request()->all();
        Validator::make($data, [
            'name' => ['required', 'string', 'min:4|max:255', 'unique:guilds'],
            'description' => ['required', 'string', 'min:10|max:255'],
            'avatar' => 'mimes:jpeg,jpg,bmp,png'
        ])->validate();    
        $fileName = ValidatorHelper::file('avatar', 'avatar.jpg');
        Guild::create([
            'name' => $data['name'], 'description' => $data['description'], 'avatar' => $fileName, 'leader_id' => Auth::id()
        ]);
        return $data['name'];
    }
}
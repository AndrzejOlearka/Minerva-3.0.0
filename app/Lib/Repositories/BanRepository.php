<?php

namespace App\Lib\Repositories;

use Carbon\Carbon;
use App\Models\BannedUser;
use App\Lib\Traits\UserData;
use Illuminate\Http\Request;

class BanRepository
{
    use UserData;

    public function ban(Request $request)
    {
        $user = BannedUser::create([
            'user_id' => $request->user, 'date_end' => date('Y-m-d H:i:s', strtotime($request->date)), 'reason' => $request->banType
        ]);
        return $user;
    }

    public function unban(Request $request)
    {
        $user = BannedUser::where('user_id', $request->user)
            ->orderBy('id', 'desc')
            ->first()
            ->delete();
        return $user;
    }


    public function bannedUsersReasonBehaviour()
    {
        return BannedUser::whereHas(
            'user', function ($query) {
                $query->where('banned_users.date_end', '<=', Carbon::now());
            })
            ->with('user')
            ->where('banned_users.reason', 1);
    }
}
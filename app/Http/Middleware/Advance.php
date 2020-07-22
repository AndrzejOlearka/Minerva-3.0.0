<?php

namespace App\Http\Middleware;

use App\Lib\Helpers\AdvanceHelper;
use App\Models\Moderator;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Session\Session;
use \Illuminate\Support\Facades\Auth;

class Advance
{
    /**
     * Get the successInfo with advance level
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        $user = User::find(Auth::id());
        $level = AdvanceHelper::setLevel($user->exp);
        if($user->level != $level){
            $user->level = $level;
            $user->save();
            $request->session()->flash('advance', $level);
        }
        return $next($request);

    }
}

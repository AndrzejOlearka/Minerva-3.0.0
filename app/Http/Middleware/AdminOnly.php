<?php

namespace App\Http\Middleware;

use App\Models\Moderator;
use Closure;
use \Illuminate\Support\Facades\Auth;

class AdminOnly
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        $moderator = Moderator::where('user_id', Auth::id())->first();
        if(empty($moderator)){
            return redirect('home');
        }
        if($moderator->type != 'admin'){
            return redirect('home');
        } else {
            return $next($request);
        }
    }
}

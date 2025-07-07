<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $level = '')
    {
        if(!Auth::check()){
            return redirect('login');
        }
        if($level){
            $array_level = array_map('intval', explode(' ',$level));
            if(!in_array(Auth::User()->level, $array_level)){
                return abort(403, 'Unauthorized action.');
            }
        }
        return $next($request);
    }
}

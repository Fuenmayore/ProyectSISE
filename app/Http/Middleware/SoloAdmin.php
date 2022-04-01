<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SoloAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next

     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        if (auth::user()->fullacces == 'yes') :
            return $next($request);
        elseif (auth::user()->fullacces == 'cesar') :
            return redirect('homeCesar');
        elseif (auth::user()->fullacces == 'adriana') :
            return redirect('homeAdriana');
        elseif (auth::user()->fullacces == 'aldo') :
            return redirect('homeAldo');
        elseif (auth::user()->fullacces == 'elkin') :
            return redirect('homeElkin');
        elseif (auth::user()->fullacces == 'hui') :
            return redirect('homeHui');
        elseif (auth::user()->fullacces == 'jose') :
            return redirect('homeJose');
        elseif (auth::user()->fullacces == 'manuel') :
            return redirect('homeManuel');
        elseif (auth::user()->fullacces == 'olga') :
            return redirect('homeOlga');
        elseif (auth::user()->fullacces == 'roberto') :
            return redirect('homeRoberto');
        endif;
        return redirect('Usuario');
    }
}

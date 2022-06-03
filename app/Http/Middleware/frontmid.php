<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App;
use App\Models\personal;
class frontmid
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
          $dil=App::getlocale();
        if($dil=='tr'){
            $dil=1;
        }
        else if($dil=='en'){
            $dil=2;
        }
        $personal=personal::where('language_id',$dil)->first();

        View::share('personel',$personal);
        return $next($request);
    }
}

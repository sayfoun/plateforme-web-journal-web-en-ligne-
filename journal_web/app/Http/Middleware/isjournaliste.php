<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
 use App\Http\Controllers\Redirect;
class isjournaliste
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
                    public function handle($request, Closure $next)
                    {
                        if(!(Auth::user()->journaliste))

                        {
                             return redirect()->action('ProfilController@Accueil');
                        }
                        
                           return $next($request);

                        
                    }
}

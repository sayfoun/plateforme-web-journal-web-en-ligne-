<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Http\Controllers\Redirect;
class is_admin
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
        if(Auth::user()->role_id=="user")
        {
            if(Auth::user()->journaliste)
            {
            return redirect()->action('ProfilController@profil');
            }
            else
            {
              return redirect()->action('ProfilController@Accueil');  
            }
            
        }
        return $next($request);
    }
}

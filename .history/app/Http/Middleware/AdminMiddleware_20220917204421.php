<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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

        //check if the user is authenticated
        if(Auth::check()){ //user is logged in

            if(Auth::user()->is_admin == 1){ //user is admin

                return $next($request);

            } else { //user is not admin

                return redirect('/opportunities')->with('message', 'Oppportunity created successfully');

            }

        } else { //user is not logged in

            return redirect(route('app-general.home-page'))->with('message', 'You have to be logged in to access this view');

        }

    }
}

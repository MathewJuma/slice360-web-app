<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\app_general\Slice360Visitor;

class Slice360VisitorCounter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //get browser agents
        $agent = new Agent();

        //get users IP and hash it
        $ip = hash('sha512', $request->ip());

        //check if the user is authenticated
        if(Auth::check()){

            //validate the record and store/create in database
            if (Slice360Visitor::where('date', today())->where('user_id', auth()->id())->count() < 1)
            {
                Slice360Visitor::create([
                    'date' => today(),
                    'ip' => $ip,
                    'user_id' => "",
                    'platform' => $agent->platform(),
                    'platform_version' => $agent->version($agent->platform()),
                    'browser' => $agent->browser(),
                    'browser_version' => $agent->version($agent->browser()),
                    'language' => implode(", ", $agent->languages()),
                    'device' => $agent->device(),
                ]);
            }

        }else{

            //validate the record and store/create in database
            if (Slice360Visitor::where('date', today())->where('ip', $ip)->count() < 1)
            {
                Slice360Visitor::create([
                    'date' => today(),
                    'ip' => $ip,
                    'user_id' => "",
                    'platform' => $agent->platform(),
                    'platform_version' => $agent->version($agent->platform()),
                    'browser' => $agent->browser(),
                    'browser_version' => $agent->version($agent->browser()),
                    'language' => implode(", ", $agent->languages()),
                    'device' => $agent->device(),
                ]);
            }

        }
        return $next($request);
    }
}

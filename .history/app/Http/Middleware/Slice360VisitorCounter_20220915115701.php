<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
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
        $agent = new BrowserAgent();

        //get users IP and hash it
        $ip = hash('sha512', $request->ip());

        //validate the record and store/create in database
        if (Slice360Visitor::where('date', today())->where('ip', $ip)->count() < 1)
        {
            Slice360Visitor::create([
                'date' => today(),
                'ip' => $ip,
                'platform' => $agent->platform(),
                'platform_version' => $agent->version($agent->platform()),
                'browser' => $agent->browser(),
                'browser_version' => $agent->version($agent->browser()),
                'language' => implode(", ", $agent->languages()),
                'device' => $agent->device(),
            ]);
        }
        return $next($request);
    }
}

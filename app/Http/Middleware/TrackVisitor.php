<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');

        Visitor::updateOrCreate(
            ['ip_address' => $ip],
            [
                'user_agent' => $userAgent,
                'last_activity' => Carbon::now(),
            ]
        );

        return $next($request);
    }
}

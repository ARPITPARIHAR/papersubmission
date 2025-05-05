<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $visitorId = $request->cookie('visitor_id');

        if (!$visitorId) {
            $visitorId = (string) \Illuminate\Support\Str::uuid();
            DB::table('visitors')->insert(['visitor_id' => $visitorId, 'created_at' => date('Y-m-d H:i:s')]);
        } else {
            $exists = DB::table('visitors')->where('visitor_id', $visitorId)->exists();
            if (!$exists) {
                DB::table('visitors')->insert(['visitor_id' => $visitorId, 'created_at' => date('Y-m-d H:i:s')]);
            }
        }

        return $next($request)->cookie('visitor_id', $visitorId, 525600);
    }
}

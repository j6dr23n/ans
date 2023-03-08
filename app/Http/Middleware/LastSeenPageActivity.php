<?php

namespace App\Http\Middleware;

use App\Models\Page;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LastSeenPageActivity
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
        if (auth()->user()->page !== null && auth()->user()->page->banned == true) {
            return back()->with('error', 'You got banned. Contact to admin!!!');
        }

        if (Auth::check() && auth()->user()->page !== null) {
            $expireTime = Carbon::now()->addMinute(1); // keep online for 1 min
            Cache::put('is_online_page'.Auth::user()->page->id, true, $expireTime);

            //Last Seen
            $page = Page::where('id', Auth::user()->page->id)->update(['last_seen' => Carbon::now()]);
        }

        return $next($request);
    }
}

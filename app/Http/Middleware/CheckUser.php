<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use DB;

class CheckUser
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
        if($request->session()->get('uname') === null){
            // $last = DB::table('login')->where('id','1')->get();
            // DB::table('login')->where('id','1')->update([
            //     'lasttime'=> $last[0]->time,
            //     'lastip'=> $last[0]->ip,
            //     'lastdate'=> $last[0]->date,
            //     'lastlocation'=>$last[0]->location,
            // ]);
            return redirect('admin')->with('wrong','Please Login First');
        }
        return $next($request);
    }
}

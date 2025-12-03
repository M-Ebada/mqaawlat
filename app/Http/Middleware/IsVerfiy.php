<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsVerfiy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->advisor_account_status !=  null){
            if(auth()->user()->advisor_account_status == 'PENDING'){
                auth()->logout();
                return redirect()->route('user.login')->with('error','سيتم مراجعة حسابك في اقرب وقت');
            }
            if(auth()->user()->advisor_account_status == 'REJECTED'){
                auth()->logout();
                return redirect()->route('user.login')->with('error','تم رفض طلبك');
            }
         }
        return $next($request);
    }
}

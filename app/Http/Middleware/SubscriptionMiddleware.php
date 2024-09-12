<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $authUser = Auth::user();
        $user = User::find($authUser->id);

        $subscribes = $user->subscribes()->where(function($q){
            $q->where('end_date', '>', now())
            ->where('is_active', true);
        })->first();


        if($subscribes){
            return to_route('customer.subscribe', ['subscription' => $subscribes->id]);
        }


        return $next($request);
    }
}

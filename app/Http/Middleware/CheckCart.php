<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $activePurchase = $user->purchases->where('status', 'Chưa đặt hàng')->first();

            if ($activePurchase) {
                session(['purchase_id' => $activePurchase->id]);
                session(['cart' => $activePurchase]);
            }
        }
        return $next($request);
    }
}
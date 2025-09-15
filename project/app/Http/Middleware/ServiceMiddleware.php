<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // <-- Add this
class ServiceMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('service')->check()) {
            Log::info('Middleware: Service not logged in');
            return redirect()->route('warranty');
        }
    
        if ($request->route()->getName() === 'service.register' && session()->get('accessed_register', false)) {
            Log::info('Middleware: Access to /warranty/register blocked. Session flag accessed_register:', [session()->get('accessed_register')]);
            return redirect()->route('warranty');
        }
    
        Log::info('Middleware: Access granted to route', [$request->route()->getName()]);
    
        return $next($request);
    }
    
}

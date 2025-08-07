<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use App\Models\Service;
use App\Models\Warranty;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }


    public function logout(Request $request)
    {
        Log::info('Logout method triggered.');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function showAdminPage()
    {


        // Total products
        $totalProducts = Product::count();

        // Total verified products
        $verifiedProducts = Product::whereNotNull('verification_date')->count();

        // Total products with warranty
        $productsWithWarranty = Product::whereNotNull('warranty')->count();

        // Total services
        $totalServices = Service::count();

        // Total warranties
        $totalWarranties = Warranty::count();

        // Expired warranties
        $expiredWarranties = Warranty::where('warranty_end_date', '<', now())->count();

        // Get session data
        $sessionId = session()->getId();
        $lastActivity = session('last_activity') ?? 'N/A';

        // Get last login details

        $ipAddress = request()->ip();
        $sessionCount = count(session()->all()); // ✅ This remains an integer



        // Section identifier
        $section = 'home';

        return view('admin.dashboard', compact(
            'section',
            'totalProducts',
            'verifiedProducts',
            'productsWithWarranty',
            'totalServices',
            'totalWarranties',
            'expiredWarranties',
            'sessionId',
            'lastActivity',

            'ipAddress',
            'sessionCount'
        ));
    }

    public function logoutAllSessions()
{
    // Flush all sessions
    Session::flush();

    // Clear cache to ensure logout
    Artisan::call('cache:clear');

    return redirect()->route('admin.dashboard')->with('success', 'All sessions have been closed.');
}
}

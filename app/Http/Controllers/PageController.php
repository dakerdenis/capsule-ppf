<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($locale)
    {
        // Optionally, set the app locale based on the route
        app()->setLocale($locale);

        return view('index', ['locale' => $locale]);
    }

    public function catalog($locale)
    {
        // Optionally, set the app locale
        app()->setLocale($locale);

        return view('catalog', ['locale' => $locale]);
    }

    public function verification()
    {
        return view('verification');
    }
    
    public function warranty()
    {
        return view('warranty.warranty');
    }
    public function registerWarranty()
{
    return view('warranty.register');
}
public function warrantyDocument()
{
    return view('warranty.document');
}


}

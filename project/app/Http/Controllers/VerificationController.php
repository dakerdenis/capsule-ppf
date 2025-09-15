<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    
    public function ShowVerificationForm()
    {
        return view('verification');
    }
}

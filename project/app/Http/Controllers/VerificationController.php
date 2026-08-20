<?php

namespace App\Http\Controllers;

class VerificationController extends Controller
{
    public function ShowVerificationForm()
    {
        return view('verification');
    }
}

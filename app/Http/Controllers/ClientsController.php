<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client; // Import Client Model

class ClientsController extends Controller
{
    public function adminClients()
    {
        $section = 'clients';

        // Fetch all clients from the database
        $clients = Client::all(); // Fetch all clients

        return view('admin.dashboard', compact('section', 'clients'));
    }
}

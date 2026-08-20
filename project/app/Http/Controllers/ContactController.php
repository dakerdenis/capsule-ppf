<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'nullable|digits_between:7,15',
            'countries' => 'required|string',
            'message' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        // Email Data
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'country' => $request->countries,
            'message' => $request->message,
        ];

        // Send Email
        Mail::send('emails.contact', $data, function ($message) use ($request) {
            $message->to('contact@capsuleppf.com') // Your recipient email
                ->subject('New Contact Form Submission')
                ->replyTo($request->email);
        });

        return response()->json(['success' => true, 'message' => 'Message sent successfully!']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);

        return response()->json([
            'status' => 'success',
            'msg' => 'Contact form submitted',
            'data' => $validated
        ]);
    }
}
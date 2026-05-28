<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // TODO: Save to database when messages table is ready
        // Message::create($validated);

        return redirect()->route('home', '#kontak')->with('success', 'Pesan berhasil dikirim! Kami akan menghubungi Anda segera.');
    }
}

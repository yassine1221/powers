<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'request_type' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Add default status
        $validated['status'] = 'nouveau';

        Message::create($validated);

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès.');
    }

    public function adminIndex()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('admin.messages', ['messages' => $messages]);
    }

    public function updateStatus(Message $message, Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|in:nouveau,lu,traité'
        ]);

        $message->update($validated);

        return redirect()->back()->with('success', 'Statut mis à jour avec succès.');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->back()->with('success', 'Message supprimé avec succès.');
    }
}

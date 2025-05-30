<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'request_type' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create($validated);

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès.');
    }

    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('admin.messages', compact('messages'));
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

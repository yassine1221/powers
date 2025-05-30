<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'satisfaction' => [
                'globale' => 98,
                'service' => 95,
                'delais' => 97,
                'recommandation' => 99
            ],
            'counts' => [
                'users' => User::count(),
                'messages' => Message::count(),
                'projects' => Project::count()
            ]
        ];

        $users = User::orderBy('created_at', 'desc')->take(5)->get();
        return view('admin.dashboard', compact('stats', 'users'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        if ($user->isAdmin()) {
            return response()->json(['error' => 'Cannot edit admin users'], 403);
        }
        return response()->json($user);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->isAdmin()) {
            return back()->with('error', 'Cannot edit admin users');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'company' => 'nullable|string|max:255',
        ]);

        $user->update($request->only(['name', 'email', 'company']));
        return back()->with('success', 'Utilisateur mis à jour avec succès');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        if ($user->isAdmin()) {
            return back()->with('error', 'Cannot delete admin users');
        }

        $user->delete();
        return back()->with('success', 'Utilisateur supprimé avec succès');
    }
    public function toggleBlock($id)
    {
        $user = User::findOrFail($id);
    
        if ($user->isAdmin()) {
            return redirect()->back()->with('error', 'Impossible de bloquer un administrateur.');
        }
    
        $user->is_blocked = !$user->is_blocked;
        $user->save();
    
        return redirect()->back()->with('success', 'Utilisateur ' . ($user->is_blocked ? 'bloqué' : 'débloqué') . ' avec succès.');
    }
    
}

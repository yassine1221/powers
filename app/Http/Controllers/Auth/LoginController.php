<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. Validate input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $user = \App\Models\User::where('email', $credentials['email'])->first();
    
        if (!$user) {
            return back()->withErrors([
                'email' => 'Identifiants incorrects.',
            ])->withInput($request->only('email', 'remember'));
        }
    
        if ($user->is_blocked) {
            return back()->withErrors([
                'email' => 'Votre compte a été bloqué. Veuillez contacter l’administrateur.',
            ])->withInput($request->only('email', 'remember'));
        }
    
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
    
        
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }
    
            return redirect()->intended('/');
        }
    
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->withInput($request->only('email', 'remember'));
    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    protected function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'is_blocked' => false, // Empêche connexion si bloqué
        ];
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        $user = \App\Models\User::where('email', $request->email)->first();
    
        if ($user && $user->is_blocked) {
            $message = 'Votre compte a été bloqué. Veuillez contacter l’administrateur.';
        } else {
            $message = 'Identifiants incorrects.';
        }
    
        throw ValidationException::withMessages([
            $this->username() => [$message],
        ]);
    }


}

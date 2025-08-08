<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    protected function throttleKey(Request $request): string
    {
        return Str::lower((string)$request->input('email')).'|'.$request->ip();
    }

    public function login(Request $request)
    {
        // Basic input validation + honeypot (trap must be empty)
        $credentials = $request->validate([
            'email' => 'required|email:rfc,dns|max:191',
            'password' => 'required|string|min:4',
            'trap' => 'nullable|size:0',
        ], [
            'trap.size' => 'Requisição inválida.',
        ]);

        // Rate limiting per email+IP
        $key = $this->throttleKey($request);
        if (RateLimiter::tooManyAttempts($key, 6)) { // 6 tentativas por minuto
            $seconds = RateLimiter::availableIn($key);
            return back()->withErrors([
                'email' => __('Muitas tentativas. Tente novamente em :seconds segundos.', ['seconds' => $seconds]),
            ])->withInput($request->only('email'));
        }

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $request->boolean('remember'))) {
            RateLimiter::clear($key);
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        Log::warning('Falha de login', ['email' => $request->input('email'), 'ip' => $request->ip()]);
        RateLimiter::hit($key, 60); // bloqueio por 60s por tentativa

        return back()->withErrors([
            'email' => __('Credenciais inválidas.'),
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

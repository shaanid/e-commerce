<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SigninRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.signin');
    }

    public function signIn(SigninRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->hasRole('user')) {
                return redirect()->route('user.home.index')->with('success', 'Login successful');
            }

            return redirect()->route('dashboard.index')->with('success', 'Login successful');
        } else {
            return redirect()->route('auth.index')->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.index')->with('success', 'You have been logged out.');
    }
}

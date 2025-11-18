<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // Show register form
    public function showRegister()
    {
        return view('auth.register'); // resources/views/auth/register.blade.php
    }

    // Handle register POST
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|unique:users,name',
            'password' => 'required|string|min:4|confirmed',
            'email'    => 'required|email|unique:users,email',
        ]);

        $role = User::count() === 0 ? 'admin' : 'user';

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $role,
        ]);

        // Send Welcome email (logged in storage/logs/laravel.log)
        try {
            Mail::to($user->email)->send(new WelcomeMail($user));
        } catch (\Throwable $e) {
            Log::error("Mail send failed: " . $e->getMessage());
        }

        return redirect()->route('login.form')
                         ->with('success', 'Registration successful! Check log for email.');
    }

    // Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Login POST
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('name', 'password'))) {

            $user = Auth::user();

            return $user->role === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('user.dashboard');
        }

        return back()->withErrors(['name' => 'Invalid login credentials']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function userDashboard()
    {
        return view('user.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //Show register form
    public function showRegister() {
        return view('auth.register');
    }

    //Handle registration
   public function register(Request $request)
    {
        $request->validate([
            // validate name unique on users table (not admins)
            'name'=> 'required|string|unique:users,name',
            'password'=> 'required|string|min:4|confirmed', 
        ]);
        
        // check if this is the first user
        $role = User::count() === 0 ? 'admin' : 'user';

        // generate a placeholder email because the users table requires email
        // use name slug to avoid spaces and a controlled domain
        $emailLocal = preg_replace('/[^a-z0-9._-]/i', '', strtolower($request->name));
        $email = $emailLocal . '@local.test';

        User::create([
            'name'=> $request->name,
            'email'=> $email,                     // <-- added to satisfy DB
            'password'=> Hash::make($request->password),
            'role' => $role,
        ]);

        return redirect()->route('login.form')->with('success','User registered successfully.');
    }
    
    //show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    //handle login
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($request->only('name','password'))) {
            $user = Auth::user();
            if($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors(['name'=>'Invalid credentials']);
    }

    //logout

    public function logout()
    {
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }

        if(Auth::guard('web')->check()){
            Auth::guard('web')->logout();
        }

        return redirect()->route('login.form');
    }
    
    //Admin dashboard

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    // User dashboard

    public function userDashboard()
    {
        return view('user.dashboard');
    }
}

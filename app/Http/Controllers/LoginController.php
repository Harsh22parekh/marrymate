<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;   
use App\Models\User;   
use App\Models\register;         

class LoginController extends Controller
{
     public function showLogin()
    {
        return view('login');
    }
    
    public function register()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->role_as == 1) {
             session()->put('admin2_name', $user->name);
            return redirect('/admin1')->with('success', 'Welcome Admin!');
        } else {
            return redirect('/')->with('success', 'Logged in successfully!');
        }
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ])->withInput();
    }

      public function store1(Request $request)
    {
        // 1) Validation
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:4|confirmed',  // 'password_confirmation' field bhi chahiye form mein
        ]);

        // 2) Create user
        $user = register::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role_as'  => 0,
        ]);

        // 3) Auto‑login new user
        Auth::login($user);

if ($user->role_as == 1) {
        return redirect('/admin')->with('success', 'Welcome Admin!');
    } else {
        return redirect('/')->with('success', 'Account created & logged in!');
    }    }


}

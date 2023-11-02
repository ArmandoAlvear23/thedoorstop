<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request) {

        // Validate form input
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        // Redirect to home page
        return redirect()->route('home')->with('message', 'User created and logged in!');
        
    }

    // Logout User
    public function logout(Request $request) {

        // Logout user
        auth()->logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate session token
        $request->session()->regenerateToken();

        // Redirect to home page
        return redirect()->route('home')->with('message', 'You have been logged out!');
    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {

        // Validate login form input
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // Attempt to login with form inputs
        if(auth()->attempt($formFields)) {

            // Regenerate session
            $request->session()->regenerate();

            // Redirect to home page
            return redirect()->route('home')->with('message', 'Welecome '.auth()->user()->name.'!');
        }

        // Redirect back to login form if there is an authentication error
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}

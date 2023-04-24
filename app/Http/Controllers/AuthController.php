<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function getSignIn() {
        return view('auth.signin');
    }
    public function getSignUp() {
        return view('auth.signup');
    }

   
    public function signUp(Request $request) {
        if(Auth::check()) {
            return redirect('/signup')->withErrors('You are already signed in!');
        }

        $request->validate([
            'name' => 'required|min:2|max:255|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:255|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/signup')->with('status', 'You have signed in!');
    }

    public function signIn(Request $request) {
        if(Auth::check()) {
            return redirect('/signin')->withErrors('You are already signed in!');
        }

        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->intended('/')->with('status', 'Sign in');
        }

        return redirect('/signin')->withErrors('Invalid credentials');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('signin');
    }
}

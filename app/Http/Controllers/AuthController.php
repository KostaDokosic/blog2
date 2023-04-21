<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getSignIn() {
        return view('auth.signin');
    }
    public function getSignUp() {
        return view('auth.signup');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request, string $role){
        $credentials = ["email"=>"$role@$role.com","password"=>"$role"];
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->intended('/');
        // return view('pages.auth.login');
    }
    public function forgot(){
        return view('pages.auth.forgot');
    }
    public function showResetForm(){
        return view('pages.auth.reset');
    }
}

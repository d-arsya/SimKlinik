<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('pages.auth.login');
    }
    public function forgot(){
        return view('pages.auth.forgot');
    }
    public function showResetForm(){
        return view('pages.auth.reset');
    }
}

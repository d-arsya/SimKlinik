<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use PhpParser\Node\Stmt\While_;

class AuthController extends Controller
{
    public function login(Request $request, string $role = 'noneweb')
    {
        if (env('APP_ENV') == 'local') {
            $user = User::where('role', $role)->first();
            Auth::login($user);
            $request->session()->regenerate();
            if ($request->url) {
                return redirect()->intended($request->url);
                # code...
            }
            return redirect()->intended('/');
        }
        if ($request->isMethod('GET')) {
            return view('pages.auth.login');
        } elseif ($request->isMethod('POST')) {
            $credentials = $request->validate([
                "email" => ['required', 'email', 'lowercase'],
                "password" => ['required']
            ]);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            } else {
                return to_route('login')->with('error', 'Gagal login');
            }
        }
    }
    public function forgot(Request $request)
    {
        if ($request->isMethod("get")) {
            return view('pages.auth.forgot');
        } elseif ($request->isMethod("post")) {
            $request->validate(['email' => 'required|email']);
            $status = Password::sendResetLink($request->only('email'));
            return $status === Password::RESET_LINK_SENT
                ? back()->with('success', "Link reset password terkirim")
                : back()->with('error', "Link reset password gagal");
        }
    }
    public function showResetForm($token)
    {
        return view('pages.auth.reset', compact('token'));
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'token' => 'required',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? to_route('login')->with('status', __($status))
            : back()->with('error', $status);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('login');
    }
}

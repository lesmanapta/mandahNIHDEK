<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();

            // Set a session
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_fullname', $user->fullname);

            // Set a cookie
            $remember = $request->has('remember') ? true : false;
            if ($remember) {
                $cookie = cookie('user_remember', $user->id, 60 * 24 * 30); // 30 days expiration
                return redirect()->intended('/')->withCookie($cookie);
            }

            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors(['login' => 'Invalid login credentials']);
    }

    public function logout()
    {
        Auth::logout();
        
        // Remove session and cookie
        session()->forget(['user_id', 'user_fullname']);
        cookie()->forget('user_remember');

        return redirect('/login');
    }
}

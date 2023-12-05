<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Models\Login;

class LoginController extends Controller
{
    // /**
    //  * Show the login form.
    //  *
    //  * @return \Illuminate\View\View
    //  */
    // public function showLoginForm()
    // {
    //     return view('login'); // Assuming you have a 'login' view file
    // }

    // /**
    //  * Handle the login process.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function login(Request $request)
    // {
    //     // Validate the login request, you can customize this based on your needs
    //     $request->validate([
    //         'username' => 'required|string',
    //         'password' => 'required|string',
    //     ]);

    //     // Attempt to authenticate the user
    //     $credentials = $request->only('username', 'password');
    //     if (auth()->attempt($credentials)) {
    //         // Authentication passed
    //         return redirect()->intended('/'); // Redirect to the dashboard or any desired page
    //     }

    //     // Authentication failed
    //     return back()->withErrors(['login' => 'Invalid credentials']);
    // }

    // /**
    //  * Log the user out.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function logout()
    // {
    //     auth()->logout();

    //     return redirect('/login'); // Redirect to the login page or any desired page after logout
    // }
}

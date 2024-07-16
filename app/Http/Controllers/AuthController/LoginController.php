<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }
    //
    public function login(Request $request)
    {
        //Validate
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Try log
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // if ok
            return redirect()->itended('/home');
        }

        // if not ok
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['email' => 'These credentials do not match']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

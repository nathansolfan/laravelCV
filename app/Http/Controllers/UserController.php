<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //1st
    public function show()
    {
        //2nd - get user
        $user = Auth::user();

        //3rd - pass user to view
        return view('profile', ['user' => $user]);
    }

    // UPDATE User INFO

    public function update(Request $request)
    {
        //1st
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users, email,' . Auth::id(),
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        //2nd
        /** @var User $user */

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}

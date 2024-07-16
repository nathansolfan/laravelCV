<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}

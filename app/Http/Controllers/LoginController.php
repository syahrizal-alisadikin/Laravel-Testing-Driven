<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        
        Auth::attempt($request->only('email', 'password'));

        return redirect('/dashboard');
    }
}

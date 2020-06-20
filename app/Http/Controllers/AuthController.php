<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard()
    {
        if(Auth::check() === true){
            return view('admin.dashboard');
        }
        return redirect()->route('admin.login');
    }

    public function showLoginForm()
    {
        return view('admin.formlogin');
    }

    public function login(Request $request)
    {
        var_dump($request->all());
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($credentials)){
            return redirect()->route('admin');
        }
        return redirect()->back()->withInput()->withErrors(['Algo está errado. :(']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin');
    }
}

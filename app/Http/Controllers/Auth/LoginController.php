<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if (Auth::check()) {
            return redirect('/admin');
        }
        return view("Auth.login");
    }

    public function login(LoginRequest $request){
        // $data = $request->only("usersname","password");
        $data = $request->only("username", "password");


        if (Auth::attempt($data)) {
            // Authentication passed
            return redirect()->intended('/admin');
        }else{
            return redirect()->route('login')->with("error","Invalid credentials");
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

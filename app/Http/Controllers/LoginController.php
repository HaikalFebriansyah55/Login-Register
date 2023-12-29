<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login', [
            'title'=>"Login",
        ]);
    }

    public function login(Request $request){
        $loginData = $request->validate([
            'username' => ['required', 'min:3', 'max:255'],
            'password' => 'required|min:5|max:255',
        ]);

        if (Auth::attempt($loginData)) {
            $request->session()->regenerate();

            // Check the user's role and redirect accordingly
            if (Auth::user()->is_admin) {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/about');
            }
        }

        return back()->with("loginError", "Username atau Password Tidak Terdaftar");
    }

    public function logout(Request $request){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect("/login");
    }
}

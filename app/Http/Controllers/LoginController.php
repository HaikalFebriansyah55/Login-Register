<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function index(){
        return view('login/index', [
            'title'=>"Login",
        ]);
    }
    public function login(Request $request){
        $loginData = $request->validate([
            'username'=>['required','min:3','max:255'],
            "password"=>'required|min:5|max:255'
        ]);
        if (Auth::attempt($loginData)){
            $request->session()->regenerate();
            return redirect()->intended('/about');
        }
        return back()->with("loginError", "Username Atau Pasword Tidak Terdaftar");
        
    }
    public function logout(Request $request){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect("/login");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register', [
            "title" => "Register",
            "active"=>"register"
        ]);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:5|max:255',
        'role' => 'user',
        'img' => 'default.png',
    ]);

    // Make sure 'username' is included in $validatedData
    $validatedData['username'] = $request->input('username');

    $validatedData['password'] = Hash::make($validatedData['password']);

    User::create($validatedData);

    return redirect('/login')->with('success', 'Registration successful. Please log in.');
}


}

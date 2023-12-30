<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.pages.index');
    }
    public function users(){
        $totalUsers = User::count();
        $data = User::all();
        return view('admin.pages.users',compact('data','totalUsers'));
    }
    public function usersAdd(){
        return view('admin.pages.user-add');
    }
    public function usersStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'role' => 'required',
            'img' => 'default.png',
        ]);
    
        // Make sure 'username' is included in $validatedData
        $validatedData['username'] = $request->input('username');
    
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        User::create($validatedData);
    
        return redirect('/dashboard/users')->with('success', 'User added successfully.');
    }
    public function userEdit($id)
{
    $data = User::findOrFail($id);
    return view('admin.pages.user-edit', compact('data'));
}

public function userUpdate(Request $request, $id)
{
    // Validate request data
    $this->validate($request, [
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'role' => 'required|in:admin,publisher,user',
    ]);

    // Find the user
    $user = User::findOrFail($id);

    // Update user data
    $user->update([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'role' => $request->role,
    ]);

    // Redirect back with success message
    return redirect('/dashboard/users')->with('success', 'User updated successfully.');
}


    public function userDelete($id)
    {
        $data = User::find($id);
        $data->delete();

        return redirect('dashboard/users')->with('danger', 'Data Berhasil Di Hapus');
    }

    public function publishers(){
        
    }
    public function games(){
        $data = User::all();
        return view('admin.pages.games', compact('data'));
    }
}

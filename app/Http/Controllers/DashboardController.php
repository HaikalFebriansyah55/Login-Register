<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.pages.index');
    }
    # -------------------------------------Users-------------------------------------
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
    # -------------------------------------Publishers-------------------------------------
    public function publishers(){
        $totalPublishers = Publisher::count();
        $data = Publisher::all();
        return view('admin.pages.publishers', compact('data', 'totalPublishers'));
    }
    public function publisherAdd(){
        return view('admin.pages.publisher-add');
    }
    public function publisherStore(Request $request){
        // Validate the incoming request data
        $validatedData = $request->validate([
            'publisher_name' => 'required|string|max:255',
            'address' => 'required|string',
            'contact' => 'required|string|max:255',
        ]);

        // Create a new publisher record in the database
        Publisher::create($validatedData);

        // Redirect to a success page or back to the form with a success message
        return redirect('/dashboard/publishers')->with('success', 'Game added successfully!');
    }
    public function publisherEdit($id){
        $data = Publisher::findOrFail($id);
        return view('admin.pages.publisher-edit', compact('data'));
    }
    public function publisherUpdate(Request $request, $id){
        // Validate the incoming request data
        $validatedData = $request->validate([
            'publisher_name' => 'required|string|max:255',
            'address' => 'required|string',
            'contact' => 'required|string|max:255',
        ]);
    
        // Find the Publisher by ID
        $publisher = Publisher::findOrFail($id);
    
        // Update the Publisher with validated data
        $publisher->update($validatedData);
    
        // Redirect with success message
        return redirect('/dashboard/publishers')->with('success', 'Data Berhasil Diubah');
    }
    
    public function publisherDelete($publisher_id){
        $data = Publisher::find($publisher_id);
        $data->delete();
        return redirect('dashboard/publishers')->with('danger', 'Data Berhasil Di Hapus');
    }
    # -------------------------------------Games-------------------------------------
    public function games(){
        $totalGames = Game::count();
        $data = Game::all();
        return view('admin.pages.games', compact('data','totalGames'));
    }
    public function gamesAdd()
    {
        $publishers = Publisher::all();
        return view('admin.pages.game-add', compact('publishers'));
    }
    public function gameStore(Request $request)
    {
        // Validate the incoming request data, including the image
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'price' => 'required|numeric',
            'publisher_id' => 'required|string|max:255',
            'release_date' => 'required|date',
            'platform' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        ]);

        // Move the uploaded image to the public/img directory with a unique name
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('img'), $imageName);

        // Add the image path to the validated data
        $validatedData['image'] = $imageName;

        // Create a new game record in the database
        Game::create($validatedData);

        // Redirect to a success page or back to the form with a success message
        return redirect('/dashboard/games')->with('success', 'Game added successfully!');
    }
    public function gameEdit($id){
        $data = Game::findOrFail($id);
        return view('admin.pages.game-edit', compact('data'));
    }
        public function gameUpdate(Request $request, $id)
    {
        // Validate the incoming request data, including the image
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'price' => 'required|numeric',
            'release_date' => 'required|date',
            'platform' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        ]);

        // Find the Game by ID
        $game = Game::findOrFail($id);

        // Update the Game with validated data
        $game->update($validatedData);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img'), $imageName);

            // Update the game's image path
            $game->image = $imageName;
            $game->save();
        }

        // Redirect to a success page or back to the form with a success message
        return redirect('/dashboard/games')->with('success', 'Game updated successfully!');
    }


    public function gameDelete($id){
        $data = Game::find($id);
        $data->delete();
        return redirect('dashboard/games')->with('danger', 'Data Berhasil Di Hapus');
    }




}

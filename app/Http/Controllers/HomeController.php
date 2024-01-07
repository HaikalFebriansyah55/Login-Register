<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = Game::all();
        return view(("pages.index"),compact('data'),[
            'title'=>"Home"
        ]);
    }
    public function gameDetail($id){
        $data = Game::findOrFail($id);
        return view('pages.game-detail',compact('data'),[
            'title'=>"Home"
        ]);        
    }
}

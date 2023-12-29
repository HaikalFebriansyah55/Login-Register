<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view("pages.index"); 
});
  
  
  Route::middleware(["guest"])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    //Untuk Yang Belum Punya Akun
  });
  
  Route::middleware(['auth'])->group(function () {
    //Untuk Yang Sudah Punya Akun
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware(["userakses:admin"])->group(function(){
      //Untuk Akun Dengan Role Admin
      Route::get("/dashboard", [DashBoardController::class, "index"]);
      
    });
    Route::middleware(["userakses:user"])->group(function () {
      //Untuk Akun Dengan Role User
    //   Route::get('/blog', [PostController::class, "index"]);
    //   Route::get('blog/{post}', [PostController::class, "show"]);
      Route::get('/about', function () {
        return view("pages.about", [
          "name" => "Haikal Febriansyah",
          "email" => "haiklafebriansyah743@gmail.com",
          "image" => "haikal.jpg",
          "title" => "About"
        ]);
      
    });
    });
    
  });

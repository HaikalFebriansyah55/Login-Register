<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;

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

Route::get('/',[HomeController::class, 'index']);
Route::get('/gamedetail/{id}',[HomeController::class, 'gameDetail'])->name('gameDetail');
Route::post('/purchase-game/{id}', [TransactionController::class,'purchaseGame'])->name('purchaseGame');

Route::middleware(["guest"])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    // Untuk Yang Belum Punya Akun
});

Route::middleware(['auth'])->group(function () {
    // Untuk Yang Sudah Punya Akun
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::middleware(["userakses:admin"])->group(function(){
        // Untuk Akun Dengan Role Admin
        Route::get("/dashboard", [DashboardController::class, "index"]); 
        #user
        Route::get("/dashboard/users", [DashboardController::class, "users"]);
        Route::get("/dashboard/users/add", [DashboardController::class, "usersAdd"]);
        Route::post("/dashboard/users/store", [DashboardController::class, "usersStore"])->name("usersStore");
        Route::get("/dashboard/users/edit/{id}", [DashboardController::class, "userEdit"])->name("userEdit");
        Route::put("/dashboard/users/update/{id}", [DashboardController::class, "userUpdate"])->name("userUpdate");
        Route::get('/dashboard/users/{id}', [DashboardController::class, 'userDelete'])->name('dashboard.users.delete');
        # publisher
        Route::get("/dashboard/publishers", [DashboardController::class, "publishers"]);
        Route::get("/dashboard/publishers/add", [DashboardController::class, "publisherAdd"]);
        Route::post("/dashboard/publishers/store", [DashboardController::class, "publisherStore"]);
        Route::get("/dashboard/publishers/edit/{id}", [DashboardController::class, "publisherEdit"]);
        Route::put("/dashboard/publishers/update/{id}", [DashboardController::class, "publisherUpdate"])->name("publisherUpdate");
        Route::get('/dashboard/publishers/{id}', [DashboardController::class, 'publisherDelete'])->name('dashboard.publishers.delete');
        
        # game
        Route::get("/dashboard/games", [DashboardController::class, "games"]);
        Route::get("/dashboard/games/add", [DashboardController::class, "gamesAdd"]);
        Route::post("/dashboard/games/store", [DashboardController::class, "gameStore"]);
        Route::get("/dashboard/games/edit/{id}", [DashboardController::class, "gameEdit"]);
        Route::put("/dashboard/games/update/{id}", [DashboardController::class, "gameUpdate"])->name("gameUpdate");
        Route::get('/dashboard/games/{id}', [DashboardController::class, 'gameDelete'])->name('dashboard.games.delete');
    });
    
    Route::middleware(["userakses:user"])->group(function () {
        // Untuk Akun Dengan Role User
        Route::get('/library', [TransactionController::class, 'library'])->name('library');
    });
});

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name("home");

Route::get("/login", [AuthController::class, "showLoginForm"])->name("login");

Route::post("/login", [AuthController::class, "authenticate"])->name("login.authenticate");

Route::get("/register", [AuthController::class, "showRegistrationForm"])->name("register");

Route::post("/register", [AuthController::class, "store"])->name("register.store");

Route::post("/logout", [AuthController::class, "logout"])->name("logout");

Route::resource("/products", ProductController::class);

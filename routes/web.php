<?php

use App\Http\Controllers\AuthController\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
// STANDARD LAYOUT
// Route::get('/', function () {
//     return view('welcome');})

// route listens to GET - request the root URL / and 'index' from HomeController
Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);

// Auth Controller
// show form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// handle login form submission
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

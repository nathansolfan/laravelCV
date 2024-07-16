<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
// STANDARD LAYOUT
// Route::get('/', function () {
//     return view('welcome');})

// route listens to GET - request the root URL / and 'index' from HomeController
Route::get('/', [HomeController::class, 'index']);

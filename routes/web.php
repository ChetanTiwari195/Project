<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\signupController;
use App\Http\Controllers\welcomeController;
use Faker\Guesser\Name;
use Illuminate\Auth\Events\Login;
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

Route::get('/', [welcomeController::class, 'index']);

// login page route
Route::get('/login', [LoginController::class, 'login']);

// signup page route
Route::get('/signup', [signupController::class, 'signup']);

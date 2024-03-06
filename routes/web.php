<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\signupController;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
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
Route::get('/home_profile', [welcomeController::class, 'profileindex']);

// login page route
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/login.logout', [LoginController::class, 'logout']);

// signup page route
Route::get('/signup', [signupController::class, 'signup']);
Route::post('/signup.create', [signupController::class, 'create']);

// profile route
Route::get('/profile/{id}', [profileController::class, 'profile'])->middleware('auth');
Route::get('/profile.edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile.update/{id}', [ProfileController::class, 'updateProfile']);
Route::get('/profile.delete', [ProfileController::class, 'delete']);
Route::delete('/profile/delete/{id}', [ProfileController::class, 'handleDelete'])->name('profile.handleDelete');

// posts routes
Route::get('/post.create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/{id}', [PostController::class, 'store'])->name('post.store');

// search route
Route::get('/search.redirect', [SearchController::class, 'redirect'])->name('redirect');
Route::get('/search', [SearchController::class, 'index'])->name('search');
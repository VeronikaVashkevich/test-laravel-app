<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SecurityController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'users' => User::all(),
    ]);
});

//Auth::routes();

//Authentication routes
Route::get('/register', [RegistrationController::class, 'index'])->name('registerForm');
Route::post('/save-user', [RegistrationController::class, 'saveUser'])->name('saveUser');

Route::get('/login', [SecurityController::class, 'index'])->name('loginForm');
Route::post('/sign-in', [SecurityController::class, 'signIn'])->name('signIn');

Route::get('/logout', [SecurityController::class, 'logout'])->name('logout');

//Post routes
Route::resource('posts', PostController::class);
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/{id}', [PostController::class, 'show']);
Route::get('/user-posts/{id}', [PostController::class, 'showUserPosts'])->name('showUserPosts');

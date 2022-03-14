<?php

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

Route::get('/register', [RegistrationController::class, 'index'])->name('registerForm');
Route::post('/save-user', [RegistrationController::class, 'saveUser'])->name('saveUser');

Route::get('/login', [SecurityController::class, 'index'])->name('loginForm');
Route::post('/sign-in', [SecurityController::class, 'signIn'])->name('signIn');

Route::get('/logout', [SecurityController::class, 'logout'])->name('logout');

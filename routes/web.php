<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\TipepekerjaanController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\ProyekController;

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
    return view('welcome');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/postregister', 'postregister')->name('postregister');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::resource('/kliens', KlienController::class)->middleware('auth');
Route::resource('/tipepekerjaans', TipepekerjaanController::class)->middleware('auth');
Route::resource('/pekerjaans', PekerjaanController::class)->middleware('auth');
Route::resource('/proyeks', ProyekController::class)->middleware('auth');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('index');

Route::middleware(['guest'])->group(function () {
    Route::get('/account/login', [AuthController::class, 'index'])->name('loginForm');
    Route::post('/account/login', [AuthController::class, 'login'])->name('login');
});

Route::post('/account/logout', [AuthController::class, 'logout'])->name('logout');



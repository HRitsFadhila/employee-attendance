<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'view'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function (){
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});
